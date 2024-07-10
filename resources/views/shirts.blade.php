<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<meta 	http-equiv="X-UA-Compatible" content="ie=edge">
	
	<!-- Icons -->
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

	<!-- CSS Link -->
	<link rel = "stylesheet" href="{{ asset('css/styleShirt.css') }}">
	<link rel = "stylesheet" href="../css/all.min.css">
	
	<!--Box Icons
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->

	<link rel = "icon" href = "/vr_image/vrLOGO.png" type = "image/x-icon">
  <title>VerticalRise</title>
	<script>
    function showModal(event, itemId) {
        event.preventDefault();
        var modal = document.getElementById("myModal" + itemId);
        modal.style.display = "block";
    }

    function hideModal(itemId) {
        var modal = document.getElementById("myModal" + itemId);
        modal.style.display = "none";
    }
</script>

<style>
    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
		font-family: 'Montserrat', sans-serif;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 900px;
        font-size: 44px;
        border-radius: 32px;
        background-color:black;
        text-align: center;
    }

    .modal-content h4 {
        text-align: center;
    color: #07084F;
    font-size: 60px;
    margin: 35px 0;
    }

    .modal-button-container {
        text-align: right;
        margin-top: 0px;
		height: 200px;

    }

    .modal-button-container input {
        width: 250px;
        margin: -10px 300px 0px 0px;
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 5%;
        color: white;
        cursor: pointer;
        height: 56px;
        border-style: none;
        border-radius: 32px;
    }
	
	.modal-content p {
		line-height: 150%;
		font-size: 24px;
		color: white;
	}</style>
</head>

<body>

<input type="checkbox" id="check">
<section>
		<div class = "navbar">
		<a href="/home"><div class="logo"><img src="{{ asset('vr_image/vrWhite.png') }}"></div></a>
			<ol class = "menuitems">
				<li><a href="/home"> home </a></li>
				<li><a href="/shirts"><b style="color: #f58f22;"> shirts </b></a></li>
				<li><a href="/about"> about </a></li>
				<li><a href="/order"> order </a></li>
				<li><a href="/account"> account </a></li>
			</ol>

		<label for="check" class="fa fa-bars"> </label>
	</div>
	

	<div class = "containerShirts">

		<div class = "head">
			<img src="{{ asset('vr_image/year.png') }}" alt="user pic">
			<h1> SHIRT COLLECTIONS </h1>
		</div>

	
		<div class="products">
    @foreach($shirtList as $item)
    <!--Individual Shirt Box-->
    <form method="post" id="createOrder{{$item->id}}" action="/createOrder">
        @csrf
        <div class="shirt">
            <div class="image">
                <img src="{{ asset('shirtImg/'. $item->shirt_img )}}">
            </div>
            <div class="description">
            <input type="hidden" name="shirt_id" value="{{$item->id}}">
            <input type="hidden" name="order_date" value="{{ now() }}">
                <h3>{{$item->shirt_name}}</h3>
                <h6>Php {{$item->unit_price}}</h6>
                <p>{{$item->shirt_size}}</p>
                <p>{{$item->shirt_color}}</p>
            </div>
            <div class="buy">
                <button id="buyBtn" onclick="showModal(event, {{$item->id}})">Buy Now</button>
            </div>
        </div>

        <!-- MODAL -->
        <div id="myModal{{$item->id}}" class="modal">
            <div class="modal-content">
                <h4 style="color: #fbaa09; text-transform: uppercase;">Confirm Purchase</h4>
                <p>Are you sure you want to buy <span style="color: #fbaa09; text-transform: uppercase;">{{$item->shirt_name}}?</span></p>
                <p>
                    Size: {{$item->shirt_size}}<br>
                    Price: Php {{$item->unit_price}}<br>
                    Color: {{$item->shirt_color}}
                </p><br>
                <div class="modal-button-container">
                    <input type="submit" value="YES" style="background-color: #fbaa09; display: inline; visibility: visible; -webkit-appearance: none; appearance: none;" form="createOrder{{$item->id}}">
                    <input type="button" value="NO" style="background-color: white; color: black; display: inline; visibility: visible; -webkit-appearance: none; appearance: none;" onclick="hideModal({{$item->id}})">
                </div>
            </div>
        </div>
    </form>
    @endforeach
</div>


	</div>

	<div class="icons">
        <a href = "https://www.instagram.com/verticalriseco/" target="_blank"><i class="fa fa-instagram"><span>Instagram</span></i><br></a>
		<a href = "https://www.facebook.com/verticalriseco" target="_blank"><i class="fa fa-facebook"><span>  Facebook</span></i><br></a>
	</div>
	
</section>


<script src="../js/all.min.js"></script>

</body>
</html>

