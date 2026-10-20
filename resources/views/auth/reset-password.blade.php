@extends('layouts.main')

@section('title', 'Reset')
@section('content')
  <div class="title-block-auth">
    <div class="title-box-auth">
      <p class="title-auth">Reset password</p>
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
  <form method="POST" action="{{ route('password.update') }}" class="form-input-auth">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div class="input-box-auth first">
      <label class="input-lable-auth">E-mail</label>            
      <input type="email" class="input-text-auth" name="email" value="{{ $request->email }}">              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">New password</label>            
      <input type="password" class="input-text-auth" name="password">              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Password confirmation</label>            
      <input type="password" class="input-text-auth" name="password_confirmation">              
    </div>
    <div class="input-box-auth">
      <button type="submit" class="btn-form-auth">Reset password</button>
    </div> 
  </form>  
@endsection

@push('js')
    
@endpush
