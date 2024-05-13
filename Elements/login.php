<?php 
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = openConnection();
    session_start();

    $username = $_POST["login-username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM User WHERE User_Name = ? AND User_Password = ?";
    $sqlExec = $conn->prepare($sql);
    $sqlExec->bind_param("ss", $username, $password);
    $sqlExec->execute();
    $result = $sqlExec->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $_SESSION['User_ID'] = $user['User_ID'];

        echo '<script>alert("You are logged in successfully.");';
        echo 'window.location.href = "../profile.php";</script>';
        $sqlExec->close();
        exit;
    } else {
        echo '<script>alert("Invalid username or password or you do not have an account. Please try again.");';
        echo 'window.location.href = "../landingPage.php";</script>';
        exit;
    }
}

closeCon($conn);
?>
