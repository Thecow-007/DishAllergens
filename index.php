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
                <img src="./Site_Images/Icons/house.png" alt="ToDo: Add view Icons" id="restaurant-view"class="icon">
            </div>
            <div id="dish-view-container">
                <img src="./Site_Images/Icons/soup.png" alt="ToDo: Add view Icons" id="dish-view" class="icon">
            </div>
        </div>

        <!-- Your Location -->
        <div id="location-container">
            <p>Your Location: <span id="location">956 Notre Dame st.</span></p>
        </div>

        <!-- Your Allergens -->
        <div id="allergens-container">
            <div id="allergens-title-container">
                <p id="allergens-title">Allergens:</p>
            </div>
            <div id="allergens">
                <div class="allergen">
                    <p>Sardines</p>
                </div>
                <div class="allergen">
                    <p>Cheese</p>
                </div>
                <div class="allergen">
                    <p>Pizza</p>
                </div>
            </div>
        </div>
        
        <div id="add-allergen-container">
            <label for="add-allergen">Add Allergen:</label>
            <input type="text" id="add-allergen" name="add-allergen">
        </div>
        
        <div id="sort-interface">
            <a href="" id="sort-link">Sort Results</a>
        </div>
    </form>

    <main>
        <!-- Example Restaurant Card -->
        <div class="restaurant-card">
            <!-- Title -->
            <div class="rest-title">
                <h3>Pascalli's Pizzeria</h3>
            </div>

            <!-- Info Section -->
            <div class="info">
                <div class="info-title-container">
                    <p class="info-title">Info:</p>
                </div>

                <div class="info-list-container">
                    <ul class="info-list">
                        <li>(613) 608-7777</li>
                        <li>956 Pizza Lane</li>
                        <li>PizzaPlace.com</li>
                    </ul>
                </div>
            </div>

            <!-- Dishes -->
            <div class="dishes">
                <div class="dishes-title-container">
                    <p class="dishes-title">Dishes:</p>
                </div>

                <div class="dishes-list-container">
                    <ul class="dishes-list">
                        <li>Pepperoni Pizza</li>
                        <li>Vegetable Pizza</li>
                        <li>Wings</li>
                    </ul>
                </div>
            </div>

            <div class="image-grid">
                <img src="./pic/foodPics/pizza1.jpg" alt="A picture of Pizza" class="foodPic">
                <img src="./pic/foodPics/pizza2.jpg" alt="A picture of Pizza" class="foodPic">
                <img src="./pic/foodPics/pizza3.jpg" alt="A picture of Pizza" class="foodPic">
                <img src="./pic/foodPics/pizza4.jpg" alt="A picture of Pizza" class="foodPic">
            </div>

        </div>
    </main>

</body>
</html>