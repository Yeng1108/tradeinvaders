@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="pogi">
                <div class="card-header"><h5>Login</h5></div>

                <div class="card-body" >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}


    <section class="vh-90">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="loginleftpic col-md-9 col-lg-6 col-xl-7">
              <img src="/img/logo/loginwp.png"
                class="img-fluid"style="max-width: 100%; max-height: 500px; " alt="Sample image">
            </div>
            <div id="pogi" class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                  
                  <img src="/img/logo/loginlogo.png" alt="" style="max-width: 100%; max-height: 10%; " class="mt-2 ">

                  
                </div>
      
                <div class="divider d-flex align-items-center my-4" style=""> </div>
      
                <!-- Email input -->
                <div class="form-outline mb-4">
                <div class="input-icons">
                  <i class="fa-solid fa-user icon"></i>   
                  <input id="email" type="email" class="form-control form-control-lg pl-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter a valid email address" />
                  @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <label class="form-label" for="form3Example3">Email address</label>
                  
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                    <div class="input-icons">
                    <i class="fa-solid fa-lock icon"></i> 
                  <input id="password" type="password" class="form-control form-control-lg pl-5 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password" required autocomplete="current-password" />
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                  <label class="form-label" for="form3Example4">Password</label>
                
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                  @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                      class="link-danger">Register</a></p>
                </div>
                
              </form>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary mt-4">
         
      
          <!-- Right -->
          <div style="margin: auto;">
            <a href="https://www.facebook.com/ToyotaNorthEDSAOfficial" class="text-white me-4">Toyota North EDSA
              <i class="fab fa-facebook-f pr-3" style="border-right: 3px solid rgb(3, 131, 3);"></i>
            </a>
            <a href="#!" class="text-white me-4 pl-3">Toyota North EDSA
              <i class="fab fa-twitter pr-3" style="border-right: 3px solid rgb(3, 131, 3);" ></i>
            </a>
            <a href="#!" class="text-white me-4 pl-3">www.toyotanorthedsa.com
              <i class="fa-solid fa-globe pr-3" style="border-right: 3px solid rgb(3, 131, 3);"></i>
            </a>
           
          </div>
          <!-- Right -->
        </div>
      </section>
</div>
@endsection
