//contact form validation

// Select the HTML elements needed for validation
const form = document.getElementById('contactForm');
const nameInput = document.getElementById('name');
const emailInput = document.getElementsByName('email')[0];
const phoneInput = document.getElementsByName('phone')[0];
const enquiryInput = document.getElementById('enquiryInput');
const subjectInput = document.getElementById('subjectInput');

// Add event listener to the form for submission
form.addEventListener('submit', function(event) {
	event.preventDefault();
	const errors = [];

	// Validate the name input field
	if (nameInput.value.trim() === '') {
		errors.push('Please enter your name');
		nameInput.nextElementSibling.innerHTML = 'Please enter your name';
		nameInput.nextElementSibling.style.color = 'red'; // set color to red
	} else {
		nameInput.nextElementSibling.innerHTML = '';
	}
	
	// Validate the email input field
	if (emailInput.value.trim() === '') {
		errors.push('Please enter your email address');
		emailInput.nextElementSibling.innerHTML = 'Please enter your email address';
		emailInput.nextElementSibling.style.color = 'red'; // set color to red
	} else if (!isValidEmail(emailInput.value.trim())) {
		errors.push('Please enter a valid email address');
		emailInput.nextElementSibling.innerHTML = 'Please enter a valid email address';
		emailInput.nextElementSibling.style.color = 'red'; // set color to red
	} else {
		emailInput.nextElementSibling.innerHTML = '';
	}
  
	// Validate the phone number input field
	if (phoneInput.value.trim() === '') {
		errors.push('Please enter your phone number');
		phoneInput.nextElementSibling.innerHTML = 'Please enter your phone number';
		phoneInput.nextElementSibling.style.color = 'red'; // set color to red
	} else if (!/^\d+$/.test(phoneInput.value.trim())) {
		errors.push('Phone number should contain numbers only');
		phoneInput.nextElementSibling.innerHTML = 'Phone number should contain numbers only';
		phoneInput.nextElementSibling.style.color = 'red'; // set color to red
	} else {
		phoneInput.nextElementSibling.innerHTML = '';
	}

	// Validate the subject input field
	if (subjectInput.querySelector('textarea').value.trim() === '') {
		errors.push('Please enter your message');
		subjectInput.lastElementChild.innerHTML = 'Please enter your message';
		subjectInput.lastElementChild.style.color = 'red'; // set color to red
	} else {
		subjectInput.lastElementChild.innerHTML = '';
	}
  
	// Submit the form if there are no errors
	if (errors.length === 0) {
		form.submit();
	}
});



// Function to validate email using a regular expression
function isValidEmail(email) {
    const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    return emailRegex.test(email);
}




