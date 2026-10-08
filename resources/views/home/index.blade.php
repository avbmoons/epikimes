@extends('layouts.main')

@section('title', 'Home')
@section('content')

        <div class="greeting-block" id="greetingBlock">
          <div class="title-link-block">
            <a href="pages/catalog.html" class="title-link">All arts catalog</a>
          </div>
          <div class="greeting-text-block">
            <p class="greeting-text">Greetings, dear frends! 
              Come share the inspiration sparkles
              and take a look at my arts.</p>
          </div>
          <div class="resource-link-block">
            <a href="#">
              <img src="assets/icons/instagram-logo.png" alt="instagram" class="resource-link">
            </a>
          </div>
        </div>
        <div class="collage-block">
          <img src="assets/images/collage.png" alt="collage" class="collage-img">
          <a href="pages/catalog.html" class="collage-link">&#9472;&#9472;&#9472;&nbsp;Go to Catalog&nbsp;&#9472;&#9472;&#9472;</a>
        </div>
        <div class="news-block">
          <div class="title-link-block">
            <a href="#newImagesBlock" class="title-link">New arts</a>
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
