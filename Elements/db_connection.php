<?php
    function openConnection(){
        $servername = "localhost";
        $dbUsername = "allergyUser";
        $dbPassword = "allergypass";
        $dbName = "allergy_app";
        $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName, 5505)or die("Connect failed: %s\n". $connection -> error);
        return $connection;
    }
    
    function closeCon($conn){
        $conn -> close();
    }

    $conn = openConnection();
?>