@extends('layouts.main')

@section('title', 'Forgot')
@section('content')
  <div class="title-block-auth">
    <div class="title-box-auth">
      <p class="title-auth">Forgot your password?</p>
    </div>
  </div>
  <form method="POST" action="{{ route('password.email') }}" class="form-input-auth">
    @csrf
    <div class="input-box-auth first">
      <label class="input-lable-auth">E-mail</label>            
      <input type="email" class="input-text-auth" name="email" value="{{ old('email') }}" autofocus>              
    </div>
    <div class="input-box-auth">
      <button type="submit" class="btn-form-auth">Send link</button>
    </div> 
  </form>  
@endsection

@push('js')
    
@endpush
