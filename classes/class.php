<?php 

    class dbConnect 
    {  
        function __construct() 
        {  
        require 'config.php';
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        
        }

        public function Close()
        {  
            $mysqli -> close();  
        }
    }


    class User extends dbConnect
    {

    function __construct() 
    {
        $db = new dbConnect();           
    }  
    
    function __destruct() 
    {  
          
    }  
}

$user = new User();

?> 