<?php

class Comment{

    public function createNewComment($emailFrom, $emailTo, $comment, $value, $groupName){

        $db = new dbConnect();
        $connectQr = $db->connectDB();

        //Inserting into group new group record

        $xUser = new User();
        $addUserAmount = $xUser->addUsersWalletGift($emailFrom,$emailTo, $value);

       if ($addUserAmount) {

            $sql = "INSERT INTO user_comments (email_from, email_to, comment, value, groupName)
            VALUES ('".$emailFrom."', '".$emailTo."', '".$comment."', '".$value."', '".$groupName."')";
    
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

        $sql = "SELECT * FROM user_comments WHERE email_to = '".$email."'";
        $result = $connectQr->query($sql);
      
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push($commentsFrom, array($row["comment"], $row["value"], $row["time_created"]));
            }
        }
        return $commentsFrom;
}
    

    public function showToComments($email){
        
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $showToComments = array();

        $sql = "SELECT * FROM user_comments WHERE email_from = '".$email."'";

        $result = $connectQr->query($sql);
      

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push($showToComments, array($row["comment"], $row["value"], $row["time_created"], $row["email_to"], $row["id"]));
            }
        }
        return $showToComments;
    }
	public function resetComment($adminGroupName){
		$db = new dbConnect();
		$connectQr = $db->connectDB();
		
		// sql to delete a record
        $sql = "DELETE FROM user_comments WHERE groupName='".$adminGroupName."'";

        if ($connectQr->query($sql) === TRUE) {
        return true;
        } else {
        return false;
            }
	}

    public function deleteComment($commentID){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "DELETE FROM user_comments WHERE id='".$commentID."'";

        if($connectQr->query($sql) === TRUE){
            return true;
        } else{
            return false;
        }
    }

    public function getTopUserComments($emailTo){
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $commentArray = array();

        $sql = "SELECT * FROM user_comments WHERE email_to = '".$emailTo."'";
        $result = $connectQr->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push($commentArray, $row["comment"]);
            }
        }            return $commentArray;

    }
    
}