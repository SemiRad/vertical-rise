<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel = "icon" href = "/vr_image/vrLOGO.png" type = "image/x-icon">
  <title>VerticalRise</title>
  </style>
</head>

  <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
    <div class="container">
    @php
    $userId = \App\Models\User::where('id', '=', Session::get('loginID'))->first();
@endphp

<a class="navbar-brand" href="{{ $userId->is_admin ? '/admin' : '/home' }}">VERTICAL RISE</a>

      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      
      <!-- Left links 
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="/admin">Shirt</a>
        </li>
        </ul>
      Left links -->

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item ms-3">
            <a class="btn btn-black btn-rounded" href="/home">Home</a>
          </li>

          <li class="nav-item ms-3">
            <a class="btn btn-black btn-rounded" href="/shirts">Shirts</a>
          </li>

          <li class="nav-item ms-3">
            <a class="btn btn-black btn-rounded" href="/about">About</a>
          </li>
          
          <li class="nav-item ms-3">
            <a class="btn btn-black btn-rounded" href="/order">Order</a>
          </li>

          <li class="nav-item ms-3">
            <a class="btn btn-black btn-rounded" href="/logout">Logout</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <body>
    <br>
      <div class="container" style="line-height: 200%;">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card mt-5">
                <div class="input-group">
                </div>
                    <div class="card-header">
                    <div class="input-group">
                    <div class="form-outline">    
                  </div>  
                  </div>
                  <h1 style="text-align: center;">USER DETAILS</h1>
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <br>
                    

                    <form method="post" action="{{ route('updateUser') }}">
                    @csrf
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" required>
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" required>
  </div>
  <div class="form-group">
    <label for="birthday">Birthday</label>
    <input type="date" class="form-control" id="birthday" name="birthday" value="{{$user->birthday}}" required>
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender" value="{{$user->gender}}" required>
    <option value="" disabled>Select Gender</option>
      <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
      <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
      <option value="Other" {{ $user->gender === 'Other' ? 'selected' : '' }}>Other</option>
    </select>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" required>
  </div>
  <div class="form-group">
    <label for="contact">Contact</label>
    <input type="text" class="form-control" id="contact" name="contact" value="{{$user->contact}}" required>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}" required>
  </div>
</br>
  <button type="submit" class="btn btn-success">Save Changes</button>
</form>

                  </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">

    </script>
  </body>
</html>