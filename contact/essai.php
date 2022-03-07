<?php include 'sendemail.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Contact </title>
    <link rel="stylesheet" href="style_essai.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="fontawesome.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  </head>
  <body>
    <nav>
		<input type="checkbox" id="check">
			<label for="check" id="but">
			<i class="fas fa-bars"></i>
			
		</label>
		<label class="logo">GIS WEB For Tourism</label>
        <img id="navlogo" src="cnct2.png" alt="logo">
		<ul>
			<li><a href="home.html"><i class="fas fa-home "></i>  Home</a></li>
			<li><a  href="about.html"><i class="fa fa-user" aria-hidden="true"></i> </i>About</a>
			 
			   </li>	
			<li><a href="index.html"><i class="fas fa-map"></i>  Map</a></li>		
			<li><a class="active" href="#"><i class="fa fa-phone-square" aria-hidden="true"></i> Contact</a></li>
		<!--<li><a href="Feedback.html"><i class="fas fa-comment-dots"></i> Feedback</a></li>	-->						
		</ul>
	</nav>
    <!--alert messages start-->
    <?php echo $alert; ?>
    <!--alert messages end-->

    <!--contact section start-->
    <div class="contact-section">
        <div class="contact-info">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3192.743018356942!2d10.258608621140937!3d36.84863017880832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd3555faa36e8f%3A0x4528e66643abc266!2sCentre%20National%20De%20la%20Cartographie%20Et%20La%20T%C3%A9l%C3%A9d%C3%A9tection!5e0!3m2!1sen!2stn!4v1646586063686!5m2!1sen!2stn" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
         <!-- <div><i class="fas fa-map-marker-alt"></i>Address, City, Country</div>
          <div><i class="fas fa-envelope"></i>contact@email.com</div>
          <div><i class="fas fa-phone"></i>+00 0000 000 000</div>
          <div><i class="fas fa-clock"></i>Mon - Fri 8:00 AM to 5:00 PM</div>-->
        </div>
        <div class="contact-form">
          <h2>Contact Us</h2>
          <form class="contact" action="" method="post">
            <input type="text" name="name" class="text-box" placeholder="Your Name" required>
            <input type="email" name="email" class="text-box" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <input type="submit" name="submit" class="send-btn" value="Send">
          </form>
        </div>
      </div>
    <!--contact section end-->
    <script type="text/javascript">
        if(window.history.replaceState){
          window.history.replaceState(null, null, window.location.href);
        }
        </script>
  </body>
</html>