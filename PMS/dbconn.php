<?php 
        //identify the users
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "pms";
    
        //Declaring conenction
        $con = mysqli_connect($servername,$username,$password,$database);
    
        //Idntifying the connection...
        if(!$con)
        {
            echo "<script>alert('Connection failed.')</script>";
        }
?>