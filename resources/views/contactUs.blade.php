@extends('layouts.app')
@section('content')
<br>

<h3 class="text-center text-bold ">Contact Us</h3>
<br>
@if(session('success'))
<p class="text-center text-success text-bold">{{session('success')}}</p>
@endif
<div class="container">
<form action="{{route('save')}}" method="post">
    @csrf
<div class="mb-3">
      <label for="floatingInput">Name </label>
  <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Your full Name">

</div>
<div class="mb-3">
      <label for="floatingInput">Email address</label>
  <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">

</div>
<div class="mb-3">
      <label for="floatingPassword">Contact Number</label>
  <input type="text" name="phone" class="form-control" id="floatingPassword" placeholder="Mobile Number">

</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">What you want to know? </label>
  <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"  placeholder="Your Message"></textarea>
</div>
<div class="mb-3">
 <button type="submit" class="btn btn-success form-control">Send</button>
</div>

</form>
</div>
@stop