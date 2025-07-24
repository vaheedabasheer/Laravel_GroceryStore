@extends('layouts.admin_head')
    @section('content')
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

   <form action="{{route('updateProducts')}}" method="post" enctype="multipart/form-data">
    @csrf 
<table class="table">
    <tr>
      <th >Product Name</th>
      <th>Catagory</th>
      <th>Price</th>
      <th>Stock</th>
      <th>Description</th>
      <th>Image</th>
      <th>Action</th>
    </tr>

    <tr>
        <input type="hidden" name="pid" value="{{ $pro->pid }}">

      <td><input type="text" value="{{$pro->product}}" name="name"></td>
     <td>
        <select name="cid" class="form-control">
            @foreach($categories as $cat)
                <option value="{{ $cat->cid }}" 
                    {{ $cat->cid == $pro->cid ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </td>
      <td><input type="text" value="{{$pro->price}}" name="price" required></td>
      <td><input type="text" value="{{$pro->stock}}" name="stock" required></td>
      <td> <textarea name="description" id=""  required>{{$pro->description}}</textarea></td>
      <td><img src="{{ asset('storage/images/' . $pro->image) }}" alt="Product Image" width="150" >
    <input type="file" name="image" ></td>
      <td><button class="btn btn-warning">Update</button></td>
    </tr>

</table>
<br>
<center><a href="{{route('viewProducts')}}">view Products</a></center>
<br>
  <section style="background-image: url('{{ asset('images/banner-1.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
  <div class="container-lg">
        <div class="row">
          <div class="col-lg-6 pt-5 mt-5">
            <h2 class="display-1 ls-1"><span class="fw-bold text-primary">Organic</span> Foods at your <span class="fw-bold">Doorsteps</span></h2>
            <p class="fs-4"></p>
            <div class="d-flex gap-3">
              
              <a href="{{route('addProducts')}}" class="btn btn-dark text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">View Catagory</a>
            </div>
            <div class="row my-5">
              <div class="col">
                <div class="row text-dark">
                  <div class="col-auto"><p class="fs-1 fw-bold lh-sm mb-0">14k+</p></div>
                  <div class="col"><p class="text-uppercase lh-sm mb-0">Product Varieties</p></div>
                </div>
              </div>
              <div class="col">
                <div class="row text-dark">
                  <div class="col-auto"><p class="fs-1 fw-bold lh-sm mb-0">50k+</p></div>
                  <div class="col"><p class="text-uppercase lh-sm mb-0">Happy Customers</p></div>
                </div>
              </div>
              <div class="col">
                <div class="row text-dark">
                  <div class="col-auto"><p class="fs-1 fw-bold lh-sm mb-0">10+</p></div>
                  <div class="col"><p class="text-uppercase lh-sm mb-0">Store Locations</p></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-3 g-0 justify-content-center">
          <div class="col">
            <div class="card border-0 bg-primary rounded-0 p-4 text-light">
              <div class="row">
                <div class="col-md-3 text-center">
                  <svg width="60" height="60"><use xlink:href="#fresh"></use></svg>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <h5 class="text-light">Fresh from farm</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-0 bg-secondary rounded-0 p-4 text-light">
              <div class="row">
                <div class="col-md-3 text-center">
                  <svg width="60" height="60"><use xlink:href="#organic"></use></svg>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <h5 class="text-light">100% Organic</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-0 bg-danger rounded-0 p-4 text-light">
              <div class="row">
                <div class="col-md-3 text-center">
                  <svg width="60" height="60"><use xlink:href="#delivery"></use></svg>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <h5 class="text-light">Free delivery</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </section>
       
       @stop