<?php
require_once 'db_connection.php';

if (isset($_POST["signup"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $sql = "SELECT * FROM `user` WHERE User_Email = ? OR User_Name = ?";
    $sqlExec = $conn->prepare($sql);
    $sqlExec->bind_param("ss", $email, $username);
    $sqlExec->execute();
    $result = $sqlExec->get_result();

    if ($result->num_rows > 0) {
        echo '<script>alert("This email or username already exists.");</script>';
        exit;
    }

    $insertSQL = "INSERT INTO `user` (User_Name, User_Password, User_Email, User_Address) VALUES (?, ?, ?, 'click to edit your address')";
    $insertStmt = $conn->prepare($insertSQL);
    $insertStmt->bind_param("sss", $username, $password, $email);

    if ($insertStmt->execute()) {
        echo '<script>';
        echo 'alert("New account created. Please login!");';
        echo 'window.location.href = "../landingPage.php";';
        echo '</script>';
        exit;
    } else {
        $_SESSION['error'] = "Error: " . $insertSQL . "<br>" . $conn->error;
        echo '<script>window.location.href = "../landingPage.php";</script>';
        exit;
    }
} else {
    $_SESSION['error'] = "Error, please refresh and submit again";
    echo '<script>window.location.href = "../landingPage.php";</script>';
    exit;
}

$conn->close();
?>
