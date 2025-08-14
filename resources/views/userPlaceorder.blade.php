@extends('layouts.user_head')
@section('content')
<br><br><br>
@if(session('success'))
<p>{{session('success')}}</p>
@endif
<center>
<div class="card text-bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header">Congratulations</div>
  <div class="card-body">
    <h5 class="card-title"> Your Order Placed Successfully</h5>
    <p class="card-text"></p>
  </div>
</div>
</center>
<p class="text-center fw-bold"><a href="{{route('viewOrder')}}">View My Orders</a></p>
<br><br><br>
@stop