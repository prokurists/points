<?php

$request = $_SERVER['REQUEST_URI'];
$regKey = @end(explode("?key=",$_SERVER['REQUEST_URI']));


if(isset($_SESSION["month"])){
  $monthChoosen = $_SESSION["month"];
} else{
  $monthChoosen = date('Y-m', strtotime("-1 months"));
}
$currentMonth = date('Y-m');
$lastMonth = date('Y-m', strtotime("-1 months"));

function toLoginPage (){
  header("Refresh: 0; URL=/login");

}
if ((date("d") == 01) AND (date("h:i") == '00:00')){
  $xWallet = new Wallet();
  $xGroup = new Group();

  $groupWalletValue = $xGroup->getGroupWallet();

  for ($row = 0; $row < count($groupWalletValue); $row++) {
    $xWallet->setGroupWallet($groupWalletValue[$row][0], $groupWalletValue[$row][1]);
      }
}


  if (isset($_POST["login"])){

    $xUser = new User();
    $xGroup = new Group();

    $email = $_POST["email"];
    $password = $_POST["password"];
    
    //Check if that user exists and data ir correct
      if ($xUser->checkLogin($email,$password)){

      //Push succes message, that all is ok
           $resMessage = array(
           "status" => "alert-success",
           "message" => "You are logged in!");
           $groupMaster = $xGroup->checkGroupMaster($email);
           $adminGroupName = $xGroup->getAdminGroupName($email);
		       $groupName = $xGroup->getGroupNameForSession($email);

           if ($groupMaster){
              $_SESSION["groupMaster"] = '1';
              $_SESSION["adminEmail"] = $email;
              $_SESSION["adminGroupName"] = $adminGroupName;}          
            
          //Creating new session and making redirect to index page
              $_SESSION["loggedIn"] = '1'; 
              $_SESSION["email"] = $email;
		  	      $_SESSION["groupName"] = $groupName;
              header("Refresh: 1; URL=/");

             } else {

            //Push alert message that something is wrong with email or password
            $resMessage = array(
            "status" => "alert-danger",
            "message" => "Email or password is WRONG!");

      }
    }  

      if (isset($_POST["register"])){

          $xUser = new User();
          $xGroup = new Group();
          $xWallet = new Wallet();

          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $password_Confirm = $_POST['password_Confirm'];

            if (isset($_POST['groupName'])){

              $groupName = $_POST['groupName'];
              $groupValue = '';
              
              }else{

              $groupValue = $_POST['groupValue'];
              $groupName = '';}

      //Check if password are equals
      if ($password == $password_Confirm){

        //Check if email is available
        if ($xUser->checkEmailAvailability($email)){
          
          //Check if POST groupname is not empty
            if (!EMPTY($groupName)){

              //Check groups name availability
                if ($xGroup->checkGroupAvailability($groupName)){           

                   //Get new group value for link
                  $groupValue = $xGroup->getGroupValue();

                   //If true then make new user and new group
                   $userWallet = 0;
                   $xUser->createUser($name, $email, $password, $groupName);
                   $xGroup->createNewGroup($groupName, $groupValue, $email);
                   $xWallet->createNewWallet($email, $userWallet, $groupName);

              
                   //Push array with success message and redirect to /login page
                   header("Refresh: 2; URL=/login");
                   $resMessage = array(
                   "status" => "alert-success",
                   "message" => "Registration sucessfull with new GROUP!");  

                      } else{
                         // Push alert message that group is taken!
                        $resMessage = array(
                        "status" => "alert-danger",
                        "message" => "Group TAKEN!");}

                          //Anotherwise groupValue is set
                          } else {

                            // Check if DB have any records with dbValue
                            if ($xGroup->checkGroupValueExistance($groupValue)){

                            // Get groups name
                            $groupName = $xGroup->getGroupName($groupValue, $groupName);
                            $userWallet = $xGroup->getWalletAmount($groupValue);

                            //Creating user and new group
                            $xUser->createUser($name, $email, $password, $groupName);
                            $xGroup->joinExistingGroup($groupName, $groupValue, $email);
                            $xWallet->createNewWallet($email, $userWallet, $groupName);


                            //Push array with success message and redirect to /login page
                            header("Refresh: 2; URL=/login");
                            $resMessage = array(
                            "status" => "alert-success",
                            "message" => "Registration successfull with existing GROUP!");            }
                            //No value for dbVlaue in DB
                                else {
                                  $resMessage = array(
                                  "status" => "alert-danger",
                                  "message" => "Invalid invite link!"); }}
    
                                 } else {

                                   //Push alert message that email is taken!
                                   $resMessage = array(
                                   "status" => "alert-danger",
                                   "message" => "Email taken!");}
    
                                      } else {

                                         //Push alert message that password do not match!
                                         $resMessage = array(
                                         "status" => "alert-danger",
                                         "message" => "Password do not match!");}
                                         }
      //Group Admin is setting wallet value for all group users
      if (isset($_POST["setWallet"]) && ($_SESSION["groupMaster"] == 1) ){
        $xWallet = new Wallet();

        $quantity = $_POST["quantity"];
        $groupName = $_SESSION["adminGroupName"];
        $xWallet->setWallet($quantity, $_SESSION["adminGroupName"]); }
      
      //If you are logged you are adding new transaction
      if(isset($_POST["new_transaction"]) && ($_SESSION["loggedIn"] == 1)){
        $newTransaction = new Transaction();
        $xUser = new User();
      	$xWallet = new Wallet();

        $emailTo = $_POST["emailto"];
        $emailFrom = $_SESSION["email"];
        $transaction = $_POST["transaction"];
        $value = $_POST["quantity"];
        

        if ($xWallet->checkUsersBallance($emailFrom)){
          $newTransaction->createNewTransaction($emailFrom, $emailTo, $transaction, $value, $_SESSION["groupName"]);
          $xWallet->addUsersWalletGift($emailFrom,$emailTo, $value);
        } else {
          $resMessage = array(
            "status" => "alert-danger",
            "message" => "You have no POINTS LEFT!");
        }


    }
      //Group Admin is reseting Wallet value
      if (isset($_POST["resetWallet"]) && ($_SESSION["groupMaster"] == 1) ){
        $xuser = new User();
        $xuser->resetWallet($_SESSION["adminGroupName"]);    }
      
      //Group admin is resseting Gift Value
      if (isset($_POST["resetGift"]) && ($_SESSION["groupMaster"] == 1) ){
        $xuser = new User();
        $xuser->resetGift($_SESSION["adminGroupName"]);   }

      //Group admin is resseting Gift Value
      if (isset($_POST["resetTransaction"]) && ($_SESSION["groupMaster"] == 1) ){
        $xTransaction = new Transaction();
        $xTransaction->resetTransaction($_SESSION["adminGroupName"]);   }

      if (isset($_POST["deleteTransaction"]) && (isset($_SESSION["email"]))){
        $xTransaction = new Transaction();
        $transactionID = $_POST["deleteTransactionID"];

        $xTransaction->deleteTransaction($transactionID);

        $transactionAmount = $_POST["transactionAmount"];
        $emailFrom = $_SESSION["email"];
        $emailTo = $_POST["emailTo"];

        $xWallet = new Wallet();

        
        $xWallet->setUsersWalletGift($emailFrom, $emailTo, $transactionAmount);

      }
      
      if (isset($_SESSION["groupMaster"]) && (isset($_POST["showGroupResults"]))){
        $GroupResults = new Group();
        $GroupResults->setGroupResults($_SESSION["email"]);
        

      }

      if(isset($_SESSION["email"]) && (isset($_POST["setMonth"]))){
        if (trim($_POST["monthChoosen"]) === (trim($currentMonth))){
          $resMessage = array(
            "status" => "alert-danger",
            "message" => "You cant look current month transactions!");
                  } else {
        $_SESSION["month"] = $_POST["monthChoosen"];
        header("Refresh:0; URL=/profile");}
      }
      



  
    ?>