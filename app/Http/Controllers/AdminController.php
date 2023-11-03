<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Catagory;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Complaint;

use Illuminate\Http\Request;
class AdminController extends Controller
{
        public function view_catagory()
        {
            $data=catagory::all();
            return view('admin.catagory',compact('data'));
        }

        public function add_catagory(Request $request)
        {
            $data=new catagory;
            $data->catagory_name=$request->catagory;
            
            $data->save();
            return redirect()->back()->with('message','Catagory Added Successfully');
        }

        public function delete_catagory($id){
            $data=catagory::find($id);

            $data->delete();

            return redirect()->back()->with('message','Catagory Deleted Successfully');
        }


        public function add_product(){
            $catagory=catagory::all();
            return view('admin.product',compact('catagory'));
        }

        public function added_product(Request $request){
             $product=new products;   
             $product->title=$request->title;
             $product->description=$request->description;
             $product->price=$request->product_price;
             $product->quantity=$request->product_quantity;
             $product->discount_price=$request->discount_price;
             $product->category=$request->catagory;

                    // to STORE IMAGES 
            $image= $request->product_image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->product_image->move('product',$imagename);
            $product->image=$imagename;
            $product->save();

             return redirect()->back()->with('message','Product Added Successfully');
        }

        public function show_product(){

            $product=products::all();
            return view('admin.show_product', compact('product'));
        }

        public function delete_product($id){

            $product = products::find($id);
            
            $product->delete();

            return redirect()->back()->with('message','Product Deleted Successfully');
        }

        public function update_product($id){

            $product = products::find($id);
            $catagory=catagory::all();

            return view('admin.update_product', compact('product','catagory'));
        }


        public function update_product_confirm($id,Request $request){

            $product = products::find($id);

            $product->title=$request->title;
            $product->description=$request->description;
            $product->price=$request->product_price;
            $product->quantity=$request->product_quantity;
            $product->discount_price=$request->discount_price;
            $product->category=$request->catagory;

                   // to STORE IMAGES 
           $image= $request->product_image;
           if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->product_image->move('product',$imagename);
            $product->image=$imagename;
           }
           
           $product->save();

            return redirect()->back()->with('message','Product Updated Successfully');

        }


        //Complaints

        public function show_complaints(){

            $complaint=Complaint::all();
            return view('admin.show_complaints',compact('complaint'));
        }
}
