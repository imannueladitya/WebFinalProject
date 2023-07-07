@include('layouts.app')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link href="{ asset('/css/HbomePage.css') }" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
  <div class="container">
   <table class="table table-bordered" width="100%" cellspacing="0">
   <thead>
    <tr>
      <th>Transaction ID</th>
      <th>User Name</th>      
      <th>Produk A</th>
      <th>Quantity</th>
      <th>Produk B</th>
      <th>Quantity</th>
      <th>Produk C</th>
      <th>Quantity</th>
      <th>Transaction Total Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cards as $card)
      <tr>
        <td>{{ $card->transactionId }}</td>
        <td>{{ $card->username }}</td>
        @foreach($card->products as $key => $value)
          <td>{{ $key }}</td>
          <td>{{ $value }}</td>
        @endforeach
        <td>{{ $card->totalPrice }}</td>
      </tr>
    @endforeach
  </tbody>
    </div>
   


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
