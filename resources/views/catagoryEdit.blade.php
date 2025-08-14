@extends('layouts.admin_head')

@section('content')
<br>
<center>
    <h2 style="font-family: var(--bs-body-font-family);">Category</h2>

    <form action="{{ route('updatecatagory', encrypt($cat->cid)) }}" method="POST">
        @csrf
        <table class="table table-success table-striped" style="width:50%">
            <tr>
                <td><label for="name">Category Name</label></td>
                <td>
                    <input type="text" name="name" value="{{ $cat->name }}" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <button type="submit" class="btn btn-warning">Update</button>
                </td>
            </tr>
        </table>
    </form>
</center>
@stop
