<?php
// save_to_wishlist.php

// Connect to the database (replace these values with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mummumrecipe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get recipe ID from POST data
$recipeId = $_POST['recipeId'];

// Check if the recipe already exists in the wishlist
$stmt = $conn->prepare("SELECT id FROM wishlist WHERE recipe_id = ?");
$stmt->bind_param("i", $recipeId);
$stmt->execute();
$stmt->store_result();
$count = $stmt->num_rows;
$stmt->close();

if ($count > 0) {
    // Recipe already in wishlist, so remove it
    $stmt = $conn->prepare("DELETE FROM wishlist WHERE recipe_id = ?");
    $stmt->bind_param("i", $recipeId);
    $stmt->execute();
    echo 'removed';
} else {
    // Recipe not in wishlist, so add it
    $stmt = $conn->prepare("INSERT INTO wishlist (recipe_id) VALUES (?)");
    $stmt->bind_param("i", $recipeId);
    $stmt->execute();
    echo 'added';
}
$stmt->close();
$conn->close();
?>