


<?php
  include('uheader.php');
 ?>



<div class="col-sm-6 mt-3 bg-light outt">
        <div class="mx-5 mt-4">
          <h1>
           Online Voting System
          </h1>
<style>
	.outt{
		min-height: 31rem;
		background-color: red;
		margin-left: 10%;
	}

	/* The dots/bullets/indicators */
	.dot {
	  cursor: pointer;
	  height: 30px;
	  width: 30px;
	  margin: 0 4px;
	  background-color: #bbb;
	  border-radius: 50%;
	  display: inline-block;
	  transition: background-color 0s ease;
	}

	.active, .dot:hover {
	  background-color: #717171;
	}

	/* Fading animation */
	.fade {
	  animation-name: fade;
	  animation-duration: 36000s;
	}

	@-webkit-keyframes fade {
	  from {opacity:100} 
	  to {opacity: 80}
	}


</style>
</head>
<body>

<div class="slideshow-container">


<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="admin/images/11.jpg" style="height: 100%; width: 100%;">
  <div class="text">Easy Voting</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"> 2 / 3</div>
  <img src="admin/images/12.jpg" style="height: 100%; width: 100%;">
  <div class="text">Fast Voting</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="admin/images/13.jpg" style="height: 100%; width: 100%;">
  <div class="text">Accuracy Voting</div>
</div>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>









<?php
  include('ufooter.php');
 ?>