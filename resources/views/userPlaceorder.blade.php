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
    <h5 class="card-title">Placed Your Order</h5>
    <p class="card-text"></p>
  </div>
</div>
</center>
<br><br><br>
@stop