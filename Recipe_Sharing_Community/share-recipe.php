<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Recipe</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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

        p {
            color: #ccc;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .recipe-form {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
        }

        .recipe-form form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .recipe-form label {
            color: #ccc;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .recipe-form input[type="text"],
        .recipe-form textarea,
        .recipe-form input[type="number"]
        {  
            width: 400px;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            max-width: 800px;
        }

        .recipe-form select{
            width: 400px;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            background-color: #1f1f1f;
            color: #fff;
            max-width: 800px;
        }

        .recipe-form textarea{
            height:200px;
        }


        .recipe-form input[type="file"] {
            margin-bottom: 20px;
        }

        .recipe-form button {
            padding: 10px 20px;
            background-color: #009688;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .recipe-form button:hover {
            background-color: #00796b;
        }

    

        .error {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }

        @media (max-width: 600px) {
            .recipe-form {
                padding: 10px;
            }

            h2 {
                font-size: 24px;
            }

            p {
                font-size: 16px;
            }
        }

       
    </style>
</head>
<body>
    <?php include('include/header.php'); ?>
    <h2>Add a Recipe</h2>
    <p>Uploading personal recipes is easy! Add yours to your favorites, share with friends, family, or the MumMumRecipe community.
    </p><br>

    <section class="recipe-form">
        <form action="submit-recipe.php" method="post" enctype="multipart/form-data" id="recipeForm">
            
            <div id="titleInput">
                Recipe Title: <br><input type="text" id="title" name="title" placeholder="Give your recipe a title">
                <div class="error"></div>
            </div><br>
            
            <div id="descriptionInput">
                Description: <br><textarea id="description" name="description" placeholder="Share the story behind your recipe and what makes it special."></textarea>
                <div class="error"></div>
            </div><br>
            
            <div id="photoInput">
                Upload Photo: <br><input type="file" id="photo" name="photo">
                <div class="error"></div>
            </div><br>
            
            <div id="ingredientInput">
                Ingredients: <br><textarea id="ingredient" name="ingredient" placeholder="Enter ingredient"></textarea>
                <div class="error"></div>
            </div><br>
          
            <div id="directionInput">
                Directions: <br><textarea id="direction" name="direction" placeholder="Enter step"></textarea>
                <div class="error"></div>
            </div><br>

            <div id="servingsInput">
                Servings: <br><input type="number" id="servings" name="servings" min="1" placeholder="e.g.8">
                <div class="error"></div>
            </div><br>
            
            <div id="prepTimeInput">
                Preparation Time: <br><input type="number" id="prep-time-value" name="prep-time-value" min="1">
                <select id="prep-time-unit" name="prep-time-unit" required>
                    <option value="mins">mins</option>
                    <option value="hours">hours</option>
                    <option value="days">days</option>
                </select>
                <div class="error"></div>
            </div><br>

            <div id="cookTimeInput">
                Cook Time (optional): <br><input type="number" id="cook-time-value" name="cook-time-value" min="1">
                <select id="cook-time-unit" name="cook-time-unit">
                    <option value="mins">mins</option>
                    <option value="hours">hours</option>
                    <option value="days">days</option>
                </select>
                <div class="error"></div>
            </div><br>

            <div id="totalTimeInput">
                Total Time: <br><input type="text" id="total-time" name="total-time" readonly>
                <div class="error"></div>
            </div><br>

            <div id="notesInput">
                Notes (optional): <br><textarea id="notes" name="notes"></textarea>
                <div class="error"></div>
            </div><br>
            
            <button type="submit">Submit Recipe</button>
            
        </form>
    </section>
    <?php include('include/footer.php'); ?>
    <script src='recipevalidation.js'></script>
</body>
</html>
