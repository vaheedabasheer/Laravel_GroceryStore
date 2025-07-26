@extends('layouts.user_head')
@section('content')
<br>
@if(session('success'))
    <h3 class="text-success text-center">{{session('success')}}</h3>
@endif
@if(session('error'))
    <p class="text-danger">{{session('error')}}</p>
@endif

<h3 class="text-center" >Your Orders</h3>
<table class="table table-striped table-danger">

  <thead>
    <tr>
      <th scope="col">Order ID:</th>
      <th scope="col">Product:</th>
      <th scope="col">Quantity:</th>
         <th scope="col">Price:</th>
      <th scope="col">Status</th>
         <th scope="col">Order Date:</th>
           <th scope="col">Order Status</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($orders as $order)
    <tr>
      <th scope="row">{{ $order->oid }}</th>
      <td> {{ $order->product }}</td>
      <td>{{ $order->quantity }}</td>
      <td>₹{{ $order->product_price }}</td>
      <td>{{ ucfirst($order->status) }}</td> 
      <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</td>
          <td>
        @if($order->status === 'pending')
        <form action="{{ route('cancelOrder', $order->oid) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?')">

            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
          </form>
          @elseif($order->status === 'approved')
           <span class="text-muted">Approved</span>
        @else
          <span class="text-muted">cancelled</span>
        @endif
      </td>
    </tr>
   
@empty
 <tr>
       <td colspan="7" class="text-center text-muted">You have no orders yet.</td>
       </tr>
@endforelse

  </tbody>
</table>
@if(isset($tot))
  <h3 class="text-danger fw-bold text-center">Total Price: ₹{{ $tot->total_price }}</h3>
@endif
@stop

