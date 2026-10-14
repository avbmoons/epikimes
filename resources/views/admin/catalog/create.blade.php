@extends('layouts.admin')

@section('title', 'Item.Create')

@section('content')

    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Item create</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.catalog.store') }}" class="form-input admin" enctype="multipart/form-data">
      @csrf
      <div class="input-box admin" name="btns-box" >
        <label for="picture" class="input-lable">Image</label>
        <div class="input-group admin" >
          <div class="input-box file-button" name="file-box" style="margin-bottom: 0; height: calc(3*$input-height); justify-content: center;">
            <label for="image" class="input-lable file-label" style="width: 45%;">Select file</label>
            <input type="file" class="input-text file-input" name="image" id="image" accept="image/*" required onchange="previewImage(event)" style="height: 60px;">@error('image')<span class="error">{{ $message }}</span> @enderror
            <span class="file-name" id="file-name">File not selected</span>
          </div>
          <div class="input-box" name="preview-box" style="margin-bottom: 0; height: calc(3*$input-height); justify-content: center;">
            <img class="image-preview" id="image-preview" src="#" alt="Preview">
          </div>
        </div>
      </div>      
      <div class="input-box admin" name="title-box">
        <label for="title" class="input-lable">Title</label>            
        <input type="text" class="input-text" name="title" id="title" value="{{ old('title') }}" @error('title') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="description-box">
        <label for="description" class="input-lable">Description</label>
        <textarea class="input-text area" name="description" id="description">{{ old('description') }}</textarea>            
      </div>
      <div class="input-group admin">
        <div class="input-box middle" name="category-box">
          <label class="input-lable" for="category_id">Category</label>
          <select class="input-text" name="category_id" id="category_id" @error('category_id') is-invalid @enderror>
            <option value="0">--Select category--</option>
            @foreach ($categories as $category)
              <option @if ((int) old('category') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
          </select>
          @error('category_id') @enderror
        </div>
        <div class="input-box middle" name="colors-box">
          <label class="input-lable" for="color_ids">Colors</label>
          <select class="input-text multiple" name="color_ids[]" id="color_ids" @error('color_ids[]') is-invalid @enderror multiple>
            <option value="0">--Select colors--</option>
            @foreach ($colors as $color)
              <option @if ((int) old('color_id') === $color->id) selected @endif value="{{ $color->id }}">{{ $color->title }}</option>
            @endforeach
          </select>
          @error('color_ids') @enderror
        </div>
      </div>
      <div class="input-group admin">
        <div class="input-box middle" name="size-box">
          <label for="size" class="input-lable">Size</label>            
          <input type="text" class="input-text" name="size" id="size" value="{{ old('size') }}" @error('size') is-invalid @enderror>              
        </div>
        <div class="input-box middle" name="year-box">
          <label for="itemYear" class="input-lable">Year</label>            
          <input type="number" class="input-text" name="year" id="itemYear" value="{{ old('year') }}" @error('year') is-invalid @enderror>              
        </div> 
      </div>
      <div class="input-box admin" name="image-box">
        <div class="input-group">
          <div class="input-box mini" name="status-box" style="margin-left: 0;">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if(old('status') === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div>
          <div class="input-box mini" name="palette-box" style="margin-right: 0;">
            <label for="palette" class="input-lable">Palette</label>            
            <select class="input-text" name="palette" id="palette">
              @foreach ($palettes as $palette)
                 <option @if(old('palette') === $palette) selected @endif>{{ $palette }}</option> 
              @endforeach              
            </select>
          </div>
          <div class="input-box mini" name="is-new-box" style="margin-right: 0;">
            <label for="is_new" class="input-lable" style="text-align: center;">Is New</label>            
            <input type="checkbox" class="input-text" name="is_new" id="is_new" value="{{ old('is_new') }}" @error('is_new') is-invalid @enderror>              
          </div>
        </div>
      </div>
      <div class="input-box admin" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          <button type="reset" class="btn-form cancel">Clear</button> 
          <a class="btn-form cancel" href="{{ route('admin.catalog.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('category_id', 'color_ids', 'theme_ids', 'num_enjoy', 'num_normal', 'num_worry')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
    
@endsection

@push('js')
    <script>
      function previewImage(event) {
        const input = event.target;
        const file = input.files[0];

        const preview = document.getElementById("image-preview");
        const fileNameSpan = document.getElementById("file-name");
        if (!file) {
          return;
        }

        fileNameSpan.textContent = file.name;

        const reader = new FileReader();

        reader.onload = function() {
          preview.src = reader.result;
          preview.style.display = 'block';
        }

          reader.readAsDataURL(file);
      }
    </script>
@endpush
