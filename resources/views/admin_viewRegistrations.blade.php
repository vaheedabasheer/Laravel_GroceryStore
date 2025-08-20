@extends('layouts.admin_head')
@section('content')
<h3 class="text-center">Registrations</h3>
<div class="container">
<table class="table">

    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Contact number</th>
      <th scope="col">Role </th>
    </tr>
@foreach($reg as $re)

    <tr>
      <th scope="row">{{$re->name}}</th>
      <td>{{$re->email}}</td>
      <td>{{$re->address}}</td>
      <td>{{$re->phone}}</td>
         <td style="color:{{$re->role=='admin'? 'red':'black'}};">{{$re->role}}</td>
  
 @endforeach
</table>
</div>
@stop