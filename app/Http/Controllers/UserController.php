<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function productView()
    {
        $products = DB::table('products')
        ->join('catagories', 'products.cid', '=', 'catagories.cid')
        ->select('products.*', 'catagories.name as category_name')
        ->get();

  return view('user_viewProducts',compact('products'));
    }

    public function createCart(Request $request)
    {
    
            $userId = session('user_id');
        
         $pid=decrypt(request('pid'));
          $quantity = $request->quantity;
          Cart::create([
            'user_id'=>$userId,
            'pid'=>$pid,
            'quantity'=>$quantity
          ]);
          return redirect()->back()->with('success',"Product added to cart successfully");
    }

    public function viewCart(Request $request)
    {
        $carts = DB::table('carts')
    ->join('products', 'products.pid', '=', 'carts.pid')
    ->select(
          'products.pid',
        'products.product',
        'products.price',
        'products.image',
        'products.description',
        DB::raw('SUM(carts.quantity) as total_quantity')
    )
    ->where('carts.user_id', session('user_id'))
    ->groupBy('products.product', 'products.price', 'products.image', 'products.description','products.pid')
    ->get();
    return view('userCart',compact('carts'));
  }

     public function DeleteUserCart($id)
    {
        $pid=decrypt($id);
        Cart::where('pid',$pid)
        ->where('user_id',session('user_id'))
        ->delete();
       return redirect()->back()->with('message','One Item Deleted Successfully'); 
        
    }

    public function checkout()
    {
        $checkout=DB::table('carts')
         ->join('products', 'products.pid', '=', 'carts.pid')
         ->join('registrations','carts.user_id','=','registrations.user_id')
         ->select( 
        'products.product',
        'products.price',
        'products.image',
        'products.description',
        'registrations.name',
        'registrations.phone',
        'registrations.address',
         DB::raw('SUM(carts.quantity) as total_quantity')
         )
      ->where('carts.user_id', session('user_id'))
    ->groupBy('products.product', 'products.price', 'products.image', 'products.description','registrations.name','registrations.phone','registrations.address')
    ->get();
    return view('userCheckout',compact('checkout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
