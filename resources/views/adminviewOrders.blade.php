@extends('layouts.admin_head') {{-- Make sure this layout exists --}}
@section('content')

<div class="container mt-4">
    <h3 class="text-center text-primary">All Orders</h3>
 <div class="search-bar row bg-light p-2 rounded-4">

<div class="col-11 col-md-7">
                <form id="search-form" class="text-center"  method="get">
                  <input type="text" name="search" class="form-control border-0 bg-transparent" placeholder="Search for products" value="{{request('search')}}">
            
              </div>
              <div class="col-1">
<button type="submit" class="btn btn-secondary">Submit</button>
              </div>
            </div>
                </form>
                @if(isset($query))
                    <p>Showing the result for <strong>"{{$query}}"</strong></p>
                    @endif
            <br>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->product }}</td>
                <td>{{ $order->quantity }}</td>
                <td>₹{{ $order->price }}</td>
                <td>₹{{ $order->price * $order->quantity }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>
                    <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : 'success' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td>
                    @if($order->status == 'pending')
                        <form method="POST" action="{{ route('approveOrder', $order->oid) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                        </form>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>Approved</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
