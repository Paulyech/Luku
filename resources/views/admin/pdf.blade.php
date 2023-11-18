<!DOCTYPE html>
<html>
    <head>

    <title>Order PDF</title>
    </head>

    <body>
        <h1 >Order Details</h1>
           Customer Name:<h3>{{$order->name}}</h3>
            Email:<h3>{{$order->email}}</h3>
            Phone Number:<h3>{{$order->phone}}</h3>
            Address:<h3>{{$order->address}}</h3>
            Product :<h3>{{$order->product_title}}</h3>
            Quantity:<h3>{{$order->quantity}}</h3>
            Total Price:<h3>{{$order->price}}</h3>
            Payment Status:<h3>{{$order->payment_status}}</h3>
            <br>
            <img src="{{ asset('storage/' . $order->image) }}" alt=" Image">


    </body>

</html>