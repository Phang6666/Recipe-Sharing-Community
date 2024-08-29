<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recipe Page</title>
<link rel="stylesheet" href="recipestyle.css"> <!-- Link to your CSS file -->
</head>
<body>
<?php include('include/header.php'); ?>

<br>

<div class="search-container">
    <input type="text" id="search-input" placeholder="Search...">
    <!-- No records found message -->
    <p id="no-records" class="no-records" style="display: none; color: red;">No records found</p>
</div>

<div class="recipe-container" id="recipe-container">
    <!-- Recipes will be dynamically loaded here -->
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-input");
    const recipeContainer = document.getElementById("recipe-container");
    const noRecordsMessage = document.getElementById("no-records");

    // Function to fetch all recipes from the database
    function fetchAllRecipes() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "search.php?q=", true); // Empty search term fetches all recipes
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Parse the response as JSON
                    const response = JSON.parse(xhr.responseText);
                    // Clear previous recipe cards
                    recipeContainer.innerHTML = "";

                    if (response.length > 0) {
                        // Append recipe cards to the recipe container
                        response.forEach(function(recipe) {
                            const card = document.createElement("div");
                            card.classList.add("recipe-card");
                            card.innerHTML = `
                                <div class='recipe-content'>
                                    <h2>${recipe.title}</h2>
                                    <img src='photo/${recipe.photo}' alt='Recipe Image'>
                                </div>

                                <div class="like-button">
                                    <div class="heart-bg">
                                        <div class="heart-icon" data-id="${recipe.id}"></div>
                                    </div>
                                </div>
                                <a href='view_recipe.php?id=${recipe.id}' class='view-recipe'>View Recipe</a>
                            `;
                            recipeContainer.appendChild(card);
                        });
                        // Add event listener to all like buttons
                        const likeIcons = document.querySelectorAll('.heart-icon');
                        likeIcons.forEach(function(likeIcon) {
                            likeIcon.addEventListener('click', function() {
                                console.log('Love icon clicked');
                                const recipeId = likeIcon.getAttribute('data-id');
                                saveToWishlist(recipeId);
                            });
                        });
                        noRecordsMessage.style.display = "none"; // Hide no records message
                    } else {
                        noRecordsMessage.style.display = "block"; // Show no records message
                    }
                } else {
                    console.error("Error: " + xhr.status);
                }
            }
        };
        xhr.send();
    }

    // Function to save recipe to wishlist
   
    function saveToWishlist(recipeId) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "save_to_wishlist.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const response = xhr.responseText;
                    if (response === 'added') {
                        alert('Recipe added to wishlist!');
                    } else if (response === 'removed') {
                        alert('Recipe removed from wishlist!');
                    }
                    console.log('Recipe saved to wishlist!!!!!');
                } else {
                    console.error("Error: " + xhr.status);
                }
            }
        };
        xhr.send(`recipeId=${recipeId}`);
    }



    // Fetch all recipes when the page loads
    fetchAllRecipes();

    // Add event listener to search input field
    searchInput.addEventListener("input", function() {
        const searchTerm = searchInput.value.trim().toLowerCase(); // Convert search term to lowercase for case-insensitive search

        // Send AJAX request to the PHP file
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "search.php?q=" + encodeURIComponent(searchTerm), true); // Encode search term to handle special characters
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Parse the response as JSON
                    const response = JSON.parse(xhr.responseText);
                    // Clear previous recipe cards
                    recipeContainer.innerHTML = "";

                    if (response.length > 0) {
                    // Append recipe cards to the recipe container
                    response.forEach(function(recipe) {
                        const card = document.createElement("div");
                        card.classList.add("recipe-card");
                        card.innerHTML = `
                            <div class='recipe-content'>
                                <h2>${recipe.title}</h2>
                                <img src='photo/${recipe.photo}' alt='Recipe Image'>
                            </div>
                            <div class="like-button">
                                <div class="heart-bg">
                                    <div class="heart-icon" data-id="${recipe.id}"></div>
                                </div>
                            </div>
                            <a href='view_recipe.php?id=${recipe.id}' class='view-recipe'>View Recipe</a>
                        `;
                        recipeContainer.appendChild(card);
                    });

                    // Reattach event listeners to the like buttons
                    const likeIcons = document.querySelectorAll('.heart-icon');
                    likeIcons.forEach(function(likeIcon) {
                        likeIcon.addEventListener('click', function() {
                            console.log('Love icon clicked');
                            const recipeId = likeIcon.getAttribute('data-id');
                            saveToWishlist(recipeId);
                        });
                    });

                    noRecordsMessage.style.display = "none"; // Hide no records message
                } else {
                    noRecordsMessage.style.display = "block"; // Show no records message
                }
                } else {
                    console.error("Error: " + xhr.status);
                }
            }
        };
        xhr.send();
    });

    
});

</script>
<?php include('include/footer.php'); ?>

</body>
</html>