<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Recipe</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #1f1f1f;
            color: #fff;
            text-align: center;
        }

        h2 {
            color: #f3f700;
            border-bottom: 2px solid #fff;
            padding-bottom: 10px;
            font-family: cursive;
            font-weight: bold;
            font-size: 30px;
        }

        .form-feedback {
            font-style: italic;
            font-weight: bold;
            max-width: 80%;
            margin: 0 auto;
            word-wrap: break-word;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        h3 {
            color: #009688;
            margin-top: 20px;
            font-style: italic;
            font-size: 20px;
        }

        p {
            margin: 10px 0;
            max-width: 80%;
            margin: 0 auto;
            word-wrap: break-word;
            line-height: 1.5;
        }

        strong {
            color: #07d7fc;
        }

        p img {
            width: 500px;
            height: 300px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #009688;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #00796b;
        }
    </style>
</head>
<body>
    <?php include('include/header.php'); ?>
    <br><h2>Thanks for sharing! Every recipe adds flavor to our community.</h2><br>
    
    <?php
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

    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $photo = $_FILES['photo']['name'];
    $ingredients = $_POST['ingredient'];
    $directions = $_POST['direction'];
    $servings = $_POST['servings'];
    $prep_time_value = $_POST['prep-time-value'];
    $prep_time_unit = $_POST['prep-time-unit'];
    $cook_time_value = $_POST['cook-time-value'];
    $cook_time_unit = $_POST['cook-time-unit'];
    $total_time = $_POST['total-time'];
    $notes = $_POST['notes'];

    // Create uploads directory if it doesn't exist
    if (!file_exists('photo')) {
        mkdir('photo', 0777, true);
    }

    // Upload photo
    $target_dir = "photo/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "<div class='form-feedback'>The file " . basename($_FILES["photo"]["name"]) . " has been uploaded.</div><br>";
    } else {
        echo "<div class='form-feedback'>Sorry, there was an error uploading your file.</div><br>";
    }

    // Insert data into database
    $sql = "INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
            VALUES ('$title', '$description', '$photo', '$ingredients', '$directions', $servings, $prep_time_value, '$prep_time_unit', $cook_time_value, '$cook_time_unit', '$total_time', '$notes')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='form-feedback'>New record created successfully</div><br>";
    } else {
        echo "<div class='form-feedback'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
    ?>


    <!-- Break line -->
    <hr>


    <!-- Display submitted data -->
    
    <h3>Submitted Recipe Details:</h3>
    <p><strong>Recipe Title:</strong><br> <?php echo $title; ?></p>
    <p><strong>Description:</strong><br> <?php echo $description; ?></p>
    <p><strong>Photo:</strong><br> <img src="photo/<?php echo $photo; ?>" alt="<?php echo $title; ?>" width="100"></p>
    <p><strong>Ingredients:</strong><br> <?php echo $ingredients; ?></p>
    <p><strong>Directions:</strong><br> <?php echo $directions; ?></p>
    <p><strong>Servings:</strong><br> <?php echo $servings; ?></p>
    <p><strong>Preparation Time:</strong><br> <?php echo $prep_time_value . ' ' . $prep_time_unit; ?></p>
    <p><strong>Cook Time:</strong><br> <?php echo $cook_time_value . ' ' . $cook_time_unit; ?></p>
    <p><strong>Total Time:</strong><br> <?php echo $total_time; ?></p>
    <p><strong>Notes:</strong><br> <?php echo $notes; ?></p>

    <!-- Back to Home button -->
    <a href="index.php" class="btn">Back to Home</a>
    <a href="share-recipe.php" class="btn">Add More Recipe</a>

    <?php include('include/footer.php'); ?>
</body>
</html>