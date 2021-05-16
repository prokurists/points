<?php
    class Wallet{
        
        public function createNewWallet($email, $userWallet){
                //New connection
                $db = new dbConnect();
                $connectQr = $db->connectDB();

                //Insert into DB new user
                 $sql = "INSERT INTO user_wallet (email, wallet)
                VALUES ('".$email."', '".$userWallet."')";

                 if (mysqli_query($connectQr, $sql)) {
                      return true;

                     } else {

                      return false;
             }
                $db->closeDB();
        }

        public function userWalletAmount($email){
            $db = new dbConnect();
            $connectQr = $db->connectDB();
        
            $sql = "SELECT * FROM user_wallet WHERE email = '".$email."'";
            $result = $connectQr->query($sql);
    
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    return $row["wallet"];
        }
    }
    $db->closeDB();
    
    }

    }


?>