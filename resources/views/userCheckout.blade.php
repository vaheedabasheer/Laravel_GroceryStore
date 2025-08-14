@extends('layouts.user_head')
@section('content')
<center><br>
@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<h3>Secure Checkout</h3></center>
@foreach($checkout as $item)
<div class="container bg-light">
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
<div class="card mb-3" style="max-width: 540px;">
  
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('storage/images/'.$item->image)}}" class="img-fluid rounded-start" alt="...">
     <h2>{{$item->product}}</h2>
   
   </div>
    <div class="col-md-8">
      <div class="card-body">
           <ul class="list-group list-group-flush">
    <li class="list-group-item">Price: ₹{{ $item->price }}</li>
    <li class="list-group-item">Quantity: {{ $item->total_quantity }}</li> 
     <li class="list-group-item">Total: {{ ($item->total_quantity)*($item->price) }}</li> 
  </ul>
    
  
      </div>
    </div>
  </div>
</div>
 
@endforeach

@if($details)
  <div class="card text-center" style="max-width: 540px;">
    <h5 class="card-title">
      <span style="color:red"><b>Delivering To: </b></span>{{ $details->name }}
    </h5>
    <p class="card-text">{{ $details->address }}</p>
    <p class="card-text"><span style="color:blue">{{ $details->phone }}</span></p>
    <hr>
    <p class="card-text">Total Items: <span style="color:red"><b>{{ $totalItems }}</b></span></p>
    <p class="card-text">Total Price: <span style="color:red"><b>{{ $totalPrice }}</b></span></p>

    <div class="card-footer">
      @if($totalItems>0)
      <a href="{{ route('order.success') }}">
      
       <button class="btn btn-success">Place Order</button>
      </a>
      @else
       <button class="btn btn-secondary" disabled>Place Order</button>
       @endif
    </div>
  </div>
@else
  <div class="card text-center" style="max-width: 540px;">
    <div class="card-body">
      <h5 class="text-danger">User details not found!</h5>
      <p>Please update your profile or contact support.</p>
    </div>
  </div>
@endif
</div>
 <div class="col-sm-6">
<div class="card pb-3 " style="max-width: 540px;">

    <br>
    <p class="text-start fw-bold text-success">Payment Method</p>
@error('payment')
    <div class="text-danger mb-2">{{ $message }}</div>
@enderror
<form action="route('order.success')}}" method="post">
  @csrf
      <input type="radio" name="payment" id="credit">
     <label for="credit">Credit or debit card</label><br>
   <input type="radio" name="payment" id="net">
   <label for="net">Net Banking</label><br>
   <input type="radio" name="payment" id="upi">
<label for="upi">Other UPI Apps</label><br>
 <input type="radio" name="payment" id="cod">
  <label for="cod">Cash on Delivery/Pay on Delivery</label><br>
  
  
</form>
 
</div>
</div>
</div>

</div>
@stop