<!DOCTYPE html>
<html lang="en">
  <head>
  
  @include('admin.css')
<style>
    .center{
        text-align:center;
        font-size:25px;
        font-weight:bold;
        padding-bottom:40px;
    }
    .table_design{
        border:2px solid white;
        margin:auto;
        width:90%;
        text-align:center;
    }
    .th_design{
        background:skyblue;
    }
    .image_size{
        width:250px;
        height:200px;
    }
</style>  
</head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.header')
     <div class="main-panel">
        <div class="content-wrapper" style="width:85%; margin-left:244px; margin-top:-734px; ">
            <h1 class="center">All Orders</h1>
            <table class="table_design">
                <tr class="th_design">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th> Delivery Status</th>
                    <th> Image</th>
                </tr>
             @foreach($order as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td><img src="/product/{{$order->image}}" class="image_size" alt=""></td>
                  
                </tr>
                @endforeach
            </table>
        </div>
     </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   
  </body>
  @include('admin.script')

</html>