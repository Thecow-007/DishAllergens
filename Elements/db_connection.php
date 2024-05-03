<?php
    function openConnection(){
        $servername = "localhost";
        $dbUsername = "allergyUser";
        $dbPassword = "allergypass";
        $dbName = "Allergy_app";
        $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName)or die("Connect failed: %s\n". $connection -> error);
        return $connection;
    }
    
    function closeCon($conn){
        $conn -> close();
    }

    $conn = openConnection();
?>