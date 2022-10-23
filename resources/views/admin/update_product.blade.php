<!DOCTYPE html>
<html lang="en">
  <head>
<base href="/public">
  @include('admin.css')

  <style>
    .div_center{
        text-align:center;
        padding-top:40px;
        position: relative;
  
    }
    .font_size{
        font-size:40px;
        padding-bottom:40px;
    }
    .text_color{
        color:#000;
        padding-bottom:20px;
    }
    label{
        display:inline-block;
        width:200px;
    }
    .div_design{
        padding-bottom:15px;
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
        <div class="content-wrapper" style="width:85%; margin-left:244px; margin-top:-662px; ">
        @if (session()->has('message'))

<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  {{session()->get('message')}}
</div>

@endif
            <div class="div_center">
                <h1 class="font_size">Update Product</h1>

                <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label > Product Title</label>
                        <input class="text_color" type="text" name="title" value="{{$product->title}}"placeholder="Write a Title" required>
                    </div>
                        
                    <div class="div_design">
                        <label > Product Description</label>
                        <input class="text_color" type="text" name="description"  value="{{$product->description}}" placeholder="Write Product Description" required>
                    </div>

                    <div class="div_design">
                        <label > Product Price</label>
                        <input class="text_color" type="number" name="price" value="{{$product->price}}" placeholder="Write a Price" required>
                    </div>
                    <div class="div_design">
                        <label > Discount Price</label>
                        <input class="text_color" type="number" name="discountprice" value="{{$product->discount_price}}" placeholder="Write discount price if applied">
                    </div>

                    <div class="div_design">
                        <label > Product Quantity</label>
                        <input class="text_color" type="number" name="quantity" min="0" value="{{$product->quantity}}" placeholder="Write product quantity" required>
                    </div>

                    <div class="div_design">
                        <label > Product category</label>
                        <select name="category" class="text_color" id="" required>
                            <option value="{{$product->category}}" selected>{{$product->category}}</option>

                            @foreach($category as $category)
                           
                           <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                           @endforeach
                            
                         
                        </select>
                    </div>
                    <div class="div_design">
                        <label > Current Product Image </label>
                        <img  style="margin:auto;"height="150" width="150" src="/product/{{$product->image}}" alt="">
                    </div>


                    <div class="div_design">
                        <label > Change Product Image </label>
                        <input  type="file" name="image" >
                    </div>

                    <div class="div_design">
                        
                        <input  type="submit" value="Update Product" class="btn btn-primary" >
                    </div>
            </form>
            </div>
        </div>
    </div>
  </body>
  @include('admin.script')

</html>