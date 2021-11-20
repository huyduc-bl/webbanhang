<?php

namespace App\Http\Controllers;

use App\Models\UserCart;
use App\Models\UserOrder;

use Illuminate\Http\Request;

use Auth;

class User_CartController extends Controller
{
    public function storeCart(Request $request)
    {
        //-- Make order_id the current time
        $order_id = now();

        $cart_contents = \Cart::getContent();
        $user = Auth::user();  
        
        
        foreach($cart_contents as $cart)
        {
            $user_cart = new UserCart;      
            $user_cart -> order_id = $order_id;
            $user_cart -> user_id = $user->id;
            $user_cart->product_id = $cart->id;
            $user_cart->qty = $cart->quantity;
            $user_cart->price = $cart->price;
            $user_cart->save();
        }

        $user_order = new UserOrder;
        $user_order->order_id = $order_id;
        $user_order->user_id = $user->id;
        $user_order->name = $request->name;
        $user_order->email =$request->email;
        $user_order->phone = $request->phone;
        $user_order->address = $request->address;
        $user_order->zipcode = $request->zipcode;
        $user_order->city =  $request->city;
        $user_order->state = $request->state;
        $user_order->total = \Cart::getTotal();
        $user_order->save();

        echo "Thanh cong!"; 
    }

}
