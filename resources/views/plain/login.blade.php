<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('css/styleLogin.css') }}">
    <link rel = "icon" href = "/vr_image/vrLOGO.png" type = "image/x-icon">
  <title>VerticalRise</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                
            @if(Session::has('fail'))
                    <div class = "alert-danger" style="color: #842029;
                    width:100%;
                    background-color: red;
                    border-color: #f5c2c7; position: relative;
                    padding: 1rem 1rem;
                    border: 1px solid transparent;
                    border-radius: 0.25rem;
                    font-family: arial;
                    text-align: center;
                    text-transform: uppercase;"><strong>{{Session::get('fail')}}</strong></div>
                    @endif    
                <form action="{{ route('login') }}" method="POST">
                    <h1>Login</h1>
                        @csrf
                        <div class="inputBox">
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="text" id="username" name="username" required>
                            <label for="username">Username</label>
                        </div>

                        <div class="inputBox">  
                            <ion-icon name="lock-closed-outline"></ion-icon>                        
                            <input type="password" id="password" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <br>
                        <div class="btn">
                            <input type="submit" value="Login">
                        </div>  

                        <div class="signup">
                            <p> Don't have an account? <br><a style="color:rgb(139,0,0);" href="/signup"> Register </a></p>
                        </div>
                </form>
            </div>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
