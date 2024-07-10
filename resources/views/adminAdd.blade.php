<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
      <link rel = "icon" href = "/vr_image/vrLOGO.png" type = "image/x-icon">
  <title>VerticalRise</title>
  </head>

  <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
    <div class="container">
      <a class="navbar-brand" href="/home"><span style="color: red;"> ADMIN </span></a>
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
      
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="/admin">Stocks</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="/adminOrder">Orders</a>
        </li>
        </ul>
      <!-- Left links -->

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
  	<br><br>
  	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            	<div class="card mt-5">
                    <div class="card-header text-center">
                        <br>

  	<form action="{{ route('shirts.store') }}" method="post" enctype="multipart/form-data">
    @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
  <div class="form-outline mb-4">
  <label class="form-label" for="shirt_name">Shirt Name: </label>
    <input type="text" name="shirt_name" class="form-control" placeholder="Shirt" value="" required />
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="shirt_size">Shirt Size: </label></br>
  <select class="custom-select" id="inputGroupSelect01" name="shirt_size" value="{">
    <option value="">Select...</option>
    <option value="SMALL">SMALL</option>
    <option value="MEDIUM">MEDIUM</option>
    <option value="LARGE">LARGE</option>
    <option value="X-LARGE">X-LARGE</option>
  </select>
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="unit_price">Unit Price: </label>
    <input type="text" name="unit_price" class="form-control" placeholder="Price" value="" required />
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="shirt_qty">Quantity: </label>
    <input type="number" name="shirt_qty" class="form-control" placeholder="Available Stocks" min="1" value="" required />
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="shirt_color">Color: </label></br>
  <select class="custom-select" id="inputGroupSelect01" name="shirt_color" value="">
    <option value="">Select...</option>
    <option value="WHITE">WHITE</option>
    <option value="BLACK">BLACK</option>
    <option value="BEIGE">BEIGE</option>
  </select>
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="shirt_img">Image: </label>
  <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" name="shirt_img" value=""/>
  </div>

  <button class="btn btn-primary btn-block mb-4" type="submit">Add</button>
</form>
  </body>