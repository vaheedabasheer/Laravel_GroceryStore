@extends('layouts.user_head')
    @section('content')
    <br>
    <h2 style="color:green;font-family: var(--bs-body-font-family);" class="text-center">Your Cart</h2>
    <br>
    <center>
      @if(session('message'))
      <p style="color:red;">{{session('message')}}</p>
      @endif
    @foreach($carts as $cart)
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('storage/images/' . $cart->image) }}" class="img-fluid rounded-start" alt="...">
      <!-- <img src="" alt="Product Image" width="150"> -->
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$cart->product}}</h5>
         <h5 class="card-title">₹{{$cart->price}}</h5>
        <p class="card-text">{{$cart->description}}.</p>
            <p class="card-text">Quantity: {{ $cart->total_quantity }}.</p>
        <a href="{{route('DeleteUserCart',encrypt($cart->pid))}}"><button type="button" class="btn btn-outline-danger">Remove</button></a>
       <a href="{{route('checkout')}}"> <button type="button" class="btn btn-outline-success">Checkout</button></a>
      </div>
    </div>
  </div>
</div>
@endforeach
</center>
    @stop