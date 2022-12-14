<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style>
    .div_center{
        text-align:center;
        padding-top:40px;
        position:relative;
        
    }
    .h2_font{
        font-size:40px;
        padding-bottom:40px;
    }
    .input_color{
        color:black;
    }
    .table_center{
        margin:auto;
        width:60%;
        text-align:center;
        margin-top:30px;
        border:3px solid white;
        position:relative;
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
          <div class="content-wrapper" style="width:85%; margin-left:244px; margin-top:-662px; ">
          @if (session()->has('message'))

          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
          </div>

          @endif
        <div class="div_center">
            <h2 class="h2_font">Add Category</h2>
           <form action="{{url('/add_category')}}" Method="POST" >
            @csrf
            <input type="text" class="input_color" name="category" placeholder="Write Category Name">
            <input type="submit" class ="btn btn-primary" name="submit" value="Add Category">
           </form>
        </div>

        <table class="table_center">
            <tr>
                <td>Category Name</td>
                <td>Action</td>
            </tr>
            @foreach($data as $data)
            <tr>
                <td>{{$data->category_name}}</td>
                <td>
                    <a onclick ="return confirm('Are you sure to delete this?')"href="{{url('delete_category',$data->id)}}" class="btn btn-danger">Delete</a>
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