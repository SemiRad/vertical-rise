<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
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
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 900px;
        font-family: calibri;
        font-size: 44px;
        border-radius: 32px;
        text-align: center;
    }

    .modal-content h4 {
        text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #07084F;
    font-size: 60px;
    margin: 35px 0;
    }

    .modal-button-container {
        text-align: right;
        margin-top: 20px;

    }

    .modal-button-container input {
        width: 250px;
        margin: 40px 280px 0px 0px;
        font-size: 32px;
        font-weight: bold;
        font-family: calibri;
        margin-bottom: 5%;
        color: white;
        background-color: #ED5E68;
        cursor: pointer;
        height: 56px;
        border-style: none;
        border-radius: 32px;
    }</style>
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
    <br>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card mt-5">
                <div class="input-group">
                </div>
                    <div class="card-header text-center">
                    <div class="input-group">
                    <div class="form-outline">
                    <form type="get" action="search">
                  </div>
                    <input type="search" name="shirtSearch" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                    </form>
                  </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <br>
                        <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Shirt Name</th>
                    <th scope="col">Shirt Size</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Color</th>
                    <th scope="col">Shirt Image</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                </thead>
                @foreach($shirtList as $item)
    <tbody>
    <tr>
        <td class="text-center">{{$item->shirt_name}}</td>
        <td class="text-center">{{$item->shirt_size}}</td>
        <td class="text-center">{{$item->unit_price}}</td>
        <td class="text-center">{{$item->shirt_qty}}</td>
        <td class="text-center">{{$item->shirt_color}}</td>                                   
        <td class="text-center"><img src="{{ asset('shirtImg/'. $item->shirt_img )}}" width="100" class="img img-responsive"></td>
        <td>
            <form method="get" id="myForm" action="{{ route('edit', ['item' => $item->id]) }}">
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </td>

<td>
    <form method="get" id="delForm{{$item->id}}" action="{{ route('delete', ['item' => $item->id]) }}">
        <button class="btn btn-danger" onclick="showModal(event, {{$item->id}})">Delete</button>
        <!-- MODAL -->
        <div id="myModal{{$item->id}}" class="modal">
            <div class="modal-content">
                <h4>Confirm Deletion</h4>
                <p>Are you sure you want to delete this shirt?</p>
                <div class="modal-button-container">
                    <input type="submit" value="YES" form="delForm{{$item->id}}">
                    <input type="button" value="NO" style="background-color: rgba(0, 0, 0, 0.4);" onclick="hideModal({{$item->id}})">
                </div>
            </div>
        </div>
    </form>
</td>

    </tr>
@endforeach

                </tr>
                </tbody>
              </table>
              <form action="/add" method="get">
                <button type="submit" class="btn btn-success" value="">
                      Add Shirt
                    </button></a></td> 
                </form>     
                  </div>
                  
            </div>
        </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">

    </script>
  </body>
</html>