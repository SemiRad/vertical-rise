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

    <form action="{{url('update-data/'.$item->id)}}" method="post" enctype="multipart/form-data">
    @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
        @method('PUT')
  <div class="form-outline mb-4">
  <label class="form-label" for="shirt_name">Shirt Name: </label>
    <input type="text" name="shirt_name" class="form-control" placeholder="Shirt" value="{{$item->shirt_name}}" required />
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="shirt_size">Shirt Size:</label><br>
  <select class="custom-select" id="inputGroupSelect01" name="shirt_size">
    <option value="">Select...</option>
    <option value="SMALL" {{$item->shirt_size == 'SMALL' ? 'selected' : ''}}>SMALL</option>
    <option value="MEDIUM" {{$item->shirt_size == 'MEDIUM' ? 'selected' : ''}}>MEDIUM</option>
    <option value="LARGE" {{$item->shirt_size == 'LARGE' ? 'selected' : ''}}>LARGE</option>
    <option value="X-LARGE" {{$item->shirt_size == 'X-LARGE' ? 'selected' : ''}}>X-LARGE</option>
  </select>
</div>


  <div class="form-outline mb-4">
  <label class="form-label" for="unit_price">Unit Price: </label>
    <input type="text" name="unit_price" class="form-control" placeholder="Price" value="{{$item->unit_price}}" required />
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="shirt_qty">Quantity: </label>
    <input type="number" name="shirt_qty" class="form-control" placeholder="Available Stocks" min="1" value="{{$item->shirt_qty}}" required />
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="shirt_color">Color:</label><br>
  <select class="custom-select" id="inputGroupSelect01" name="shirt_color">
    <option value="">Select...</option>
    <option value="WHITE" {{$item->shirt_color == 'WHITE' ? 'selected' : ''}}>WHITE</option>
    <option value="BLACK" {{$item->shirt_color == 'BLACK' ? 'selected' : ''}}>BLACK</option>
    <option value="BEIGE" {{$item->shirt_color == 'BEIGE' ? 'selected' : ''}}>BEIGE</option>
  </select>
</div>


<div class="form-outline mb-4">
  <label class="form-label" for="shirt_img">Image:</label><br>
  <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" name="shirt_img" />
</div>

    @if ($item->shirt_img)
    <div class="mb-4">
    <label>Current Image:</label><br>
    <img src="{{ asset('shirtImg/'.$item->shirt_img) }}" alt="Current Image" width="200" class="img img-responsive">
    </div>
    @endif

  <button class="btn btn-success btn-block mb-4" type="submit">Save</button>
</form>
  </body>