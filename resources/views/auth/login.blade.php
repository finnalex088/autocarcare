@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="container">


<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="{{asset('admin/assets/draw2.svg')}}"
          class="img-fluid" alt="Phone image">
      </div>

      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <!-- Email input -->
          <div class="form-outline mb-4">
            <h2 class="fw-bold mb-2 text-uppercase">{{ __('Login') }}</h2>
              <p>Please enter your login and password!</p>
              <label class="form-label" for="email">Email address</label>
            <input type="email" id="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
             @error('email')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example23">Password</label>
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
             @error('password')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

          <div class="divider d-flex align-items-center my-4">
           
        </form>
      </div>
    </div>
  </div>
</section>
</div></div>
@endsection


