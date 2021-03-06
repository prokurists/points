<?php

class Transaction{

    public function createNewTransaction($emailFrom, $emailTo, $transaction, $value, $groupName){

        $db = new dbConnect();
        $connectQr = $db->connectDB();
        
        $emailFrom = $this->test_input($emailFrom);
        $emailTo = $this->test_input($emailTo);
        $transaction = $this->test_input($transaction);


            $sql = "INSERT INTO user_transactions (emailFrom, emailTo, transaction, user_group, value)
            VALUES ('".$emailFrom."', '".$emailTo."', '".$transaction."', '".$groupName."', '".$value."')";
    
                if (mysqli_query($connectQr, $sql)) {
                    return true;
    
                  } else {
    
                    return false;
                }
            
            $db->closeDB();
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    public function showFromTransactions($email, $monthChoosen){
        
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $transactionsFrom = array();

        $sql = "SELECT * FROM user_transactions WHERE emailTo = '".$email."' AND DATE_FORMAT(created_date, '%Y-%m') = '".$monthChoosen."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push($transactionsFrom, array($row["transaction"], $row["value"], $row["created_date"]));
            } } else{
                return false;
            
        }
        return $transactionsFrom;
        $db->closeDB();

}
    

    public function showToTransactions($email, $currentMonth){
        
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $showToTransactions = array();

        $sql = "SELECT * FROM user_transactions WHERE emailFrom = '".$email."' AND DATE_FORMAT(created_date, '%Y-%m') = '".$currentMonth."' ORDER BY created_date DESC";
        $result = $connectQr->query($sql);
      

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push($showToTransactions, array($row["transaction"], $row["value"], $row["created_date"], $row["emailTo"], $row["id"]));
            }
        } 
        return $showToTransactions;
        $db->closeDB();

    }
	public function resetTransaction($adminGroupName){
		$db = new dbConnect();
		$connectQr = $db->connectDB();
		
		// sql to delete a record
        $sql = "DELETE FROM user_transactions WHERE user_group='".$adminGroupName."'";

        if ($connectQr->query($sql) === TRUE) {
        return true;
        } else {
        return false;
            }
            $db->closeDB();

	}

    public function deleteTransaction($transactionID){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "DELETE FROM user_transactions WHERE id='".$transactionID."'";

        if($connectQr->query($sql) === TRUE){
            return true;
        } else{
            return false;
        }
    }

    public function getTopUserTransactions($emailTo, $lastMonth){
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $transactionArray = array();

        $sql = "SELECT * FROM user_transactions WHERE emailTo = '".$emailTo."' AND DATE_FORMAT(created_date, '%Y-%m') = '".$lastMonth."'";
        $result = $connectQr->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push($transactionArray, $row["transaction"]);
            }
        }            return $transactionArray;
        $db->closeDB();


    }

    public function getTotalPoints($email, $month){
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $points = 0;
        $sql = "SELECT value FROM user_transactions WHERE emailTo = '".$email."' AND DATE_FORMAT(created_date, '%Y-%m') = '".$month."'";
        $result = $connectQr->query($sql);

        if($result->num_rows > 0 ){
            while($row = $result->fetch_assoc()){
                $points+=$row["value"];
            }
            return $points;

        }
    }

    public function checkTransactionAvailability($lastMonth, $groupName){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        $sql = "SELECT * FROM user_transactions WHERE user_group = '".$groupName."' AND DATE_FORMAT(created_date, '%Y-%m') = '".$lastMonth."'";
        $result = $connectQr->query($sql);

            if($result->num_rows > 0){
                return true;
            } else {
                return false;
            }
    }

    public function getTotalValue($email, $monthChoosen){ 
        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $totalSum = 0;
    
        $sql = "SELECT * FROM user_transactions WHERE emailTo = '".$email."' AND DATE_FORMAT(created_date, '%Y-%m') = '".$monthChoosen."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $totalSum = $totalSum + $row["value"];
            }
        } else {
            return false;
        }
        return $totalSum;
      }
    
}