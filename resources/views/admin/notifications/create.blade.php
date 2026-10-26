@extends('layouts.admin')

@section('title', 'Notification.Create')

@section('content')
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Notification create</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.notifications.store') }}" class="form-input admin">
      @csrf
      {{-- <div class="input-box admin" name="title-box">
        <label for="email" class="input-lable">User E-mail</label>  
        <select class="input-text" name="user_id" id="user_id">
          @foreach (App\Models\User::all() as $user)
              <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
          @endforeach
        </select>          
      </div> --}}
      <div class="input-box admin">
        <div class="input-group">
          <div class="input-box admin" name="users-box">
            <label for="users_ids" class="input-lable">Users E-mails</label>  
            <select class="input-text" name="user_ids[]" id="user_ids" multiple size="7" required style="height: 10vh;">
              @foreach (App\Models\User::all() as $user)
                  <option value="{{ $user->id }}" {{ is_array(old('user_ids')) && in_array($user->id, old('user_ids')) ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
              @endforeach
            </select>          
          </div>
          <div class="input-box mini" name="all-users-box" style="justify-content: flex-start; margin-top: 20px;">
            <label for="all_users" class="input-lable" style="text-align: center;">Select all users</label>            
            <input type="checkbox" class="input-text" name="all_users" id="all_users">
          </div>
        </div>
      </div>

      <div class="input-box admin" name="subject-box">
        <label for="subject" class="input-lable">Subject</label>            
        <input type="text" class="input-text" name="subject" id="subject" value="{{ old('subject') }}" @error('subject') is-invalid @enderror>              
      </div>
      <div class="input-box" name="description-box">
        <label for="content" class="input-lable">Message</label>
        <textarea class="input-text area" name="content" id="content">{{ old('content') }}</textarea>            
      </div>     
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Send & close</button>          
          <button type="reset" class="btn-form cancel">Clear</button> 
          <a class="btn-form cancel" href="{{ route('admin.notifications.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('email', 'subject', 'message')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>

@endsection

@push('js')
    <script>
      const selectAllCheckbox = document.getElementById('all_users');
      const userSelect = document.getElementById('user_ids');

      selectAllCheckbox.addEventListener('change', function() {
        Array.from(userSelect.options).forEach(option => {
          option.selected = this.checked;
        });
      });

      userSelect.addEventListener('change', function() {
        const allSelected = Array.from(userSelect.options).every(option =>option.selected);
        selectAllCheckbox.checked = allSelected;
      });
    </script>
@endpush
