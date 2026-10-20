@extends('layouts.main')

@section('title', 'Verify')
@section('content')
  <div class="title-block-auth single-title-block">
    <div class="title-box-auth">
      <p class="title-auth">Confirm your E-mail</p>
    </div>
    <div class="title-box-auth text-auth">
      <p class="terve-auth">Thank your for registering!</p>
      <p class="terve-auth">Please confirm your email address by clicking on the link we just sent you!</p>
    </div>
    @if (session('status') == 'verification-link-sent')
      <div class="alert">
        A new confirmation link has been sent to the email address that you provided during registration.
      </div>
    @endif
  </div>
  <div class="form-input-auth single-btn-block">
    <form method="POST" action="{{ route('verification.send') }}" class="form-input-auth single-btn">
      @csrf
      <div class="input-box-auth">
        <button type="submit" class="btn-form-auth link-btn">Resend the message</button>
      </div> 
    </form>    
    <form method="POST" action="{{ route('logout') }}" class="form-input-auth single-btn">
    @csrf
    <div class="input-box-auth">
      <button type="submit" class="btn-form-auth exit-btn">Exit</button>
    </div> 
  </form>  
@endsection

@push('js')
    
@endpush
