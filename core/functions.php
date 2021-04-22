<?php

$request = $_SERVER['REQUEST_URI'];
$number = @end(explode("?key=",$_SERVER['REQUEST_URI']));
$pageTitle = "Page name";

function toLoginPage (){
  header("Refresh: 0; URL=/login");

}

  if (isset($_POST["login"])){

    $xuser = new User();
    $xgroup = new Group();

    $email = $_POST["email"];
    $password = $_POST["password"];
    
    //Check if that user exists and data ir correct
      if ($xuser->checkLogin($email,$password)){

      //Push succes message, that all is ok
           $resMessage = array(
           "status" => "alert-success",
           "message" => "You are logged in!");
           $groupMaster = $xgroup->checkGroupMaster($email);
           $groupName = $xgroup->getAdminGroupName($email);

           if ($groupMaster){
              $_SESSION["groupMaster"] = '1';
              $_SESSION["adminEmail"] = $email;
              $_SESSION["adminGroupName"] = $groupName;}          
            
          //Creating new session and making redirect to index page
              $_SESSION["loggedIn"] = '1'; 
              $_SESSION["email"] = $email;
              header("Refresh: 1; URL=/");

             } else {

            //Push alert message that something is wrong with email or password
            $resMessage = array(
            "status" => "alert-danger",
            "message" => "Email or password is WRONG!");

      }
    }  

      if (isset($_POST["register"])){

          $xuser = new User();
          $xgroup = new Group();

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
        if ($xuser->checkEmailAvailability($email)){
          
          //Check if POST groupname is not empty
            if (!EMPTY($groupName)){

              //Check groups name availability
                if ($xgroup->checkGroupAvailability($groupName)){           

                   //Get new group value for link
                  $groupValue = $xgroup->getGroupValue();

                   //If true then make new user and new group
                   $xuser->createUser($name, $email, $password, $groupName);
                   $xgroup->createNewGroup($groupName, $groupValue, $email);
              
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
                            if ($xgroup->checkGroupValueExistance($groupValue)){

                            // Get groups name
                             $groupName = $xgroup->getGroupName($groupValue, $groupName);

                            //Creating user and new group
                            $xuser->createUser($name, $email, $password, $groupName);
                            $xgroup->joinExistingGroup($groupName, $groupValue, $email);

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
        $xuser = new User();

        $quantity = $_POST["quantity"];
        $groupName = $_SESSION["adminGroupName"];
        $xuser->setWallet($quantity, $_SESSION["adminGroupName"]); }
      
      //If you are logged you are adding new comment
      if(isset($_POST["new_comment"]) && ($_SESSION["loggedIn"] == 1)){
        $newComment = new Comment();

        $emailTo = $_POST["emailto"];
        $emailFrom = $_SESSION["email"];
        $comment = $_POST["comment"];
        $value = $_POST["quantity"];

        $newComment->createNewComment($emailTo, $emailFrom, $comment, $value);

    }

      //Group Admin is reseting Wallet value
      if (isset($_POST["resetWallet"]) && ($_SESSION["groupMaster"] == 1) ){
        $xuser = new User();
        $xuser->resetWallet($_SESSION["adminGroupName"]);    }
      
      //Group admin is resseting Gift Value
      if (isset($_POST["resetGift"]) && ($_SESSION["groupMaster"] == 1) ){
        $xuser = new User();
        $xuser->resetGift($_SESSION["adminGroupName"]);   }


  
    ?>