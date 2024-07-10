<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<meta 	http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
	<link rel = "stylesheet" href="{{ asset('css/styleBuy.css') }}">
	<title> VerticalRise </title>
</head>

<body>

<input type="checkbox" id="check">

<section>

	<div class = "navbar">
    <a href="/home"><div class="logo"><img src="{{ asset('vr_image/vrWhite.png') }}"></div></a>
			<ol class = "menuitems">
				<li><a href="/home"> home </a></li>
				<li><a href="/shirts"> <b style="color: #f58f22;"> shirts </b> </a></li>
				<li><a href="/about"> about </a></li>
				<li><a href="/order"> account </a></li>
			</ol>

		<label for="check" class="fa fa-bars"> </label>
	</div>
	


	<div class = "containerBuy">

		<div class = "textBuy">
			<h2> VR Candy Tee </h2>
			<p>	WHITE </p>
			<h5>Php 500.00</h5>
		
			<br>
			<button>Buy Now</button>
		</div>


		<div class="imageAbout">
			<div class="imgbox">
				<img src="{{ asset('vr_image/candy.jpg') }}" alt="user pic">
			</div>
		</div>



	</div>
	







	<div class="icons">
		<i class="fa fa-instagram"><span>Instagram</span></i><br>
		<i class="fa fa-facebook"><span>  Facebook</span></i><br>
	</div>
	
	
	
</section>




</body>
</html>

