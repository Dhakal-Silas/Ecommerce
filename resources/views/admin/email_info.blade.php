<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  @include('admin.css')
  <style>
    label{
        display:inline-block;
        width:200px;
        font-size:15px;
        font-weight:bold;
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
        <h1 style="text-align:center;font-size:25px;">Send E-mail to {{$order->email}}</h1>
       <form action="{{url('send_user_email',$order->id)}}"style="position:relative;" method="post">
       @csrf 
       <div style="padding-left:35%; padding-top:30px;">
            <label for="">Email Greeting</label>
            <input type="text" name="greeting" style="color:black;">
        </div>

        <div style="padding-left:35%; padding-top:30px;">
            <label for="">Email Firstline</label>
            <input type="text" name="firstline" style="color:black;">
        </div>

        <div style="padding-left:35%; padding-top:30px;">
            <label for="">Email Body</label>
            <input type="text" name="body" style="color:black;">
        </div>
        <div style="padding-left:35%; padding-top:30px;">
            <label for="">Email Button name</label>
            <input type="text" name="button" style="color:black;">
        </div>
        <div style="padding-left:35%; padding-top:30px;">
            <label for="">Email URL</label>
            <input type="text" name="url" style="color:black;">
        </div>

        <div style="padding-left:35%; padding-top:30px;">
            <label for="">Email lastline</label>
            <input type="text" name="lastline" style="color:black;">
        </div>
        <div style="padding-left:35%; padding-top:30px;">
            
            <input type="submit" value="Send Email" class="btn btn-primary">
        </div>
        </form>
    
    </div>
            
    </div>
        <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
   
  </body>
  @include('admin.script')

</html>