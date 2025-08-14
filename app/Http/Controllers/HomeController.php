<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;
class HomeController extends Controller
{
public function contactus()
{
  return view('contactUs');
}
public function save(Request $request)
{
    $request->validate([
         'name'=>'required|string|max:255',
          'email'=>'required|email',
           'phone'=>'required|min:10',
           'message'=>'required|string|max:255',

    ]);
  contactus::create([
        'name'=>request('name'),
        'email'=>request('email'),
         'phone'=>request('phone'),
          'message'=>request('message'),
    ]);
    return redirect()->back()->with('success','Your message send successfully');
}

}
