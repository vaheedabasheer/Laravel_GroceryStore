<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Registration;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
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
       return redirect()->back()->with('message','One Item Removed Successfully'); 
        
    }

 public function checkout()
{
    $checkout = DB::table('carts')
        ->join('products', 'products.pid', '=', 'carts.pid')
        ->select( 
            'products.product',
            'products.price',
            'products.image',
            'products.description',
           
            DB::raw('SUM(carts.quantity) as total_quantity')
        )
        ->where('carts.user_id', session('user_id'))
        ->groupBy(
            'products.product',
            'products.price',
            'products.image',
            'products.description',
        )
        ->get();

    $details = DB::table('registrations')
    ->where('user_id', session('user_id'))
    ->select('name', 'phone', 'address')
    ->first();
    // ✅ Calculate total number of items and total price
    $totalItems = $checkout->sum('total_quantity');
  $totalPrice = $checkout->sum(function($item) {
    return $item->price * $item->total_quantity;
});

    return view('userCheckout', compact('checkout', 'totalItems', 'totalPrice','details'));
}

public function showPlaceOrderPage()
    {
     return view('userPlaceorder');
    }

public function userProfile()
    {
        $userId=session('user_id');
        $user=Registration::where('user_id',$userId)->first();
        return view('userProfile',compact('user'));
        
    }
    public function userProfileEdit()
    {
              $userId=session('user_id');
        $user=Registration::where('user_id',$userId)->first();
        return view('userProfileEdit',compact('user'));
    }

public function userProfileUpdate(Request $request, $id)
{
    $userId = decrypt($id);
    $user = Registration::findOrFail($userId);

    // ✅ Validation
    $request->validate([
        'name'    => 'required|string|max:255',
       'email' => 'required|email|unique:registrations,email,' . $userId . ',user_id',
          'phone'   => 'required|string|min:10|max:15',
        'address' => 'required|string|max:255',
    ]);

    // ✅ Update the user
    $user->update([
        'name'    => $request->name,
        'email'   => $request->email,
        'phone'   => $request->phone,
        'address' => $request->address,
    ]);

    return redirect()->route('userProfile')->with('success', 'Your Profile Updated Successfully');
}


public function placeOrder()
{
    $userId = session('user_id');

    try {
        DB::transaction(function () use ($userId) {
            $cartItems = Cart::with('product')->where('user_id', $userId)->get();

            if ($cartItems->isEmpty()) {
                throw new \Exception('Cart is empty. Cannot place order.');
            }

            $totalPrice = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            $order = Order::create([
                'user_id'     => $userId,
                'total_price' => $totalPrice,
                'status'      => 'pending',
            ]);

            $orderItems = $cartItems->map(function ($item) {
                return new OrderItem([
                    'pid'      => $item->pid,
                    'quantity' => $item->quantity,
                    'price'    => $item->product->price,
                ]);
            });

            $order->items()->saveMany($orderItems);

            // ❗ Only clear cart after everything succeeds
            Cart::where('user_id', $userId)->delete();
        });

        return view('userPlaceorder')->with('success', 'Order placed successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}
public function viewOrder()
{
    $userId = session('user_id'); 

    $orders = DB::table('order_items')
        ->join('orders', 'order_items.oid', '=', 'orders.oid')
        ->join('products', 'products.pid', '=', 'order_items.pid')
        ->select(
            'order_items.*',
            'orders.total_price',
            'orders.status',
            'orders.oid',
            'orders.created_at as order_date',
            'products.product',
            'products.price as product_price',
            'products.pid'
        )
        ->where('orders.user_id', $userId)
        ->orderBy('orders.created_at', 'desc')
        ->get();
     $tot = Order::where('user_id', $userId)
            ->where('status', '!=', 'cancelled') // 👈 exclude cancelled
            ->first();


    return view('userorderView', compact('orders','tot'));
}

public function cancelOrder($id)
{
    // dd(session('user_id'));

    $order = Order::findOrFail($id);

    // ✅ Ensure user owns the order
    if ($order->user_id != session('user_id'))
         {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    // ✅ Only allow cancelling if status is 'pending'
    if ($order->status === 'pending') {
        $order->status = 'cancelled';
           $order->total_price = 0;
        $order->save();
           
        return redirect()->back()->with('success', 'Order cancelled successfully.');
    }

    return redirect()->back()->with('error', 'Only pending orders can be cancelled.');
}

}
