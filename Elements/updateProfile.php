<?php
    session_start();
    require_once('./db_connection.php');
    $user_id = $_SESSION['User_ID'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['allergens']) && is_array($_POST['allergens'])) {
            $currentAllergens = [];
            $queryCurrentAllergens = "SELECT Allergens_ID FROM User_Allergens WHERE User_ID = ?";
            $stmtCurrentAllergens = $conn->prepare($queryCurrentAllergens);
            $stmtCurrentAllergens->bind_param("i", $user_id);
            $stmtCurrentAllergens->execute();
            $resultCurrentAllergens = $stmtCurrentAllergens->get_result();
    
            if ($resultCurrentAllergens) {
                while ($row = $resultCurrentAllergens->fetch_assoc()) {
                    $currentAllergens[] = $row['Allergens_ID'];
                }
            }
    
            foreach ($_POST['allergens'] as $allergenID) {
                if (!in_array($allergenID, $currentAllergens)) {
                    $sqlInsert = "INSERT INTO User_Allergens (User_ID, Allergens_ID) VALUES (?, ?)";
                    $stmtInsert = $conn->prepare($sqlInsert);
                    $stmtInsert->bind_param("ii", $user_id, $allergenID);
                    $stmtInsert->execute();
                }
            }
    
            foreach ($currentAllergens as $currentAllergen) {
                if (!in_array($currentAllergen, $_POST['allergens'])) {
                    $sqlDelete = "DELETE FROM User_Allergens WHERE User_ID = ? AND Allergens_ID = ?";
                    $stmtDelete = $conn->prepare($sqlDelete);
                    $stmtDelete->bind_param("ii", $user_id, $currentAllergen);
                    $stmtDelete->execute();
                }
            }
        }
        
        if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
            $photoTmpPath = $_FILES['photo']['tmp_name'];
            $photoData = file_get_contents($photoTmpPath);
            $updatePhoto = "UPDATE User SET User_Photo = ? WHERE User_ID = ?";
            $updatePhotoExec = $conn->prepare($updatePhoto);
            if ($updatePhotoExec) {
                $updatePhotoExec->bind_param("si", $photoData, $user_id);
                $updatePhotoExec->execute();
                $updatePhotoExec->close();
            } 
        } 
        if (isset($_POST['username'])) {
            $newUsername = $_POST['username'];
            $nameUpdateSQL = "UPDATE User SET User_Name = ? WHERE User_ID = ?";
            $nameUpdateStmt = $conn->prepare($nameUpdateSQL);
            $nameUpdateStmt->bind_param("si", $newUsername, $user_id);  
            $nameUpdateStmt->execute();
            $nameUpdateStmt->close();
        }
        
        if (isset($_POST['address'])) {
            $newAddress = $_POST['address'];
            $addressUpdateSQL = "UPDATE User SET User_Address = ? WHERE User_ID = ?";
            $addressUpdateStmt = $conn->prepare($addressUpdateSQL);
            $addressUpdateStmt->bind_param("si", $newAddress, $user_id);
            $addressUpdateStmt->execute();
            $addressUpdateStmt->close();
        }
        echo '<script>';
        echo 'alert("Successfully updated");';
        echo 'window.location.href = "../profile.php";';
        echo '</script>';            
        $conn->close(); 
    }

?>