<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dish Alllergens</title>

    <link rel="stylesheet" href="./CSS/fullSite.css">
    <link rel="stylesheet" href="./CSS/index.css">
    
</head>
<body>
    
    <?php
        require_once('./Elements/db_connection.php');
        require_once('./Elements/header.php');
    ?>

    <!-- Search / Filter Form -->
        <!-- ToDo: Change to index.php and add handling -->
    <form action="./index.html" id="filter-header-form">

        <!-- View Icons -->
        <div id="view-icons-container">
            <div id="restaurant-view-container">
                <img src="" alt="ToDo: Add view Icons" id="restaurant-view">
            </div>
            <div id="dish-view-container">
                <img src="" alt="ToDo: Add view Icons" id="dish-view">
            </div>
        </div>

        <!-- Your Location -->
        <div id="location-container">
            <p>Your Location: <span id="location">956 Notre Dame st.</span></p>
        </div>

        <!-- Your Allergens -->
        <div id="allergens-container">
            <div class="allergen">
                <p>Sardines</p>
            </div>
            <div class="allergen">
                <p>Cheese</p>
            </div>
            <div class="allergen">
                <p>Pizza</p>
            </div>
            <div id="add-allergen-container">
                <label for="add-allergen">Add Allergen:</label>
                <input type="text" id="add-allergen" name="add-allergen">
            </div>
        </div>

        <!-- Sort Interface -->
        <div id="sort-interface">

            <p id="sort-title">Sort:</p>
            
            <!-- Sort Buttons -->
            <div id="sort-buttons">

                <div class="sort-button">
                    <input type="radio" id="proximity" name="sort">
                    <label for="proximity">By Proximity</label>
                </div>

                <div class="sort-button">
                    <input type="radio" id="alphebetical" name="sort">
                    <label for="alphebetical">Alphebetically</label>
                </div>

                <div class="sort-button">
                    <input type="radio" id="reverse-A" name="sort">
                    <label for="reverse-A">Reverse Alphebetically</label>
                </div>

            <!-- ToDo: Come up with more sorts -->

            </div>
        </div>

        <!-- Search Bar -->
        <div id="search-container">
            <input type="text" placeholder="Search..." id="search">
        </div>
    </form>

</body>
</html>