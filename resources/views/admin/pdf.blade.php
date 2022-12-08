<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>PDF</title>

</head>
<body>
    <h1 style="text-align: center">ORDERS DETAILS</h1>

<div class="container">
  <div class="row" >
    <div class="col-lg-6">
        Customer Name: <h5>{{$order->name}}</h5>
        Customer Email: <h5>{{$order->email}}</h5>
        Customer Phone No: <h5>{{$order->phone}}</h5>
        Customer Address: <h5>{{$order->address}}</h5>


       </div>

    <div class=" col-lg-6" >
        Product : <h5>{{$order->product_title}}</h5>
        Product Id : <h5>{{$order->product_id}}</h5>
        Price : <h5>{{$order->price}}</h5>
        Quantity: <h5>{{$order->quantity}}</h5>
        Payment_status: <h5>{{$order->payment_status}}</h5>
        delivery_status: <h5>{{$order->delivery_status}}</h5>
        <img src="product/{{$order->image}}" alt="" style="width: 200px ; border-radius:50%">
    </div>
</div>
</div>

    @include('admin.script')
</body>
</html>
