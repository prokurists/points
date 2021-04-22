<?php 

class Group
{
    //Checking if groupname is avaiable
    public function checkGroupAvailability($groupname){

        //New connection
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        //Trying to find groupname indb
        $sql = "SELECT * FROM user_group WHERE name='".$groupname."'";
        $result = $connectQr->query($sql);
        
        if ($result->num_rows == 0) {

        return true;          
        } else {

        return false;       
        }    }    


    //If we got invite link(groupvalue) then we are getting groupname
    public function getGroupName ($groupValue, $groupName) {

        //New db connection
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        //Selecting name where groupvalue is exual to invitelinkvalue
        $sql = "SELECT name FROM user_group WHERE value='".$groupValue."'";
        $result = $connectQr->query($sql);
        
        //If we got groupvalue then we are getting groupname
        if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_assoc();
          $groupName = $row["name"];
          return $groupName;           
          
        } else {
        return false;        
        }    }

            //If we got invite link(groupvalue) then we are getting groupname
    public function getAdminGroupName ($email) {

        //New db connection
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        //Selecting name where groupvalue is exual to invitelinkvalue
        $sql = "SELECT name FROM user_group WHERE admin='".$email."'";
        $result = $connectQr->query($sql);
        
        //If we got groupvalue then we are getting groupname
        if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_assoc();
          return $row["name"];
          
        } else {
        return false;        
        }    }


    //Creating new group 
    public function createNewGroup ($groupName, $groupValue, $email){

        //New db connection
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        //Inserting into group new group record
        $sql = "INSERT INTO user_group (name, value, email, active, admin)
        VALUES ('".$groupName."', '".$groupValue."', '".$email."', '1', '".$email."')";

            if (mysqli_query($connectQr, $sql)) {
                return true;

              } else {

                return false;
            }
    }

    //Inserting new record to existing group
    public function joinExistingGroup($groupName, $groupValue, $email){

        //New connection
        $db = new dbConnect();
        $connectQr = $db->connectDB();


        //Inserting new record
        $sql = "INSERT INTO user_group (name, value, email, active)
        VALUES ('".$groupName."', '".$groupValue."', '".$email."', '1')";
            if (mysqli_query($connectQr, $sql)) {
                return true;

              } else {

                return false;
            }

    }

    //Randaring new groupvalue for groupname
    public function getGroupValue (){

        $db = new dbConnect();
        $connectQr = $db->connectDb();

        $val = (md5(rand(10,100)));
        $sql = "SELECT * FROM user_group WHERE value='".$val."'";
        $result = $connectQr->query($sql);

        while ($result->num_rows > 1) {
          $val = (md5(rand(10,100)));
        }

        return $val;
        
    }

    public function checkGroupMaster ($email){

        
        //New connection
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        //Trying to find record where admin = email
        $sql = "SELECT * FROM user_group WHERE admin='".$email."'";
        $result = $connectQr->query($sql);
        
        if ($result->num_rows == 1) {

        return true;          
        } else {

        return false;       
        }    }

    //Check if DB have any record with concrete dbvalue if not then false
    public function checkGroupValueExistance($groupValue){
        $db = new dbConnect();
        $connectQr = $db->connectDB();

        //Trying to find record where value = groupValue
        $sql = "SELECT * FROM user_group WHERE value='".$groupValue."'";
        $result = $connectQr->query($sql);
        
        if ($result->num_rows > 0) {

        return true;          
        } else {

        return false;       
        }    


    }
    public function getGroupExValue($value){
      $db = new dbConnect();
      $connectQr = $db->connectDB();

      //Trying to find record where value = groupValue
      $sql = "SELECT value FROM user_group WHERE admin='".$value."'";
      $result = $connectQr->query($sql);
      
      if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      return $row["value"];          
      } else {

      return false;       
      }    


  }

  public function showGroupUsersList(){

        $db = new dbConnect();
        $connectQr = $db->connectDB();
        $usersList = array();    

        $sql = "SELECT email FROM user_group WHERE name='".$_SESSION["adminGroupName"]."' AND admin != '".$_SESSION["email"]."'";
        $result = $connectQr->query($sql);

        if ($result->num_rows > 0) {
         // output data of each row
            while($row = $result->fetch_assoc()) {
              array_push($usersList, $row["email"]);
              
           
      }
      return $usersList;

    }
  }
}

