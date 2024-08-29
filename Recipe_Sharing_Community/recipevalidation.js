// Recipe form validation

// Select the HTML elements needed for validation
const recipeForm = document.getElementById('recipeForm');
const titleInput = document.getElementById('title');
const descriptionInput = document.getElementById('description');
const photoInput = document.getElementById('photo');
const ingredientInput = document.getElementById('ingredient');
const directionInput = document.getElementById('direction');
const servingsInput = document.getElementById('servings');
const prepTimeValueInput = document.getElementById('prep-time-value');
const prepTimeUnitInput = document.getElementById('prep-time-unit');
const cookTimeValueInput = document.getElementById('cook-time-value');
const cookTimeUnitInput = document.getElementById('cook-time-unit');
const notesInput = document.getElementById('notes');

// Add event listener to the form for submission
recipeForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const errors = [];

    // Validate the title input field
    if (titleInput.value.trim() === '') {
        errors.push('Please enter a recipe title');
        document.querySelector('#titleInput .error').innerHTML = 'Please enter a recipe title';
        document.querySelector('#titleInput .error').style.color = 'red';
    } else {
        document.querySelector('#titleInput .error').innerHTML = '';
    }

    // Validate the description input field
    if (descriptionInput.value.trim() === '') {
        errors.push('Please enter a recipe description');
        document.querySelector('#descriptionInput .error').innerHTML = 'Please enter a recipe description';
        document.querySelector('#descriptionInput .error').style.color = 'red';
    } else {
        document.querySelector('#descriptionInput .error').innerHTML = '';
    }

    // Validate the photo input field
    if (photoInput.value.trim() === '') {
        errors.push('Please upload a photo for the recipe');
        document.querySelector('#photoInput .error').innerHTML = 'Please upload a photo for the recipe';
        document.querySelector('#photoInput .error').style.color = 'red';
    } else {
        document.querySelector('#photoInput .error').innerHTML = '';
    }

    // Validate the ingredients input field
    if (ingredientInput.value.trim() === '') {
        errors.push('Please enter the ingredients for the recipe');
        document.querySelector('#ingredientInput .error').innerHTML = 'Please enter the ingredients for the recipe';
        document.querySelector('#ingredientInput .error').style.color = 'red';
    } else {
        document.querySelector('#ingredientInput .error').innerHTML = '';
    }

    // Validate the directions input field
    if (directionInput.value.trim() === '') {
        errors.push('Please enter the cooking directions for the recipe');
        document.querySelector('#directionInput .error').innerHTML = 'Please enter the cooking directions for the recipe';
        document.querySelector('#directionInput .error').style.color = 'red';
    } else {
        document.querySelector('#directionInput .error').innerHTML = '';
    }

    // Validate the servings input field
    if (servingsInput.value.trim() === '' || servingsInput.value <= 0) {
        errors.push('Please enter a valid number of servings');
        document.querySelector('#servingsInput .error').innerHTML = 'Please enter a valid number of servings';
        document.querySelector('#servingsInput .error').style.color = 'red';
    } else {
        document.querySelector('#servingsInput .error').innerHTML = '';
    }

    // Validate the preparation time input fields
    if (prepTimeValueInput.value.trim() === '' || prepTimeValueInput.value <= 0) {
        errors.push('Please enter a valid preparation time');
        document.querySelector('#prepTimeInput .error').innerHTML = 'Please enter a valid preparation time';
        document.querySelector('#prepTimeInput .error').style.color = 'red';
    } else {
        document.querySelector('#prepTimeInput .error').innerHTML = '';
    }

    // Validate the cook time input fields
    if (cookTimeValueInput.value.trim() !== '' && cookTimeValueInput.value <= 0) {
        errors.push('Please enter a valid cook time');
        document.querySelector('#cookTimeInput .error').innerHTML = 'Please enter a valid cook time';
        document.querySelector('#cookTimeInput .error').style.color = 'red';
    } else {
        document.querySelector('#cookTimeInput .error').innerHTML = '';
    }

    // Submit the form if there are no errors
    if (errors.length === 0) {
        recipeForm.submit();
    }
});




window.addEventListener("DOMContentLoaded", function() {
    // Call the calculateTotalTime function whenever there is a change in prep time or cook time
    document.getElementById("prep-time-value").addEventListener("input", calculateTotalTime);
    document.getElementById("prep-time-unit").addEventListener("input", calculateTotalTime);
    document.getElementById("cook-time-value").addEventListener("input", calculateTotalTime);
    document.getElementById("cook-time-unit").addEventListener("input", calculateTotalTime);
});


function calculateTotalTime() {
    var prepTimeValue = parseInt(document.getElementById("prep-time-value").value);
    var prepTimeUnit = document.getElementById("prep-time-unit").value;
    var cookTimeValue = parseInt(document.getElementById("cook-time-value").value);
    var cookTimeUnit = document.getElementById("cook-time-unit").value;
    
    var totalMinutes = 0;

    if (!isNaN(prepTimeValue)) {
        if (prepTimeUnit === "hours") {
            totalMinutes += prepTimeValue * 60;
        } else if (prepTimeUnit === "days") {
            totalMinutes += prepTimeValue * 24 * 60;
        } else {
            totalMinutes += prepTimeValue;
        }
    }

    if (!isNaN(cookTimeValue)) {
        if (cookTimeUnit === "hours") {
            totalMinutes += cookTimeValue * 60;
        } else if (cookTimeUnit === "days") {
            totalMinutes += cookTimeValue * 24 * 60;
        } else {
            totalMinutes += cookTimeValue;
        }
    }

    var hours = Math.floor(totalMinutes / 60);
    var minutes = totalMinutes % 60;

    var totalTime = "";
    if (hours > 0) {
        totalTime += hours + " hours ";
    }
    if (minutes > 0) {
        totalTime += minutes + " mins";
    }

    document.getElementById("total-time").value = totalTime;
}

// Call the calculateTotalTime function whenever there is a change in prep time or cook time
document.getElementById("prep-time-value").addEventListener("input", calculateTotalTime);
document.getElementById("prep-time-unit").addEventListener("input", calculateTotalTime);
document.getElementById("cook-time-value").addEventListener("input", calculateTotalTime);
document.getElementById("cook-time-unit").addEventListener("input", calculateTotalTime);

