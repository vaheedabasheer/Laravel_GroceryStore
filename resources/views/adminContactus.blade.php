@extends('layouts.admin_head') 
@section('content')
<br>
<h3 class="text-center">Enquiries</h3>
<br>
@if(session('message'))
<p class="text-danger text-center">{{session('message')}}</p>
@endif
<table class="table">
  <tr>
    <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
      <th scope="col">Delete</th>
      
    </tr>
 @foreach($contacts as $contact)
    <tr>
    <td>{{$loop->iteration}}</td>
      <td>{{$contact->name}}</td>
      <td>{{$contact->email}}</td>
      <td>{{$contact->phone}}</td>
      <td>{{$contact->message}}</td>
      <td><a href="{{route('deleteContactus',encrypt($contact->id))}}"><button class="btn btn-danger">Delete</button></a></td>
    </tr>
@endforeach
</table>
@stop