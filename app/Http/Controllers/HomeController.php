<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Catagory;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Complaint;

use Razorpay\Api\Api;
use Session;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $product=Products::paginate(9);
        return view('home.userpage',compact('product'));
    }
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }else{
           
        $product=Products::paginate(9);
        return view('home.userpage',compact('product'));
        }
    }

    public function product_details($id){

        $product=Products::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart($id, Request $request){

        if(Auth::id()){
           $user=Auth::user();
            $product=products::find($id);

        //    dd($user)

        $cart=new cart;

        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;
        $cart->product_title=$product->title;

        if($product->discount_price!=null){
            $cart->price=$product->discount_price * $request->quantity;
        }else{
            $cart->price=$product->price * $request->quantity;
        }
        
        $cart->image=$product->image;
        $cart->product_id=$product->id;
        $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back();



        }else{
            return redirect('login');
        }
    }

    public function show_cart(){

        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }else{
            return redirect('login');
        }
       
    }

    public function remove_cart($id){

        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();

    }

    public function cash_order(){
       
       

        $user=Auth::user();
    

        $userid=$user->id;
        //   dd($userid);

        $data=cart::where('user_id','=',$userid)->get();
        
        foreach($data as $data){

            $order= new Order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phoone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title; 
            $order->quantity=$data->quantity;
            $order->price=$data->price;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status="COD";
            $order->delivery_status="processing";
            $order->save();
             
             
        //    dd($order->product_id,$order->name);

            $cart_id=$data->id;

            $cart=cart::find($cart_id);
            
            $cart->delete();


        }

        return redirect()->back()->with('message','We have received your order. We will Connect with you soon....');

    }
 

    public function  Contact_with(){
        return view('home.Contact_with');
    }

    public function add_quary(Request $request){
        $complaint= new complaint;
        $complaint->name=$request->name;
        $complaint->email=$request->email;
        $image= $request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('complaint',$imagename);
        $complaint->image=$imagename;
        $complaint->detailsofcomplaint=$request->message;
        $complaint->save();

        return redirect()->back()->with('message','Your complaint is received. We will contact you soon.');

        ;
       
    }

    public function razorpay_payment($totalprice){
        return view('home.stripe_payment',compact('totalprice'));
    }

 
}
