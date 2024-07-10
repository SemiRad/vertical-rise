<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('css/styleSignUp.css') }}">
    <link rel = "icon" href = "/vr_image/vrLOGO.png" type = "image/x-icon">
  <title>VerticalRise</title>
</head>
<body>
<section>
        <div class="form-box">
            <div class="form-value">
                
                @if (session('success'))
                    <div>{{ session('success') }}</div>
                @endif

                <form action="{{ route('signup') }}" method="POST">
                <h1>Signup</h1>
                    @csrf

                <div class="boxInput">
                    <input type="text" id="first_name" name="first_name" autocapitalize="words" required>
                    <label for="first_name">First Name</label>
                </div>

                <div class="boxInput">
                    <input type="text" id="last_name" name="last_name" autocapitalize="words" required>
                    <label for="last_name">Last Name</label>
                </div>

                <div class="boxInput">
                    <input type="date" id="birthday" name="birthday" required max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>">
                    <label for="birthday">Birthday</label>
                </div>

                <div class="boxInput">
                    <select id="gender" name="gender" required>
                        <option value=""> </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <label for="gender">Gender</label>
                </div>

                <div class="boxInput">
                    <textarea id="address" name="address" autocapitalize="words" required></textarea>
                    <label for="address">Address</label>
                </div>

                <div class="boxInput">
                    <input type="tel" id="contact" name="contact" required>
                    

                    <label for="contact">Contact</label>
                </div>

                <div class="boxInput">
                    <input type="text" id="username" name="username" required>
                    <label for="username">Username</label>
                </div>
                @error('username')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror

                <div class="boxInput">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>

                <div class="signBtn">
                    <input type="submit" value="Sign Up">
                </div>
                </form>


        </div>
    </div>
</section>
</body>
</html>
