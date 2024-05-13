<?php
$user_id = $_SESSION['User_ID'];
$allergensArray = [];
$allergenSQL = "SELECT * FROM Allergens 
    JOIN User_Allergens ON User_Allergens.Allergens_ID = Allergens.Allergens_ID
    JOIN User ON User.User_ID = User_Allergens.User_ID
    WHERE User.User_ID = '$user_id'";
$allergenSQLExec = $conn->prepare($allergenSQL);
$allergenSQLExec->execute();
$allergenSQLresult = $allergenSQLExec->get_result();
if ($allergenSQLresult->num_rows > 0) {
    while($allergen = $allergenSQLresult->fetch_assoc()) {
        $allergensArray[] = $allergen['Allergens_ID'];
    }
}

?>

