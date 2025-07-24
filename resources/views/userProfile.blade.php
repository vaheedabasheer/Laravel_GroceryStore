@extends('layouts.user_head')
@section('content')
<br><br>
@if(session('success'))
<p class="text-center text-success">{{session('success')}} </p>
@endif
<br>
<h2 class="text-center">Your Profile</h2>
<br>
<center>
<table class="table table-success table-striped">
    <tr>
        <th>Name</th>
        <td>{{$user->name}}</td>
    </tr>
       <tr>
        <th>Email</th>
        <td>{{$user->email}}</td>
    </tr>
        <tr>
        <th>Phone</th>
        <td>{{$user->phone}}</td>
    </tr>
        <tr>
        <th>Address</th>
        <td><pre>{{$user->address}}</pre></td>
    </tr>
    <tr>
        <td></td>
        <td><a href="{{route('userProfileEdit',encrypt('$user->user_id'))}}"><button class="btn btn-warning">Edit</button></a></td>
    </tr>
</table>
</center>
@stop