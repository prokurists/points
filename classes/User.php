<?php



class User  {

    //Check if email and password is correct
    public function checkLogin($email, $password){

        //New db connection
        $db = new dbConnect();
        $connectQr = $db->connectDB(); 
        
        //Selecting password where email = POST email
        $sql = "SELECT password FROM users WHERE email = '".$email."'";
        $result = $connectQr->query($sql);

        //If email exists then checking if password is correct
        if ($result->num_rows == 1) {
         while($row = $result->fetch_assoc()) {

        if (password_verify($password, $row["password"])) {
                return true;
        } else {

        return false;
        }  }

        } else {
        return false;
        }  
        $db->closeDB();

    }
   
    //User INSERT (Registration) in database
    public function createUser($name, $email, $password, $groupName){

        //New connection
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        // Check sql injection input and set password hash
        $nameSurname = $this->test_input($name);
        $email = $this->test_input($email);
        $password = $this->test_input($password);
        $hash = password_hash($password, 
        PASSWORD_DEFAULT);
        $groupName = $this->test_input($groupName);


        //Insert into DB new user
        $sql = "INSERT INTO users (name, email, password, user_group)
        VALUES ('".$name."', '".$email."', '".$hash."', '".$groupName."')";

            if (mysqli_query($connectQr, $sql)) {
                return true;

              } else {

                return false;
            }
            $db->closeDB();

            
}
        //Checking if email is available
    public function checkEmailAvailability($email){

        //New connection
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        //Trying to find email in db compare to email from post
        $sql = "SELECT * FROM users WHERE email='".$email."'";
        $result = $connectQr->query($sql);
        
        if ($result->num_rows < 1) {

        return true;          
        } else {

        return false;       
        }  }
    


    //Deleting sql injection data from POST
    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    public function setWallet($quantity, $groupName){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "UPDATE users SET wallet='".$quantity."' WHERE user_group='".$groupName."'";
        if ($connectQr->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $db->closeDB();

    }

    public function userStartingPoints(){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $email = $_SESSION["email"];

        $sql = "SELECT wallet FROM users where email = '".$email."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row["wallet"];
    }
}
$db->closeDB();

}


    public function userGainedPoints(){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $email = $_SESSION["email"];

        $sql = "SELECT gift FROM users where email = '".$email."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row["gift"];
    }
}
$db->closeDB();

}

    public function userGroupName(){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $email = $_SESSION["email"];

        $sql = "SELECT user_group FROM users where email = '".$email."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row["user_group"];
    
            }
        }
        $db->closeDB();

}



    public function getAllUsersOption(){
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $userGroup = $this->userGroupName();
        $arrayOptions = array();
        $email = $_SESSION["email"];

        
        $sql = "SELECT * FROM users where user_group = '".$userGroup."' AND email != '".$_SESSION["email"]."'";
        $result = $connectQr->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    array_push($arrayOptions, $row["email"]);
                }
            }
            return $arrayOptions;
            $db->closeDB();

    }
    public function getUserName($value){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "SELECT * FROM users WHERE email='".$value."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               $value = $row["name"];
            }
        }
        return $value;
    }
    
    public function getAllUsersData($value){

        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "SELECT * FROM users WHERE email='".$value."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              $value = array();
               $arrayV = array($row["name"], $row["email"], $row["wallet"], $row["gift"]);
              array_push($value, $arrayV);
            }
 
        }
        return $value; 
        $db->closeDB();

    }

    public function showWalletAmount(){

        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "SELECT wallet FROM users WHERE user_group = '".$_SESSION["adminGroupName"]."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return (trim($row["wallet"]));
        }
        $db->closeDB();

    }

    public function resetWallet($groupName){

        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "UPDATE users SET wallet = 0 WHERE user_group='".$groupName."'";
        if ($connectQr->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $db->closeDB();

    }

    public function resetGift($groupName){

        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "UPDATE users SET gift = 0 WHERE user_group='".$groupName."'";
        if ($connectQr->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $db->closeDB();

    }

    public function getTopUser($groupName){

        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $topUserArray = array();

        $sql = "SELECT * FROM users WHERE user_group='".$groupName."' ORDER BY gift DESC";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)) {
                array_push($topUserArray, array($row["name"], $row["gift"], $row["email"]));
            }
        }
        return $topUserArray;
        $db->closeDB();

    }

    public function setUsersWalletGift($emailFrom, $emailTo, $value){

        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sqlPlus = "UPDATE users SET wallet = wallet + '".$value."' WHERE email = '".$emailFrom."'";
        $sqlMinus = "UPDATE users SET gift = gift - '".$value."' WHERE email = '".$emailTo."'";

        if (($connectQr->query($sqlMinus) === TRUE) && ($connectQr->query($sqlPlus) === TRUE)) {
            return true;
        } else {
                return false;
            }
            $db->closeDB();

    }

    public function addUsersWalletGift($emailFrom, $emailTo, $value){

        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sqlPlus = "UPDATE users SET wallet = wallet - '".$value."' WHERE email = '".$emailFrom."'";
        $sqlMinus = "UPDATE users SET gift = gift + '".$value."' WHERE email = '".$emailTo."'";

        if (($connectQr->query($sqlMinus) === TRUE) && ($connectQr->query($sqlPlus) === TRUE)) {
            return true;
        } else {
                return false;
            }
            $db->closeDB();

    }

}
?> 