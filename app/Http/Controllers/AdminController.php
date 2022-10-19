<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
class AdminController extends Controller
{
  public function view_category()
  {
    $data=Category::all();
    return view('admin.category',compact('data'));
  }

  public function add_category(Request $request)
  {
    $data= new Category;
    $data->category_name=$request->category;
    $data->save();

    return redirect()->back()->with('message', 'Category Added Successfully');
  }

  public function delete_category($id)
  {
    $data=Category::find($id);
    $data->delete();
    return redirect()->back()->with('message','Category Deleted Successfully');
  }
  public function view_product()
  {
    $category=  Category::all();
    return view('admin.product',compact('category'));
  }

  public function add_product(Request $request)
  {
    $product= new Product;
    $product->title=$request->title;
    $product->description=$request->description;
    $product->price=$request->price;
    $product->discount_price=$request->discountprice;
    $product->quantity=$request->quantity;
    $product->category=$request->category;
  // img starts here
    $image=$request->image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imagename);
    $product->image=$imagename;
    // img ends here
    $product->save();
    return redirect()->back()->with('message','Product Added Successfully');
  }

  public function show_product()
  {
    $product=Product::all();
    return view('admin.show_product',compact('product'));
  }

  public function delete_product($id)
  {
    $product= Product::find($id);
    $product->delete();
    return redirect()->back()->with('message','Product Deleted Successfully');
  }
  public function update_product($id)
  {
    $category=Category::all();
    $product=Product::find($id);
    return view('admin.update_product',compact('product','category'));
  }
  public function update_product_confirm(Request $request,$id)
  {
    $product=Product::find($id);
    $product->title=$request->title;
    $product->description=$request->description;
    $product->price=$request->price;
    $product->discount_price=$request->discountprice;
    $product->category=$request->category;
    $product->quantity=$request->quantity;

    $image=$request->image;
    if($image)
    {
      $imagename=time().'.'.$image->getClientOriginalExtension();
      $request->image->move('product',$imagename);
      $product->image=$imagename;

    }

    $product->save();
    return redirect()->back()->with('message','Product Updated Successfully');
  }

  public function order()
  {
    $order=Order::all();
    return view('admin.order',compact('order'));
  }
  public function delivered($id)
  {
    $order= Order::find($id);
    $order->delivery_status="Delivered";
    $order->payment_status="paid";
    $order->save();
    return redirect()->back();
    
  }
  public function print_pdf($id)
  {
    $order=Order::find($id);

    $pdf=PDF::loadView('admin.pdf',compact('order'));
    return $pdf->download('oreder_details.pdf');
  }

  public function send_email($id)
  {
    $order=Order::find($id);
    return view('admin.email_info');
  }
}
