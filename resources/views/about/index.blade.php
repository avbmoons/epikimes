@extends('layouts.main')

@section('title', 'About')
@section('content')

<div class="top-block">
  <div class="top-left-box">
    @if (isset($elements['left_top_img']) && $elements['left_top_img']->is_visible)
      <img src="{{ asset('storage/elements/'.$elements['left_top_img']->image_path) }}" alt="image" class="about-img" id="leftTopImg">        
    @endif
  </div>
  <div class="top-right-box">
    @if (isset($elements['title_top']) && $elements['title_top']->is_visible)
      <p class="about-title" id="titleTop" style="color: {{ $elements['title_top']->color }}">{{ $elements['title_top']->title }}</p>
    @endif
    @if (isset($elements['text_top']) && $elements['text_top']->is_visible)
      <p class="about-text" id="textTop" style="color: {{ $elements['text_top']->color }}">{{ $elements['text_top']->title }}</p>
    @endif
  </div>
</div>
<div class="bottom-block">
  <div class="bottom-left-box">
    @if (isset($elements['title_bottom']) && $elements['title_bottom']->is_visible)
      <p class="about-title" id="titleBottom" style="color: {{ $elements['title_bottom']->color }}">{{ $elements['title_bottom']->title }}</p>
    @endif
    @if (isset($elements['text_bottom']) && $elements['text_bottom']->is_visible)
      <p class="about-text" id="textBottom" style="color: {{ $elements['text_bottom']->color }}">{{ $elements['text_bottom']->title }}</p>
    @endif
  </div>
  <div class="bottom-right-box">
    @if (isset($elements['right_bottom_img']) && $elements['right_bottom_img']->is_visible)
      <img src="{{ asset('storage/elements/'.$elements['right_bottom_img']->image_path) }}" alt="image" id="rightBottomImg" class="about-img">        
    @endif
  </div>
</div>

@endsection

@push('js')
<script>
  const paragraph = document.querySelector('p');
  paragraph.textContent = paragraph.textContent.trim();

</script>
@endpush