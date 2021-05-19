<?php
    class Wallet{
        
        public function createNewWallet($email, $userWallet, $groupName){
                //New connection
                $db = new dbConnect();
                $connectQr = $db->connectDB();

                //Insert into DB new user
                 $sql = "INSERT INTO user_wallet (email, wallet, user_group)
                VALUES ('".$email."', '".$userWallet."', '".$groupName."')";

            if (mysqli_query($connectQr, $sql)) {
                      return true;

                     } else {

                      return false;
             }
                $db->closeDB();
        }
        public function userWalletAmount($email){
        //New connection
        $db = new dbConnect();
        $connectQr = $db->connectDB();

	    $sql = "SELECT * FROM user_wallet WHERE email = '".$email."'";

        $result = $connectQr->query($sql);
        
            if ($result->num_rows == 1){
                while($row = $result->fetch_assoc()){
                    return $row["wallet"];
        }
    }  
      }

      
    public function checkUsersBallance($emailFrom){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "SELECT * FROM user_wallet WHERE email = '".$emailFrom."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                if ($row["wallet"] > 0){
                    return true;
    } else {
        return false;
    }
            }
            $db->closeDB();
        }
}

public function setUsersWalletGift($emailFrom, $emailTo, $value){

    $db = new dbConnect();
    $connectQr = $db->connectDB();

    $sqlPlus = "UPDATE user_wallet SET wallet = wallet + '".$value."' WHERE email = '".$emailFrom."'";
    $sqlMinus = "UPDATE user_wallet SET gift = gift - '".$value."' WHERE email = '".$emailTo."'";

    if (($connectQr->query($sqlMinus) === TRUE) && ($connectQr->query($sqlPlus) === TRUE)) {
        return true;
    } else {
            return false;
        }
        $db->closeDB();

}

public function setGroupWallet($name, $value){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "UPDATE user_wallet SET wallet = '".$value."' WHERE user_group = '".$name."'";

        if ($connectQr->query($sql)){
            return true;
        } else {
            return false;
        }

}

public function addUsersWalletGift($emailFrom, $emailTo, $value){

    $db = new dbConnect();
    $connectQr = $db->connectDB();

    $sql = "SELECT * FROM user_wallet WHERE email = '".$emailFrom."'";
    $result = $connectQr->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            if ($row["wallet"] > 0){
                $sqlPlus = "UPDATE user_wallet SET wallet = wallet - '".$value."' WHERE email = '".$emailFrom."'";
                $sqlMinus = "UPDATE user_wallet SET gift = gift + '".$value."' WHERE email = '".$emailTo."'";
        
                if (($connectQr->query($sqlMinus) === TRUE) && ($connectQr->query($sqlPlus) === TRUE)) {
                    return true;
                } else {
                        return false;
                    }
            } else {
                return false;
            }
        }
    }


        $db->closeDB();

}

public function setWallet($quantity, $groupName){
    $db = new dbConnect();
    $connectQr = $db->connectDB();

    $sql = "UPDATE user_group SET walletAmount='".$quantity."' WHERE name='".$groupName."' AND admin=email";
    if ($connectQr->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
    $db->closeDB();

}

public function showAllUserWallet($groupName){
    $db = new dbConnect();
    $connectQr = $db->connectDB();

    $usersArray = array();

    $sql = "SELECT * FROM user_wallet WHERE user_group = '".$groupName."'";
    $result=$connectQr->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            array_push($usersArray, array($row["email"], $row["wallet"], $row["gift"]));
        }
    }
    return $usersArray;
}

    }


?>