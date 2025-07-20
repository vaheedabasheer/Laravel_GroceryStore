@extends('layouts.user_head')
@section('content')
@foreach($checkout as $item)
<center><div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('storage/images/'.$item->image)}}" class="img-fluid rounded-start" alt="...">
     <h2>{{$item->product}}</h2>
     <h4><span style="color:blue">Rate:</span>{{$item->price}}</h4>
     <h4><span style="color:blue">Quantity:</span>{{$item->total_quantity}}</h4>
   </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><span style="color:red"><b>Ship to:</b></span>{{$item->name}}</h5>
        <p class="card-text">{{$item->address}}</p>
        <p class="card-text">{{$item->phone}}</p>
  
      </div>
    </div>
  </div>
</div>
 </center>
@endforeach
 <center>
<div class="card" style="max-width: 540px;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Total items:</li>
    <li class="list-group-item">Total Price:</li>

  </ul>
  <div class="card-footer">
<button class="btn btn-success">Place Order</button>
  </div>
</div>
</center> 
@stop