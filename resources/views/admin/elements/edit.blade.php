@extends('layouts.admin')

@section('title', 'Element.Edit')

@section('content')

    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Element edit</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.elements.update', ['element' => $element->id]) }}" class="form-input admin" enctype="multipart/form-data">
      @csrf
      @method('put')
      @if ($element->image_path)
        <div class="input-box admin" name="btns-box" >
          <label for="picture" class="input-lable">Image</label>
          <div class="input-group admin" >
            <div class="input-box file-button" name="file-box" style="margin-bottom: 0; height: calc(3*$input-height); justify-content: center;">
              <label for="image" class="input-lable file-label" style="width: 45%;">Select image</label>
              <input type="file" class="input-text file-input" name="image" id="image" accept="image/*" onchange="previewImage(event)" style="height: 60px;">@error('image')<span class="error">{{ $message }}</span> @enderror
              <span class="file-name" id="file-name">{{ old('image_path', $element->image_path) }}</span>
            </div>
            <div class="input-box" name="preview-box" style="margin-bottom: 0; height: calc(3*$input-height); justify-content: center;">
              <img class="image-preview" id="image-preview" src="{{{ asset('storage/elements/'.$element->image_path) }}}" alt="image">           
            </div>
          </div>
        </div>
        <div class="input-box admin" name="color-box" style="visibility: hidden">
          <label for="colorPicker" class="input-lable">Color</label> 
          <div class="input-group">           
            <input type="color" class="input-text color" name="color-picker" id="colorPicker" value="{{ old('color', $element->color ?? '#ffffff')}}" @error('color') is-invalid @enderror> 
            <input type="text" class="input-text" name="color" id="colorText" value="{{ old('color', $element->color ?? '#ffffff') }}" @error('color') is-invalid @enderror> 
          </div>            
        </div>
        <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini edit" name="id-box">
            <label for="id-field" class="input-lable">ID#</label>
            <input type="text" class="input-text notread" name="id-field" id="id-field" value="{{ $element->id }}" readonly>            
          </div>
          <div class="input-box mini edit" name="page-box">
            <label for="pageField" class="input-lable">Page</label>
            <input type="text" class="input-text notread" name="page-field" id="pageField" value="{{ $element->page }}" readonly>            
          </div>
          <div class="input-box mini" name="is-new-box" style="margin-right: 0;">
            <label for="is_visible" class="input-lable" style="text-align: center;">Is Visible</label>            
            <input type="checkbox" class="input-text" name="is_visible" id="is_visible" value="1" {{ $element->is_visible ? 'checked': '' }} @error('is_visible') is-invalid @enderror>              
          </div>
        </div>
      </div>
      @else          
      
      <div class="input-box admin" name="title-box">
        <label for="title" class="input-lable">Title</label>
        <textarea class="input-text area" name="title" id="title">{{ $element->title }}</textarea>            
      </div> 
      <div class="input-box admin" name="color-box">
        <label for="colorPicker" class="input-lable">Color</label> 
        <div class="input-group">           
          <input type="color" class="input-text color" name="color-picker" id="colorPicker" value="{{ old('color', $element->color ?? '#ffffff')}}" @error('color') is-invalid @enderror> 
          <input type="text" class="input-text" name="color" id="colorText" value="{{ old('color', $element->color ?? '#ffffff') }}" @error('color') is-invalid @enderror> 
        </div>            
      </div>          
      <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini edit" name="id-box">
            <label for="id-field" class="input-lable">ID#</label>
            <input type="text" class="input-text notread" name="id-field" id="id-field" value="{{ $element->id }}" readonly>            
          </div>
          <div class="input-box mini edit" name="page-box">
            <label for="pageField" class="input-lable">Page</label>
            <input type="text" class="input-text notread" name="page-field" id="pageField" value="{{ $element->page }}" readonly>            
          </div>
          <div class="input-box mini" name="is-new-box" style="margin-right: 0;">
            <label for="is_visible" class="input-lable" style="text-align: center;">Is Visible</label>            
            <input type="checkbox" class="input-text" name="is_visible" id="is_visible" value="1" {{ $element->is_visible ? 'checked': '' }} @error('is_visible') is-invalid @enderror>              
          </div>
        </div>
      </div>
      @endif

      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          <a class="btn-form cancel" href="{{ route('admin.elements.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
    
@endsection

@push('js')
    <script>
      const picker = document.getElementById('colorPicker');
      const textInput = document.getElementById('colorText');

      picker.addEventListener('input', (e) => {
        textInput.value = e.target.value.toUpperCase();
      });

      textInput.addEventListener('input', (e) => {
        const val = e.target.value;
        if (/^#[0-9A-F]{6}$/i.test(val)) {
          picker.value = val;
        }
      });
    </script>
    <script>
      function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();

        reader.onload = function() {
          const output = document.getElementById('image-preview');
          output.src = reader.result;
          output.style.display = 'block';
        }
        if(input.files && input.files[0]) {
          reader.readAsDataURL(input.files[0]);

          const spanFileName = document.getElementById('file-name');
          if (spanFileName) {
            spanFileName.textContent = input.files[0].name;
          }
        }      
      }
    </script>
@endpush

    



