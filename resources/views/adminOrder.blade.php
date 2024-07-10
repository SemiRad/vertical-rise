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
                  </div>  
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
                    <th scope="col">Shirt Image</th>
                    <th scope="col">Username</th>
                    <th scope="col">Shirt Size</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Color</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Date Ordered</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                </thead>
                @foreach($orderList as $order)
    @php
        $shirtId = $order->shirt_id;
        $shirt = \App\Models\Shirt::find($shirtId);

        $userId = $order->user_id;
        $user = \App\Models\User::find($userId);
    @endphp
    <tbody>
    <tr>
        <td class="text-center"><img src="{{ asset('shirtImg/'. $shirt->shirt_img )}}" width="100" class="img img-responsive"></td>
        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <td class="text-center">{{ $user->username }}</td>
        <td class="text-center">{{ $shirt->shirt_size }}</td>
        <td class="text-center">{{ $shirt->unit_price }}</td>
        <td class="text-center">{{ $shirt->shirt_color }}</td>
        <td class="text-center">{{ $user->address }}</td>  
        <td class="text-center">{{ $user->contact }}</td>  
        <td class="text-center">{{ $order->order_date }}</td>
        <td class="text-center">{{ $order->order_status }}</td>
        <input type="hidden" name="order_date" value="{{ $order->order_date }}">
        <input type="hidden" name="note" value="{{ $order->note }}">                                        
        <td>
        @if($order->order_status !== 'CANCELLED' && $order->order_status !== 'FULFILLED')
                <form method="post" id="delForm" action="/fulfill/{{ $order->id }}">
                    @csrf
                    <button type="submit" class="btn btn-success" onclick="showModal($order->id)">Fulfill</button><br><br>
                </form>
            @else
            <button class="btn btn-success" disabled>Fulfill</button>
            @endif

            @if($order->order_status !== 'CANCELLED' && $order->order_status !== 'FULFILLED')
                <form method="post" id="delForm" action="/cancel/{{ $order->id }}">
                @csrf
                    <button type="submit" class="btn btn-danger" onclick="showModal($order->id)">Cancel</button>
                </form>
            @else
            <button class="btn btn-danger" disabled>Cancel</button>
            @endif
        </td>
    </tr>
@endforeach
                </tr>
                </tbody>
              </table> 
                  </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">

    </script>
  </body>
</html>