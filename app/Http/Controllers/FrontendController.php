<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
  public function index()
  {
    return view('index');
  }
  public function login()
  {
    return view('login');
  }
    public function register()
  {
    return view('register');
  }
    public function save(Request $request)
  {
    $name=request('name');
    $email=request('email');
    $password=request('password');
    $role=request('role');
    $phone=request('phone');
    $address=request('address');
    $request->validate([
                'name'=>'required|string|max:255',
                'email'=>'required|email|unique:registrations',
                'password'=>'required|min:6',
                'role'=>'required|string',
                'phone'=>'required|min:10',
                'address'=>'required|string|max:255',

]);
Registration::create([
    'name'=>$name,
    'email'=>$email,
     'password' => Hash::make($request->password),
    'role'=>$role,
    'phone'=>$phone,
    'address'=>$address
]);

  return redirect()->back()->with('success', 'Registration successful!');

  }
public function dologin(Request $request)
{
      $request->validate([
                 'email'=>'required|email',
                 'password'=>'required',
      ]);

  
        $credentials=$request->only('email','password');
        
        if(Auth::attempt($credentials))
        {
          $email = $credentials['email'];

          // Find user by email
      $user = Registration::where('email', $email)->first();

      if ($user) {
             $user_id = $user->user_id;
          session(['user_id' => $user_id]);
        
            //  return $user_id;
         session(['register_id' => $user_id]);
                          } else {
                            echo "User not found.";
                                }
            // Authentication successful
           
            $role = $user->role;
            if($role=='admin')
            {
               return redirect()->route('admin')->with('success','Welcome Admin....!');
            }
          
            else
            {
               return redirect()->route('user')->with('success','Experience Our Service...!');
            }
           
        }
        else{
             // Authentication failed
            return redirect()->route('login')->with('message','Login Is Invalid');
        }

}
public function user()
{
  return view('user');
}
public function admin()
{
  return view('admin');
}
public function logout(Request $request)
{
    Auth::logout(); // Ends the user's auth session

    $request->session()->invalidate();       // Clears session data
    $request->session()->regenerateToken();  // Prevents CSRF token reuse

    return redirect()->route('login')->with('success', 'Logged out successfully!');
}
public function add()
{
  return view('catagories');
}
public function addCatagory(Request $request)
{
$request->validate([
  'name'=>'required'
]);
 $name=request('name');
 Catagory::create([
  'name'=>$name
 ]);
return redirect()->back()->with('success','Catagory added successfully...!');
}

public function viewCatagory()
{
  $catagories=Catagory::all();
  return view('viewCatagory',compact('catagories'));
  
}
public function catagoryDelete($id)
{
 Catagory::find(decrypt($id))->delete();
 return redirect()->back()->with('success','Catagory Deleted Successfully...!');
}
public function addProducts()
{
   $catagories=Catagory::all();
  return view('addProducts',compact('catagories'));

}
public function saveProducts(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'cat' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|numeric|min:0',
        'description' => 'required|string|min:6',
         'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg,JPEG,JPG,PNG|max:2048',
    ]);
    // Store the image
    $filename = null;
    if ($request->hasFile('image')) {
        // $filename = time() . '.' . $request->image->extension();
        // $request->image->storeAs('public/images', $filename);
          $extension=request('image')->extension();
        $filename='user_pic'.time().'.'.$extension;

        request('image')->storeAs('images',$filename,'public');
        $input['image']=$filename;
    }
    else {
        return back()->with('error', 'No file uploaded');
    }
      // Save the product
    Product::create([
           'cid' => $request->input('cat'),
           'product' => $request->input('name'),
           'price'=>$request->input('price'),
           'stock' => $request->input('stock'),
        'description' => $request->input('description'),
         'image'=>$filename,
    ]);

    return back()->with('success', 'Product added successfully!');
}
public function viewProducts()
{
     $products = DB::table('products')
        ->join('catagories', 'products.cid', '=', 'catagories.cid')
        ->select('products.*', 'catagories.name as category_name')
        ->get();

  return view('viewProducts',compact('products'));
}
public function deleteProducts($id)
{
  Product::find(decrypt($id))->delete();
  return back()->with('message','One product Deleted successfully');
}
public function editProducts($id)
{
  $id=decrypt($id);
$pro = DB::table('products')
    ->join('catagories', 'products.cid', '=', 'catagories.cid')
    ->select('products.*', 'catagories.name as category_name')
      ->where('products.pid', $id)
    ->first();

$categories = DB::table('catagories')->get(); // or use Eloquent: Catagory::all()
 return view('editProducts',compact('pro', 'categories'));
}

public function updateProduct(Request $request)
{
    $request->validate([
        'pid' => 'required',
        'name' => 'required|string|max:255',
        'cid' => 'required|integer',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
    ]);

$pid=request('pid');

    $data = [
        'product' => $request->name,
        'cid' => $request->cid, // 👈 correct, no need for category name
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ];

    // Handle image upload
    if ($request->hasFile('image')) {
        $filename = 'product_' . time() . '.' . $request->image->extension();
        $request->image->storeAs('images', $filename, 'public');
        $data['image'] = $filename;
    }

    // Update product
    DB::table('products')->where('pid', $pid)->update($data);

    return redirect()->route('viewProducts')->with('success', 'Product updated successfully!');

}

public function adminviewCart()
{
   $carts = DB::table('carts')
    ->join('registrations', 'carts.user_id', '=', 'registrations.user_id')
    ->join('products', 'products.pid', '=', 'carts.pid')
    ->select(
        'carts.*',
        'registrations.name',
        'registrations.email',
        'registrations.phone',
        'registrations.address',
        'products.product',
        'products.price',
        'products.stock'
    )
    ->get()
    ->toArray(); // convert collection to array

// group by user_id with native PHP array function:
$cartsGrouped = [];

foreach ($carts as $cart) {
    $cartsGrouped[$cart->user_id][] = $cart;
}

return view('admin_viewCart', ['carts' => $cartsGrouped]);

}

public function viewAllOrders(Request $request)
{
   $query = $request->input('search');
    $orders = DB::table('order_items')
        ->join('orders', 'order_items.oid', '=', 'orders.oid')
        ->join('products', 'products.pid', '=', 'order_items.pid')
        ->join('registrations', 'registrations.user_id', '=', 'orders.user_id')
        ->select(
            'orders.oid',
            'orders.status',
            'orders.total_price',
            'products.product',
            'products.price',
            'order_items.quantity',
            'registrations.name',
            'registrations.email',
            'registrations.phone',
            'registrations.address'
        )
        ->when($query, function ($q) use ($query) {
            $q->where('registrations.name', 'like', '%' . $query . '%')
              ->orWhere('products.product', 'like', '%' . $query . '%');
        }) 
        ->orderBy('orders.created_at', 'desc')

        ->get();

    return view('adminviewOrders', compact('orders','query'));
}
public function approveOrder($id)
{
    $order = Order::findOrFail($id);

    if ($order->status == 'pending') {
        $order->status = 'approved';
        $order->save();
        return redirect()->back()->with('success', 'Order approved successfully!');
    }

    return redirect()->back()->with('success', 'Order is already approved.');
}


}
