<?php
include('include/header.php');

// wishlist.php

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

// Check if a recipe ID is provided in the query string (for deleting a specific item from the wishlist)
if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $recipeIdToDelete = $_GET['delete'];
    
    // Prepare and execute SQL statement to delete the recipe from the wishlist
    $stmt = $conn->prepare("DELETE FROM wishlist WHERE id = ?");
    $stmt->bind_param("i", $recipeIdToDelete);
    if ($stmt->execute()) {
        echo "<script>alert('Recipe removed from wishlist!');</script>";
    } else {
        echo "<script>alert('Error removing recipe from wishlist!');</script>";
    }
}

// Query to retrieve recipes from the wishlist table
$sql = "SELECT recipes.*, wishlist.id AS wishlist_id FROM recipes INNER JOIN wishlist ON recipes.id = wishlist.recipe_id";
$result = $conn->query($sql);

// Check if there are any items in the wishlist
if ($result->num_rows > 0) {
    // Output each item in the wishlist
    while($row = $result->fetch_assoc()) {
        echo "<div class='recipe-details'>";
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<img src='photo/" . $row["photo"] . "' alt='" . $row["title"] . "'>";
        echo "<p>Description: " . $row["description"] . "</p>";
        echo "<p>Ingredients: " . $row["ingredients"] . "</p>";
        echo "<p>Directions: " . $row["directions"] . "</p>";
        echo "<p>Servings: " . $row["servings"] . "</p>";
        echo "<p>Prep Time: " . $row["prep_time_value"] . " " . $row["prep_time_unit"] . "</p>";
        echo "<p>Cook Time: " . $row["cook_time_value"] . " " . $row["cook_time_unit"] . "</p>";
        echo "<p>Total Time: " . $row["total_time"] . "</p>";
        echo "<p>Notes: " . $row["notes"] . "</p>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='delete_id' value='" . $row['wishlist_id'] . "'>";
        echo "<button type='submit' name='remove'>Remove from Wishlist</button>";
        echo "</form>";
        echo "</div>";
        
    }
} else {
    // No items in the wishlist
    echo "<p class='empty-wishlist'>😢Your wishlist is empty.😢</p>";
    
}

// Close connection
$conn->close();

// Check if the remove button is clicked
if(isset($_POST['remove'])) {
    if(isset($_POST['delete_id'])) {
        $deleteId = $_POST['delete_id'];
        
        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL statement to delete the recipe from the wishlist
        $stmt = $conn->prepare("DELETE FROM wishlist WHERE id = ?");
        $stmt->bind_param("i", $deleteId);

        if ($stmt->execute()) {
            echo "<script>alert('Recipe removed from wishlist!');</script>";
            // Refresh the page to reflect changes
            echo "<script>window.location.href='wishlist.php';</script>";
        } else {
            echo "<script>alert('Error removing recipe from wishlist!');</script>";
        }

        // Close connection
        $conn->close();
    }
}
include('include/footer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

</body>
</html>