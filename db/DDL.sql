CREATE DATABASE IF NOT EXISTS Allergy_app;

USE Allergy_app;

CREATE TABLE Restaurant (
    Restaurant_ID INT AUTO_INCREMENT PRIMARY KEY,
    Restaurant_Name VARCHAR(255) NOT NULL,
    Restaurant_Address VARCHAR(255) NOT NULL,
    Restaurant_Type VARCHAR(50),
    Restaurant_Phone VARCHAR(20),
    Restaurant_Website VARCHAR(255),
    Restaurant_Email VARCHAR(255),
    Restaurant_Password VARCHAR(255),
    Restaurant_Image1 INT,
    Restaurant_Image2 INT,
    Restaurant_Image3 INT,
    Restaurant_Image4 INT,
    FOREIGN KEY (Restaurant_Image1) REFERENCES Dish_Images(Dish_Image_ID),
    FOREIGN KEY (Restaurant_Image2) REFERENCES Dish_Images(Dish_Image_ID),
    FOREIGN KEY (Restaurant_Image3) REFERENCES Dish_Images(Dish_Image_ID),
    FOREIGN KEY (Restaurant_Image4) REFERENCES Dish_Images(Dish_Image_ID)
);

CREATE TABLE Dish (
    Dish_ID INT AUTO_INCREMENT PRIMARY KEY,
    Dish_Name VARCHAR(255) NOT NULL,
    Dish_Price DECIMAL(10, 2) NOT NULL,
    Restaurant_ID INT NOT NULL,
    Dish_Image_ID INT,
    FOREIGN KEY (Restaurant_ID) REFERENCES Restaurant(Restaurant_ID),
    FOREIGN KEY (Dish_Image_ID) REFERENCES Dish_Images(Dish_Image_ID)
);

CREATE TABLE Dish_Images (
    Dish_Image_ID INT AUTO_INCREMENT PRIMARY KEY,
    Dish_Image LONGBLOB
);

CREATE TABLE Allergens (
    Allergens_ID INT AUTO_INCREMENT PRIMARY KEY,
    Allergens_Name VARCHAR(50) NOT NULL
);

CREATE TABLE Dish_Allergens (
    Dish_Allergens_ID INT AUTO_INCREMENT PRIMARY KEY,
    Dish_ID INT NOT NULL,
    Allergens_ID INT NOT NULL,
    FOREIGN KEY (Dish_ID) REFERENCES Dish(Dish_ID),
    FOREIGN KEY (Allergens_ID) REFERENCES Allergens(Allergens_ID)
);

CREATE TABLE `User` (
    User_ID INT AUTO_INCREMENT PRIMARY KEY,
    User_Name VARCHAR(255) NOT NULL,
    User_Password VARCHAR(255) NOT NULL,
    User_Address VARCHAR(255),
    User_Photo LONGBLOB
);

CREATE TABLE User_Allergens (
    User_Allergens_ID INT AUTO_INCREMENT PRIMARY KEY,
    User_ID INT NOT NULL,
    Allergens_ID INT NOT NULL,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID),
    FOREIGN KEY (Allergens_ID) REFERENCES Allergens(Allergens_ID)
);
