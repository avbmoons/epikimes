@extends('layouts.main')

@section('title', 'Login')
@section('content')
  <div class="title-block-auth">
    <div class="title-box-auth">
      <p class="title-auth">Sign In</p>
    </div>
  </div>
  <form method="POST" action="{{ route('login') }}" class="form-input-auth">
    @csrf
    <div class="input-box-auth first">
      <label class="input-lable-auth">E-mail</label>            
      <input type="email" class="input-text-auth" id="email" name="email" value="{{ old('email') }}">
      @error('email')
          <span class="error">{{ $message }}</span>
      @enderror             
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Password</label>            
      <input type="password" class="input-text-auth" id="password" name="password">  
      @error('password')
          <span class="error">{{ $message }}</span>
      @enderror            
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Remember me</label>            
      <input type="checkbox" class="input-text-auth check-box" id="remember_me" name="remember">              
    </div>
    <div class="input-box-auth">
      <a href="{{ route('password.request') }}" class="link-page-auth">Forgot your password?</a>           
    </div>
    <div class="input-box-auth">
      <a href="{{ route('register') }}" class="link-page-auth">Registration</a>
    </div>
    <div class="input-box-auth">
      <button type="submit" class="btn-form-auth">{{ __('Sign In') }}</button>
    </div> 

  </form>  
@endsection

@push('js')
    
@endpush
