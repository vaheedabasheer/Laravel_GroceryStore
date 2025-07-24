 @extends('layouts.app')
 @section('content')
 <br>
 	@if(session('success'))
							<center><b><p style="color:green";>{{session('success')}}</p></b></center>
							@endif
              <br> 
          @if ($errors->any())
  <div>  
        <ul style=" list-style-type: none">
            @foreach ($errors->all() as $error)
           <center> <b><li style="color:red">{{ $error }}</li></b> 
            @endforeach
        </ul>
    </div></center>  
@endif
      
              <section>
      <div class="container-lg">

        <div class="bg-secondary text-light py-5 my-5" style="background: url('images/banner-newsletter.jpg') no-repeat; background-size: cover;">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 p-3">
                <div class="section-header">
                  <h2 class="section-title display-5 text-light">Get 25% Discount on your first purchase</h2>
                </div>
                <p>Just Sign Up & Register it now to become member.</p>
              </div>
 
              <div class="col-md-5 p-3" id="register">
              <form method="POST" action="{{ route('save') }}">
              @csrf
    
                  <div class="mb-3">
                    <label for="name" class="form-label d-none">Name</label>
                    <input type="text"
                      class="form-control form-control-md rounded-0" name="name"  placeholder="Name">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label d-none">Email</label>
                    <input type="email" class="form-control form-control-md rounded-0" name="email"  placeholder="Email Address">
                  </div>
                   <div class="mb-3">
                    <label for="password" class="form-label d-none">Password</label>
                    <input type="password"
                      class="form-control form-control-md rounded-0" name="password"  placeholder="Password">
                  </div>
                   <div class="mb-3">
                    <label for="name" class="form-label d-none">Role</label>
                    <select name="role"  class="form-control form-control-md rounded-0">
                        <option value="">Choose your Role </option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <!-- <input type="text"
                      class="form-control form-control-md rounded-0" name="role"  placeholder="Name"> -->
                  </div>
                   <div class="mb-3">
                    <label for="name" class="form-label d-none">Phone</label>
                    <input type="tel"
                      class="form-control form-control-md rounded-0" name="phone"  placeholder="phone">
                  </div> <div class="mb-3">
                    <label for="name" class="form-label d-none">Address</label>
                    <textarea name="address"  class="form-control form-control-md rounded-0" name="address"  placeholder="address"></textarea>
                     
                  </div>
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark btn-md rounded-0">Submit</button>
                  </div>
                </form>
          
<h3><a href="{{route('login')}}" class="text-center text-warning" >Login Now</a></h3>
              </div>
              
            </div>
            
          </div>
        </div>
        
      </div>
      
    </section>
 <section style="background-image: url('images/banner-1.jpg');background-repeat: no-repeat;background-size: cover;">
      <div class="container-lg">
        <div class="row">
          <div class="col-lg-6 pt-5 mt-5">
            <h2 class="display-1 ls-1"><span class="fw-bold text-primary">Organic</span> Foods at your <span class="fw-bold">Doorsteps</span></h2>
            <p class="fs-4">Join Our Team</p><span class="fw-bold text-primary"><h3>Register Now</h3></span> 
            <div class="d-flex gap-3">
              <a href="{{route('login')}}" class="btn btn-primary text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">Start Shopping</a>
              <a href="#register" class="btn btn-dark text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">Join Now</a>
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