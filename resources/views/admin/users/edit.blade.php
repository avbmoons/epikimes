@extends('layouts.admin')

@section('title', 'User.Edit')

@section('content')

    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">User edit</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}" class="form-input admin" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="input-box admin">
        <div class="input-group">
          <div class="input-box mini" name="status-box" style="margin-left: 0;">
            <label for="is_admin" class="input-lable">Is Admin</label>            
            <select class="input-text" name="is_admin" id="is_admin">
              @foreach ($isAdmins as $isAdmin)
              @php
                  $val = $isAdmin instanceof \App\Enums\UserRole ? $isAdmin->value : $isAdmin;
                  $dbVal = $user->is_admin instanceof \App\Enums\UserRole ? $user->is_admin->value : $user->is_admin;
              @endphp
                 {{-- <option @if($user->is_admin === $isAdmin) selected @endif>{{ $isAdmin }}</option>  --}}
                 <option value="{{ $val}}" @selected(old('is_admin', $dbVal) == $val)>{{ $val }}</option>
              @endforeach              
            </select>
          </div>
          <div class="input-box mini edit" name="id-box">
            <label for="id-field" class="input-lable">ID#</label>
            <input type="text" class="input-text notread" name="id-field" id="id-field" value="{{ $user->id }}" readonly>            
          </div>
        </div>
      </div>
      <div class="input-box admin" name="name-box">
        <label for="name" class="input-lable">Name</label>            
        <input type="text" class="input-text" name="name" id="name" value="{{ old('name', $user->name) }}" @error('name') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="email-box">
        <label for="email" class="input-lable">E-mail</label>            
        <input type="email" class="input-text" name="email" id="email" value="{{ old('email', $user->email) }}" @error('email') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="email-box" style="height: fit-content">
        <div class="input-group" >
          <div class="input-box admin">
            <label for="password" class="input-lable">Password</label>            
            <input type="text" class="input-text" name="password" id="password" autocomplete="new-password" @error('password') is-invalid @enderror>              
          </div>
          <div class="input-box middle" name="regenerate-password-box" style="margin-right: 0; justify-content: center;">
            <label for="regenerate_password" class="input-lable" style="text-align: center; font-size: 14px;">Generate random password</label>            
            <input type="checkbox" class="input-text" name="regenerate_password" id="regenerate_password" value="1" @error('regenerate_password') is-invalid @enderror>              
          </div>
        </div>
            
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
