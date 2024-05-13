<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/fullSite.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/index.css">
    <title>Profile</title>
</head>
<body>
    <?php
        require_once('./Elements/db_connection.php');
        require_once('./Elements/userProfile.php');
        require_once('./Elements/getAllergens.php');

        if (!isset($User_Name)) {
            echo '<p>Error: Username not set.</p>';
            exit;
        }
    ?>
    <form action="./Elements/updateProfile.php" method="post" enctype="multipart/form-data" id="profileForm">
        <div id="profile-picDiv">
        <?php
            if($User_Photo != null){
                $base64Image = base64_encode($User_Photo);
                $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
            }else{
                $imageSrc = "./Site_Images/default_PFP.jpg";
            }
        ?>
        <img src="<?php echo $imageSrc; ?>" alt="User Photo" id="profile-photo">
        </div>
        <div id="nameDiv">
            <label for="nameUpload">User Name:</label>
            <input type="text" id="nameUpload" name="username" value="<?php echo $User_Name; ?>">
        </div>
        <div id="AddressDiv">
            <?php
                $addressResult = $conn->query("SELECT User_Address FROM User WHERE User_Name = '$User_Name'");
                if ($addressResult->num_rows > 0) {
                    $row = $addressResult->fetch_assoc();
                    $defaultAddress = $row['User_Address'];
                } else {
                    $defaultAddress = 'Please enter your address';
                }
            ?>
            <label for="addressUpload">Address:</label>
            <input type="text" id="addressUpload" name="address" value="<?php echo $defaultAddress; ?>">
        </div>
        <div id="allergensDiv">
            <div id="allergensContainer">
            <?php
                $defaultAllergens = [];
                $allergenResult = $conn->query("SELECT Allergens_Name, Allergens.Allergens_ID FROM Allergens
                    JOIN User_Allergens ON User_Allergens.Allergens_ID = Allergens.Allergens_ID
                    JOIN User ON User.User_ID = User_Allergens.User_ID
                    WHERE User.User_Name = '$User_Name'");
                if ($allergenResult->num_rows > 0) {
                    while ($row = $allergenResult->fetch_assoc()) {
                        $defaultAllergens[] = [
                            'name' => $row['Allergens_Name'],
                            'id' => $row['Allergens_ID']
                        ];
                    }

                    foreach ($defaultAllergens as $allergen) {
                        echo '<div class="AllergensBox">' . $allergen['name'] . '</div>';
                    }
                }
                ?>
            </div>
            <?php
                echo '<div id="addAllergens">Click here to edit allergens</div>';
            ?>
        </div>
        <div>
            <button id="button" class="submitButtonProfile" type="submit">Update</button>
        </div>
        <div id="allergenDropdown" class="showsup">
            <div class="close-button" id="closeAllergens">&times;</div>
            <label>Select Allergens:</label>
            <?php
                $allergensResult = $conn->query("SELECT Allergens_ID, Allergens_Name FROM Allergens");
                while ($row = $allergensResult->fetch_assoc()) {
                    $allergenID = $row['Allergens_ID'];
                    $allergenName = $row['Allergens_Name'];
                    $isChecked = in_array($allergenID, $allergensArray) ? 'checked' : '';
                    echo '<div>';
                    echo '<input type="checkbox" id="allergen_' . $allergenID . '" name="allergens[]" value="' . $allergenID . '" ' . $isChecked . '>';
                    echo '<label for="allergen_' . $row['Allergens_ID'] . '">' . $row['Allergens_Name'] . '</label>';
                    echo '</div>';
                }
            ?>
            <button id="button" class="submitButtonProfile" type="submit">Update</button>

            </div>
        <div id="picUpload" class="showsup">
            <div class="close-button" id="closePic">&times;</div>
            <label for="photoUpload">Select a photo:</label>
            <input type="file" id="photoUpload" name="photo" accept="image/*">
            <button id="button" class="submitButtonProfile" type="submit">Update</button>
        </div>
    </form>
    <script src="./js/profile.js"></script>
</body>
</html>
