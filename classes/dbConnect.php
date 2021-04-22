<?php 

    class dbConnect 
    {  
        function connectDB() 
        {  
            //global $conn;

        require 'config.php';

        
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);

          } else {
            return $conn;
          }
        
        }
//kaut kad jaaiztaisa pieslegšanās
    }