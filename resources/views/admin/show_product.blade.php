<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style>
    .center{
        margin:auto;
        width:50%;
        border:2px solid white;
        text-align:center;
        margin-top:40px;
    }
    .font_size{
        text-align:center;
        font-size:40px;
        padding-top:20px;
    }
    .img_size{
        width:150px;
        height:150px;
        object-fit:cover;
    }
    .th_color{
        background:skyblue;
    }
    .th_design{
        padding:30px;
    }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper" style="width:85%; margin-left:244px; margin-top:-734px; ">
            @if (session()->has('message'))

<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {{session()->get('message')}}
</div>

@endif
            <h2 class="font_size">All Products</h2>
            <table class="center" style="position:relative;">
                <tr class="th_color">
                    <th class="th_design">Product Title</th>
                    <th class="th_design">Description</th>
                    <th class="th_design">Quantity</th>
                    <th class="th_design">Category</th>
                    <th class="th_design">Price</th>
                    <th class="th_design">Discount Price</th>
                    <th class="th_design"> Product Image</th>
                    <th class="th_design"> Delete</th>
                    <th class="th_design"> Edit</th>
                </tr>
                
                @foreach($product as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>                
                    <td>
                        <img src="/product/{{$product->image}}" class="img_size" alt="">
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete this?')"class ="btn btn-danger" href="{{url('/delete_product',$product->id)}}">Delete</a>
                    </td>
                    <td>
                        <a class ="btn btn-success" href="{{url('/update_product',$product->id)}}">Edit</a>
                    </td>
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