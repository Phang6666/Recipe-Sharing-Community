<!DOCTYPE html>
<html>
<head>
    <title>MumMum Recipe Sharing Community</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php include('include/header.php'); ?>
    <script>
      function handleLinkClick(event) {
        if(event.target.id == "logout") {
          alert("Logout Successfully! ");
        }
      }

      var links = document.querySelectorAll('a');
        for (var i = 0; i < links.length; i++) {
            links[i].addEventListener('click', handleLinkClick);
        }
    </script>


<section class="hero">
  <div class="hero-content">
    <h1>Welcome to MumMum Recipe Sharing Community</h1>
    <p>Search mouth watering recipes to satisfy your craving</p>
    <a href="recipe.php" class="btn">Explore Recipe</a>
  </div>
</section>

<section class="about dark-theme" id="about">
  <div class="about-content">
    <h2>About MumMum Recipe Sharing Community</h2>
    <p>Welcome to MumMum, your ultimate destination for food enthusiasts to come together, discover, and share an array of delightful recipes. We pride ourselves on creating a community where culinary creativity flourishes. Whether you're a seasoned chef or a kitchen newbie, MumMum offers a platform to explore a rich tapestry of dishes, from time-honored classics to exciting new innovations. Our mission is to inspire, connect, and celebrate the joy of cooking and sharing food. Dive in and embark on a gastronomic journey with us!</p>
    <a href="recipe.php" class="btn">Explore Recipe</a>
  </div>
  <div class="about-image">
    <img src="image/about-img.jpg" alt="About Image">
  </div>
</section>


<section class="featured">
  <h2>Featured Recipe</h2>
  <div class="featured-items">
    <div class="featured-item">
      <img src="image/featured1.jpg" alt="Burger 1">
      <h3>Nasi Lemak</h3>
      <p>A traditional Malaysian dish consisting of fragrant rice cooked in coconut milk, served with various accompaniments.</p>
    </div>
    <div class="featured-item">
      <img src="image/featured2.jpg" alt="Burger 2">
      <h3>Curry Laksa</h3>
      <p>A popular Malaysian noodle soup with a rich and spicy coconut curry broth.</p>
    </div>
    <div class="featured-item">
      <img src="image/featured3.jpg" alt="Burger 3">
      <h3>Kuey Tiau</h3>
      <p>A popular Malaysian stir-fried noodle dish.</p>
    </div>
  </div>
</section>


<section class="testimonials">
  <h2>What Our Users Say</h2>
  <div class="testimonial">
    <img src="image/customer_1.jpg" alt="Customer 1">
    <p>"The contact form is straightforward and easy to use. Glad to see the multiple options for types of inquiries. Very user-friendly!"</p>
    <h4>John Cena</h4>
  </div>
  <div class="testimonial">
    <img src="image/customer_2.jpg" alt="Customer 2">
    <p>"The About section really caught my attention. It's so well-written and makes me want to join this recipe sharing community!"</p>
    <h4>Jackie Chan</h4>
  </div>
</section>

<section class="contact" id="contact">
  <div class="contact-container">
    <h2>Contact Us</h2>
    <div class="contact-info">
      <div class="info-item">
        <i class="fas fa-map-marker-alt"></i>
        <p>32, Jln ABC, Sg Long </p>
      </div>
      <div class="info-item">
        <i class="fas fa-phone-alt"></i>
        <p>+60 12 345 6789</p>
      </div>
      <div class="info-item">
        <i class="fas fa-envelope"></i>
        <p>info@recipeshare.com</p>
      </div>
    </div>

    <form action="contactsuccess.php" class="contact-form" method="post" id="contactForm" enctype="multipart/form-data">
			
	    <div id="nameInput">
			Name: <input type="text" name ="name" id="name">
			<div class="error"></div>
		</div><br>
				
		<div id="emailInput">
			E-mail: <input type="text" name ="email" id="email">
			<div class="error"></div>
		</div><br>
				
		<div id="phoneInput">
			Phone: <input type="text" name ="phone" id="phone">
			<div class="error"></div>
		</div><br>
				
		<div id="enquiryInput">
			Type of Enquiry: <br>
			<select id="enquiry" name="enquiry" required>
				<option value="general">General Enquiry</option>
				<option value="complaint">Complaint</option>
				<option value="suggestion">Suggestion</option>
			</select>
			<div class="error"></div><br>
		</div><br>
				
		<div id="subjectInput">
			Subject: <br>
			<textarea name="subject" rows="20" cols="30"></textarea>
			<div class="error"></div>
		</div><br>
				
		<button type="submit">Submit</button>
			
	</form>
  </div>
</section>


<?php include('include/footer.php'); ?>
<script src='script.js'></script>

</body>