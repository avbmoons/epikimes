@extends('layouts.admin')

@section('title', 'Color.Edit')

@section('content')

    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Color edit</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.colors.update', ['color' => $color]) }}" class="form-input admin">
      @csrf
      @method('put')
      <div class="input-box admin" name="title-box">
        <label for="title" class="input-lable">Title</label>            
        <input type="text" class="input-text" name="title" id="title" value="{{ $color->title }}" @error('title') is-invalid @enderror>              
      </div>
      <div class="input-box" name="description-box">
        <label for="description" class="input-lable">Description</label>
        <textarea class="input-text area" name="description" id="description">{{ $color->description }}</textarea>            
      </div>     
      <div class="input-box" name="image-box">
        <div class="input-group">
          {{-- <div class="input-box mini" name="code-box">
            <label for="code" class="input-lable">Code</label>
            <input type="number" class="input-text" name="code" id="code" value="{{ old('code') }}" @error('code') is-invalid @enderror>            
          </div> --}}
          <div class="input-box mini edit" name="id-box">
            <label for="id-field" class="input-lable">ID#</label>
            <input type="text" class="input-text notread" name="id-field" id="id-field" value="{{ $color->id }}" readonly>            
          </div>
          {{-- <div class="input-box mini" name="status-box">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if($color->status === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div> --}}
        </div>
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          {{-- <button type="reset" class="btn-form cancel">Clear</button>  --}}
          <a class="btn-form cancel" href="{{ route('admin.colors.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
    
@endsection
    



