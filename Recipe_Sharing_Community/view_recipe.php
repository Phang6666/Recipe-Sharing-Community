<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Recipe</title>
<link rel="stylesheet" href="view_recipe_style.css"> <!-- Link to your CSS file -->
</head>
<body>
<?php include('include/header.php'); ?>

<div class="recipe-details-container">
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

    // Get the recipe ID from the URL
    $recipe_id = $_GET["id"] ?? "";

    // Query to retrieve the recipe details
    $sql = "SELECT * FROM recipes WHERE id = $recipe_id";
    $result = $conn->query($sql);

    // Fetch the recipe details
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="recipe-details">
                <h2><?php echo $row['title']; ?></h2>
                <img src="photo/<?php echo $row['photo']; ?>" alt="Recipe Image">
                <p><?php echo $row['description']; ?></p>
                <p>Ingredients:</p>
                <ul>
                    <?php
                    // Explode ingredients string into an array
                    $ingredients = explode(", ", $row['ingredients']);
                    foreach ($ingredients as $ingredient) {
                        echo "<li>$ingredient</li>";
                    }
                    ?>
                </ul>
                <p>Directions:</p>
                <ol>
                    <?php
                    // Explode directions string into an array
                    $directions = explode("\n", $row['directions']);
                    foreach ($directions as $direction) {
                        echo "<li>$direction</li>";
                    }
                    ?>
                </ol>
                <p>Servings: <?php echo $row['servings']; ?></p>
                <p>Preparation Time: <?php echo $row['prep_time_value'] . ' ' . $row['prep_time_unit']; ?></p>
                <p>Cooking Time: <?php echo $row['cook_time_value'] . ' ' . $row['cook_time_unit']; ?></p>
                <p>Total Time: <?php echo $row['total_time']; ?></p>
                <p>Notes: <?php echo $row['notes']; ?></p>
            </div>

            <button id="back-button">Back</button>
            <button id="scroll-to-top-button">Scroll to Top</button>
            <script>
                document.getElementById("back-button").addEventListener("click", function() {
                    window.history.back();
                });
            </script>

            <script>
                // Function to scroll to top smoothly
                function scrollToTop() {
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                }

                // Add event listener to the button
                document.getElementById("scroll-to-top-button").addEventListener("click", scrollToTop);
            </script>

    
            <?php
        }
    } else {
        echo "No recipe found";
    }

    // Close connection
    $conn->close();
    ?>
</div>

<?php include('include/footer.php'); ?>

</body>
</html>
