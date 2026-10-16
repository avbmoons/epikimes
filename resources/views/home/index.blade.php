@extends('layouts.main')

@section('title', 'Home')
@section('content')
        <div class="btn-up-block">
            <a href="#top">
              <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M31 2.58331C15.3063 2.58331 2.58337 15.3062 2.58337 31C2.58337 46.6937 15.3063 59.4166 31 59.4166C46.6938 59.4166 59.4167 46.6937 59.4167 31C59.4167 15.3062 46.6938 2.58331 31 2.58331ZM22.4931 36.7014C22.0059 37.172 21.3533 37.4324 20.676 37.4265C19.9987 37.4206 19.3507 37.1489 18.8718 36.6699C18.3928 36.191 18.1211 35.543 18.1152 34.8657C18.1093 34.1883 18.3697 33.5358 18.8403 33.0486L29.1736 22.7152C29.6581 22.2309 30.315 21.9589 31 21.9589C31.685 21.9589 32.342 22.2309 32.8265 22.7152L43.1598 33.0486C43.6304 33.5358 43.8908 34.1883 43.8849 34.8657C43.879 35.543 43.6073 36.191 43.1283 36.6699C42.6493 37.1489 42.0014 37.4206 41.3241 37.4265C40.6467 37.4324 39.9942 37.172 39.507 36.7014L31 28.1945L22.4931 36.7014Z" fill="#d2d0cf"/>
              </svg>
            </a>
        </div>

        <div class="greeting-block" id="greetingBlock">
          <div class="title-link-block">
            <a href="pages/catalog.html" class="title-link" id="titleLinkCatalog" style="color: {{ $elements['title_link_catalog']->color }}">
              {{-- All arts catalog  --}}
              @if (isset($elements['title_link_catalog']) && $elements['title_link_catalog']->is_visible)
              {{ $elements['title_link_catalog']->title }}                
              @endif
            </a>
          </div>
          <div class="greeting-text-block">
            <p class="greeting-text" id="welcomeText" style="color: {{ $elements['title_link_catalog']->color }}">
              {{-- Greetings, dear frends! 
              Come share the inspiration sparkles
              and take a look at my arts. --}}
              @if (isset($elements['welcome_text']) && $elements['welcome_text']->is_visible)
              {{ $elements['welcome_text']->title }}                
              @endif
            </p>
          </div>
          <div class="resource-link-block">
            <a href="#">
              <img src="assets/icons/instagram-logo.png" alt="instagram" class="resource-link">
            </a>
          </div>
        </div>
        <div class="collage-block">
          @if (isset($elements['collage_img']) && $elements['collage_img']->is_visible)
            <img src="{{ asset('storage/elements/'.$elements['collage_img']->image_path) }}" alt="image" class="collage-img" id="collageImg">        
          @endif          
          {{-- <img src="{{ asset('assets/images/collage.png') }}" alt="collage" class="collage-img" id="collageImg"> --}}
          <a href="pages/catalog.html" class="collage-link">&#9472;&#9472;&#9472;&nbsp;Go to Catalog&nbsp;&#9472;&#9472;&#9472;</a>
        </div>
        <div class="news-block">
          <div class="title-link-block">
            <a href="#newImagesBlock" class="title-link" id="titleNews" style="color: {{ $elements['title_news']->color }}">
              {{-- New arts --}}
              @if (isset($elements['title_news']) && $elements['title_news']->is_visible)
              {{ $elements['title_news']->title }}                
              @endif
            </a>
          </div>
          <div class="new-images-block" id="newImagesBlock">
            <div class="new-image-card">
              <div class="new-image-card-block">
                <img src="assets/catalog/item-1.png" alt="image" class="image-item">
              </div>              
            </div>
            <div class="new-image-card">
              <div class="new-image-card-block">
                <img src="assets/catalog/item-2.png" alt="image" class="image-item">
              </div>              
            </div>
            <div class="new-image-card">
              <div class="new-image-card-block">
                <img src="assets/catalog/item-6.png" alt="image" class="image-item">
              </div>              
            </div>
            <div class="new-image-card">
              <div class="new-image-card-block">
                <img src="assets/catalog/item-11.png" alt="image" class="image-item">
              </div>              
            </div>           
          </div>
        </div>

@endsection

@push('js')
<script></script>
@endpush
