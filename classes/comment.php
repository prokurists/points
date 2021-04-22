<?php

class Comment{

    public function createNewComment($emailFrom, $emailTo, $comment, $value){

        $db = new dbConnect();
        $connectQr = $db->connectDB();

        //Inserting into group new group record

        $sqlPlus = "UPDATE users SET gift = gift + '".$value."' WHERE email = '".$emailFrom."'";
        $sqlMinus = "UPDATE users SET wallet = wallet - '".$value."' WHERE email = '".$emailTo."'";


        if (($connectQr->query($sqlMinus) === TRUE) && ($connectQr->query($sqlPlus) === TRUE)) {

            $sql = "INSERT INTO user_comments (email_from, email_to, comment, value)
            VALUES ('".$emailFrom."', '".$emailTo."', '".$comment."', '".$value."')";
    
                if (mysqli_query($connectQr, $sql)) {
                    return true;
    
                  } else {
    
                    return false;
                }
        


    }

    }

    public function showFromComments($email){
        
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $commentsFrom = array();

        $sql = "SELECT * FROM user_comments WHERE email_from = '".$email."'";

        $result = $connectQr->query($sql);
      
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
  
        $commentsFrom = array(
            array($row["comment"], $row["value"])
        );
        return $commentsFrom;


        } else {

             return false;       
        }
    }    
    

    public function showToComments($email){
        
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $commentsTo = array();

        $sql = "SELECT * FROM user_comments WHERE email_to = '".$email."'";

        $result = $connectQr->query($sql);
      
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
  
        $commentsTo = array(
            array($row["comment"], $row["value"])
        );
        return $commentsTo;


        } else {

             return false;       
        }
    }    
    
}