@extends('layouts.admin')

@section('title', 'Mail.Edit')

@section('content')

    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Mail edit</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.mails.update', ['mail' => $mail]) }}" class="form-input admin">
      @csrf
      @method('put')
      <div class="input-box admin">
        <div class="input-group" style="justify-content: space-between">
          <div class="input-box middle" name="username-box">
            <label for="username" class="input-lable">User name</label>            
            <input type="text" class="input-text notread" name="username" id="username" value="{{ $mail->username }}" readonly>              
          </div>
          <div class="input-box mini" name="user-id-box">
            <label for="user_id" class="input-lable">User ID</label>            
            <input type="number" class="input-text notread" name="user_id" id="user_id" value="{{ $mail->user_id }}" readonly>              
          </div>                    
        </div>
      </div>

      <div class="input-box admin" name="email-box">
        <label for="email" class="input-lable">User e-mail</label>            
        <input type="email" class="input-text notread" name="email" id="email" value="{{ $mail->email }}" readonly>              
      </div>
      <div class="input-box" name="description-box">
        <label for="description" class="input-lable">Description</label>
        <textarea class="input-text area" name="description" id="description" autofocus style="min-height: 20vh">{{ $mail->description }}</textarea>            
      </div>     
      <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini edit" name="id-box" style="width: 25%">
            <label for="id-field" class="input-lable">Mail ID#</label>
            <input type="text" class="input-text notread" name="id-field" id="id-field" value="{{ $mail->id }}" readonly >            
          </div>
          <div class="input-box mini" name="status-box" style="width: 25%">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if($mail->status === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div>
        </div>
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          <a class="btn-form cancel" href="{{ route('admin.mails.index') }}">Cancel</a>       
        </div>
      </div>
      @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror 
    </form>

@endsection
