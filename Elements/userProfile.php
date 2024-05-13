<?php
    session_start();

if (isset($_SESSION['User_ID'])) {
    $userProfileSQL = "SELECT * FROM User WHERE User_ID = ?";
    $userProfileSQLExec = $conn->prepare($userProfileSQL);

    $userProfileSQLExec->bind_param("i", $_SESSION['User_ID']);
    $userProfileSQLExec->execute();

    $userProfileSQLresult = $userProfileSQLExec->get_result();

    if ($userProfileSQLresult->num_rows > 0) {
        $userProfile = $userProfileSQLresult->fetch_assoc();
        $User_Name = $userProfile['User_Name'];
        $User_Email = $userProfile['User_Email'];
        $User_Address = $userProfile['User_Address'];
        $User_Photo = $userProfile['User_Photo'];
    } else {
        echo "User not found.";
    }

    $userProfileSQLExec->close();
} else {
    echo "Invalid user ID.";
}
?>
