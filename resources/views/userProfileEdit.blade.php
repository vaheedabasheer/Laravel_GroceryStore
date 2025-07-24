@extends('layouts.user_head')
@section('content')
<br>

<h2 class="text-center">Edit Your Profile</h2>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
<form method="POST" action="{{ route('userProfileUpdate', encrypt($user->user_id)) }}">
    @csrf
    <table class="table mx-auto">
        <tr>
            <th>Name</th>
            <td><input type="text" name='name' value="{{$user->name}}" required ></td>
        </tr>
         <tr>
            <th>Email</th>
            <td><input type="email" name="email" value="{{$user->email}}" required></td>
        </tr>
         <tr>
            <th>Phone</th>
            <td><input type="tel" name="phone" value="{{$user->phone}}" required></td>
        </tr>
         <tr>
            <th>Address</th>
            <td><textarea name="address"  id="" required>{{$user->address}}</textarea></td>
        </tr>
<tr>
    <td></td>
    <td><button class="btn btn-success">Update</button></td>
</tr>
    </table>
</form>
<br>
@stop