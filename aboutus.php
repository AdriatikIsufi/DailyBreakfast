<?php

include_once('path.php');
include_once(ROOT_PATH . '/control/posts.php');
include_once(ROOT_PATH . '/database/crudMethods.php');

// $posts = selectAll('posts', ['published' => 1]);

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us</title>

	<link rel="stylesheet" type="text/css" href="css/aboutus.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@700&family=Manrope:wght@600&display=swap" rel="stylesheet">
</head>
<body>

	<!-- HEADER Includes -->
	<?php
        if(isset($_SESSION['admin'])){
            if($_SESSION['admin'] == 1){
                include('includes/headerAdmin.php');
            }else{
                include('includes/headerUser.php');
            }
        }else {
            include('includes/header.php');
        }
    ?>

  	<div class="team">
  		<div class="container">
  	 	  	<h1 style="color: black;">Ekipa jonë</h1>
  	 	  	<div class="card">
  	 	  	  	<div class="box" style="background-color: #2c3954 !important;">
  	 	  	  	  <img src="images/aboutus/one.jpg" alt="team img" 
								style="border: 4px solid white;"
								 />
  	 	  	  	  <h4>Blerim Mustafa</h4>
  	 	  	  	  <h5>Full Stack Developer</h5>
  	 	  	  	  <p style="color: lightwhite; font-weight: bold;">Siguron progresin e vazhdueshëm të projektit, zbatimin e deadlines të projektit, etj ...</p>
  	 	  	  	</div>
  	 	  	</div>
  	 	  	<div class="card">
  	 	  	  	<div class="box" style="background-color: #2c3954 !important;">
  	 	  	  	  <img src="images/aboutus/two.jpg" alt="team img" 
								 style="border: 4px solid white;"/>
  	 	  	  	  <h4>Adraitik Isufi</h4>
  	 	  	  	  <h5>Full Stack Developer</h5>
  	 	  	  	  <p style="color: lightwhite; font-weight: bold;">Ndihmoni në menaxhimin e palëve të interesuara, punon me analistët e UI/UX për integrimin e kodit ...</p>
  	 	  	  	</div>
  	 	  	</div>
  	 	  	<div class="card">
  	 	  	  	<div class="box" style="background-color: #2c3954 !important;">
  	 	  	  	  <img src="images/aboutus/three.jpg" alt="team img" 
								 style="border: 4px solid white;"/>
  	 	  	  	  <h4>Leart Marteti</h4>
  	 	  	  	  <h5>Graphic Designer</h5>
  	 	  	  	  <p style="color: lightwhite; font-weight: bold;">Koncepton ndërfaqen e përdoruesit, paraqitjen & rrjedhën e kodeve të lidhura me UI...</p>
  	 	  	  	</div>
  	 	  	</div>
  	 	  	<div class="card">
  	 	  	  <div class="box" style="background-color: #2c3954 !important;">
  	 	  	  	  <img src="images/aboutus/four.jpg" alt="team img" 
								 style="border: 4px solid white;"/>
  	 	  	  	  <h4>Granit Syla</h4>
  	 	  	  	  <h5>Database Administrator</h5>
  	 	  	  	  <p style="color: lightgrey; font-weight: bold;">Dizajnon skemat e bazës së të dhënave, menaxhon aplikacionin, testimin e aplikacionit...</p>
  	 	  	  </div>
  	 	  	</div>
		</div>   
	</div>

	<h1 class="title">Lokacioni</h1>
	<div class="map-wrapper">
		<!-- <div class="map"> -->
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.656166216884!2d21.155078715296252!3d42.64744862489669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549e9333cb0f01%3A0x1f342719345771d0!2sKosovo%20Flag!5e0!3m2!1sen!2s!4v1599089169496!5m2!1sen!2s"
			frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
	

	<!--FOOTER Include-->
	<?php include 'includes/footer.php'; ?>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>