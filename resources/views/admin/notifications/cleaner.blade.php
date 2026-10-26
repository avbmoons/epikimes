@extends('layouts.admin')

@section('title', 'Notification.Create')

@section('content')

    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Notification cleaner</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form action="{{ route('admin.notifications.cleaner') }}" method="GET" class="form-input admin" style="width: 70vw; margin-bottom: 20px;">
      {{-- <form action="{{ route('admin.notifications.bulk-destroy') }}" method="POST" onsubmit="return confirm('Are you sure');" class="form-input admin" style="width: 70vw;"> --}}
      @csrf

      <input type="hidden" name="action" value="preview">

      <div class="input-group admin">
        <div class="input-box middle" name="users-box" style="width: 40%;">
          <label class="input-lable" for="filter_user_id">User ID</label>
          <select class="input-text" name="filter_user_id" id="filter_user_id" >
            <option value="">--Select user--</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ request('filter_user_id') == $user->id ? 'selected' : '' }}>[{{ $user->id }}] {{ $user->name }} {{ $user->email }}</option>
              {{-- <option value="{{ $user->id }}">[{{ $user->id }}] {{ $user->name }} {{ $user->email }}</option> --}}
            @endforeach
          </select>
          
        </div>
        <div class="input-box middle" name="subject-box" style="width: 40%;">
          <label class="input-lable" for="filter_subject">Subject</label>
          <select class="input-text" name="filter_subject" id="filter_subject" >
            <option value="">--Select subject--</option>
            @foreach ($uniqueSubjects as $subject)
              <option value="{{ $subject }}" {{ request('filter_subject') == $subject ? 'selected' : '' }}>{{ $subject }}</option>
              {{-- <option value="{{ $subject }}">{{ $subject }}</option> --}}
            @endforeach
          </select>          
        </div>
      </div>

      <div class="input-group admin">
        <div class="input-box mini" name="one-date-box" style="width: 25%;">
          <label class="input-lable" for="filter_exact_date">Only for Date</label>
          <input type="date" class="input-text" name="filter_exact_date" id="filter_exact_date" value="{{ request('filter_exact_date') }}" >          
        </div>
        <div class="input-box mini" name="order-date-box" style="width: 25%;">
          <label class="input-lable" for="filter_order_date">Date and older</label>
          <input type="date" class="input-text" name="filter_order_date" id="filter_order_date" value="{{ request('filter_order_date') }}">          
        </div>        
      </div>

      <div class="input-box admin" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Preview</button>          
          {{-- <button type="reset" class="btn-form cancel">Reset</button>  --}}
          <a class="btn-form cancel" href="{{ route('admin.notifications.cleaner') }}">Reset</a>
          <a class="btn-form cancel" href="{{ route('admin.notifications.index') }}">Cancel</a>       
        </div>
      </div>

      @if ($emptyError)
        <p class="page-comments" style="color: red; margin-bottom: 20px;">Select at least one filter to clean</p>  
      @endif
      
    </form>

    @if ($hasFilter)
      {{-- <p class="page-comments">{{ $previewNotifications->total() }} records found preview</p>
      <section class="table-block"> --}}
          @if ($previewNotifications->total() > 0)
              <form action="{{ route('admin.notifications.bulk-destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete these {{ $previewNotifications->total() }} records from the database?');" class="form-input admin" style="width: 70vw; margin-bottom: 20px; justify-content: center;">
                @csrf
                <input type="hidden" name="filter_user_id" value="{{ request('filter_user_id') }}">
                <input type="hidden" name="filter_subject" value="{{ request('filter_subject') }}">
                <input type="hidden" name="filter_exact_date" value="{{ request('filter_exact_date') }}">
                <input type="hidden" name="filter_order_date" value="{{ request('filter_order_date') }}">

                <div class="input-box" name="btns-box" style="justify-content: center; align-content: center; margin-bottom: 0;">
                  <div class="input-group">                    
                    <button type="submit" class="btn-form">Delete selection</button>
                    <div style="height: 100%; display: flex; flex-direction: column; justify-content: center;">
                      <p class="page-comments" >{{ $previewNotifications->total() }} records found preview</p>
                    </div>                    
                  </div>
                </div>

              </form>
          @endif

          @if ($previewNotifications->isEmpty())
              <p class="page-comments">No records found that match the selected filters.</p>
          @else
      <section class="table-block" style="margin-top: 0; width: 70vw;">
            <table style="width: 100%; margin-left: 0;">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>User</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($previewNotifications as $notification)
                  <tr>
                    <td>{{ $notification->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $notification->notifiable->name }}</td>
                    <td>{{ $notification->data['title'] ?? '' }}</td>
                  </tr> 
                @endforeach
              </tbody>
            </table>

            <div class="custom-pagination" style="margin-bottom: 40px;">
              {{ $previewNotifications->links() }}
            </div>
          @endif
      </section>
    @endif

@endsection

@push('js')
    <script></script>
@endpush