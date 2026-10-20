@extends('layouts.main')

@section('title', 'Register')
@section('content')
  <div class="title-block-auth">
    <div class="title-box-auth">
      <p class="title-auth">Registration</p>
    </div>
  </div>
  {{-- Errors output block --}}
  @if ($errors->any())
    <div class="mb-4 text-red-600">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>      
  @endif
  <form method="POST" action="{{ route('register') }}" class="form-input-auth" autocomplete="off">
    @csrf
    <div class="input-box-auth first">
      <label class="input-lable-auth">Name</label>            
      <input type="text" class="input-text-auth" name="name" value="{{ old('name') }}" required autofocus>              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">E-mail</label>            
      <input type="email" class="input-text-auth" name="email" value="{{ old('email') }}" required autocomplete="off">              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Password</label>            
      <input type="password" class="input-text-auth" name="password" required autocomplete="new-password">              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Password confirmation</label>            
      <input type="password" class="input-text-auth" name="password_confirmation" required>              
    </div>
    <div class="input-box-auth">
      <button type="submit" class="btn-form-auth">Register</button>
    </div> 
  </form>  
@endsection

@push('js')
    
@endpush
