<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$database = "mummumrecipe";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search term from the query string
$searchTerm = $_GET["q"] ?? "";

// Query to retrieve recipes matching the search term
$sql = "SELECT * FROM recipes WHERE title LIKE '%$searchTerm%'";
$result = $conn->query($sql);

$recipes = [];

// Fetch the matching recipes
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
}

// Close connection
$conn->close();

// Return the matching recipes as JSON
header("Content-Type: application/json");
echo json_encode($recipes);
?>
