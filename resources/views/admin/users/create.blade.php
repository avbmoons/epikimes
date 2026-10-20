@extends('layouts.admin')

@section('title', 'User.Create')

@section('content')

    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">User create</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.users.store') }}" class="form-input admin" autocomplete="off" enctype="multipart/form-data">
      @csrf
      <div class="input-box admin">
        <div class="input-group">
          <div class="input-box mini" name="status-box" style="margin-left: 0;">
            <label for="is_admin" class="input-lable">IsAdmin</label>            
            <select class="input-text" name="is_admin" id="is_admin">
              @foreach ($isAdmins as $isAdmin)
                <option @if(old('is_admin') === $isAdmin) selected @endif>{{ $isAdmin }}</option> 
              @endforeach              
            </select>
          </div>
        </div>
      </div>
      <div class="input-box admin" name="name-box">
        <label for="name" class="input-lable">Name</label>            
        <input type="text" class="input-text" name="name" id="name" value="{{ old('name') }}" placeholder="enter your name ..." @error('name') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="email-box">
        <label for="email" class="input-lable">E-mail</label>            
        <input type="email" class="input-text" name="email" id="email" value="{{ old('email') }}" autocomplete="off" placeholder="enter e-mail address ..." @error('email') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="email-box">
        <label for="password" class="input-lable">Password</label>            
        <input type="text" class="input-text" name="password" id="password" value="{{ old('password') }}" autocomplete="new-password" placeholder="enter password ..." @error('password') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          <button type="reset" class="btn-form cancel">Clear</button> 
          <a class="btn-form cancel" href="{{ route('admin.users.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('name', 'email', 'password')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
    
@endsection

@push('js')
  <script></script>
@endpush
