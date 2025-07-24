@extends('layouts.admin_head')

@section('content')
<br>
<h3 class="text-center text-info">View Cart Items </h3>
<br>
<center>
@foreach ($carts as $userId => $userCartItems)
 @php
    $user = $userCartItems[0];
@endphp


    <h3>User: {{ $user->name }}</h3>
    <p><b>Address:</b> {{ $user->address }}</p>
<table class="table table-success  table-striped-columns w-50 mx-auto" >

        <tr>
            <th>Product</th>
            <th>Quantity</th>
        </tr>
        @foreach ($userCartItems as $item)
            <tr>
                <td>{{ $item->product }}</td>
                <td>{{ $item->quantity }}</td>
            </tr>
        @endforeach
    </table>
    <hr>
@endforeach
</center>
@stop

