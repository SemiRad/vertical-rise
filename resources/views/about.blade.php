<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<meta 	http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
	<link rel = "stylesheet" href="{{ asset('css/styleAbout.css') }}">
	<link rel = "icon" href = "/vr_image/vrLOGO.png" type = "image/x-icon">
  <title>VerticalRise</title>
</head>

<body>

<input type="checkbox" id="check">

<section>

	<div class = "navbar">
	<a href="/home"><div class="logo"><img src="{{ asset('vr_image/vrWhite.png') }}"></div></a>
			<ol class = "menuitems">
				<li><a href="/home"> home </a></li>
				<li><a href="/shirts"> shirts </a></li>
				<li><a href="/about"><b style="color: #f58f22;"> about </b></a></li>
				<li><a href="/order"> order </a></li>
				<li><a href="/account"> account </a></li>
			</ol>

		<label for="check" class="fa fa-bars"> </label>
	</div>
	


	<div class = "containerAbout">

		<div class = "textAbout">
			<h2> ABOUT </h2>
				<p>	
				A clothing brand based in Dumaguete City, Negros Oriental <br>
				Established 2020 <br>
				<br><br>
				VerticalRise goes beyond being a mere clothing brand, it embodies a vibrant movement that goes hand in hand with the stories we yearn to share with the world. 	<br><br>
				When you wear VerticalRise, you join a tribe of like-minded individuals who support and encourage one another in their pursuit of greatness. <br><br>
				We firmly believe that clothing is not solely about fabrics and designs; it is a medium that enables extraordinary experiences and gives life to captivating stories. <br><br>VerticalRise strives to create a space where individuals can connect, relate, and bond through their shared passion for adventure, self-expression, and the audacity to dream big. 
				<br>	<br>

				The Creative Collection Since 2020<br>
				Passion and Commitment<br>
				</p>
		</div>

		<div class="imageAbout">
			<div class="imgbox">
				<img src="{{ asset('vr_image/1111.png') }}" alt="user pic">
			</div>
		</div>
	</div>
	<div class="icons">
        <a href = "https://www.instagram.com/verticalriseco/" target="_blank"><i class="fa fa-instagram"><span>Instagram</span></i><br></a>
		<a href = "https://www.facebook.com/verticalriseco" target="_blank"><i class="fa fa-facebook"><span>  Facebook</span></i><br></a>
	</div>
	
	
	
</section>




</body>
</html>

