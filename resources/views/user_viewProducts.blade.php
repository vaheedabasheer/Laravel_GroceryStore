@extends('layouts.user_head')
    @section('content')
 <br>
 <center>
    @if(session('success'))
    <p style="color:green">{{session('success')}}</p>
    @endif
 </center>
       <center>
<h2 style="font-family: var(--bs-body-font-family);">All Products</h2><br>
<div class="text-end">
 <button class="btn btn-success"><a href="{{route('viewCart')}}" style="color:white;text-decoration:none;" ><b>View Cart</b></a></button> 
</div>


   <table  style="width:100%">

    <tr>
      <th >No</th>
      <th >Product Name</th>
      <th>Catagory</th>
      <th>Price</th>
      <th>Description</th>
      <th>Image</th>
       <th>Quantity</th>

    </tr>
          @foreach($products as $product)
          <form action="{{route('createCart')}}"  method="post" enctype="multipart/form-data">
    <tr>

      <th>{{$loop->iteration}}</th>
      <td>{{$product->product}}</td>
     <td>{{ $product->category_name }}</td>
    <td>{{$product->price}}</td>
        <td>{{$product->description}}</td>
        <td><img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image" width="150"></td>
        
    @csrf
        <td>  <input type="number" name="quantity" value="1" min="1" style="width: 60px;"></td>
         <input type="hidden" name="pid" value="{{ encrypt($product->pid) }}">
    <td><button class="btn btn-secondary"><svg width="18" height="18"><use xlink:href="#cart"></use></svg>Add Cart</button>     </td> 
    </tr>
       </form>
@endforeach


</table>

</center>


<br><br><br>
    <section style="background-image: url('images/banner-1.jpg');background-repeat: no-repeat;background-size: cover;">
      <div class="container-lg">
        <div class="row">
          <div class="col-lg-6 pt-5 mt-5">
            <h2 class="display-1 ls-1"><span class="fw-bold text-primary">Organic</span> Foods at your <span class="fw-bold">Doorsteps</span></h2>
            <p class="fs-4"></p>
            <div class="d-flex gap-3">
              
              <a href="{{route('viewCatagory')}}" class="btn btn-dark text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">View Catagory</a>
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

 