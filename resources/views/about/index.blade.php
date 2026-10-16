@extends('layouts.main')

@section('title', 'About')
@section('content')

<div class="top-block">
  <div class="top-left-box">
    {{--<img src="../../../public/assets/images/left-top.png" alt="image" class="about-img">--}} 
    @if (isset($elements['left_top_img']) && $elements['left_top_img']->is_visible)
      <img src="{{ asset('storage/elements/'.$elements['left_top_img']->image_path) }}" alt="image" class="about-img" id="leftTopImg">        
    @endif
    {{-- <img src="{{ asset('assets/images/left-top.png') }}" alt="image" class="about-img" id="leftTopImg"> --}}
  </div>
  <div class="top-right-box">
    <p class="about-title" id="titleTop" style="color: {{ $elements['title_top']->color }}">
      {{-- About My Arts --}}
      @if (isset($elements['title_top']) && $elements['title_top']->is_visible)
      {{ $elements['title_top']->title }}                
      @endif
    </p>
    <p class="about-text" id="textTop" style="color: {{ $elements['text_top']->color }}">
    {{-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta maxime voluptatum possimus, sunt eveniet atque ipsam saepe. 
    Aut autem hic ea harum, sint vel repellendus necessitatibus sequi accusamus consequatur, ut alias est ipsam rerum qui cupiditate fuga reprehenderit dolor voluptas molestiae laborum? Nostrum, error ipsa a expedita cum ullam dignissimos corporis deserunt,
    suscipit deleniti rem optio sapiente reiciendis incidunt sed natus laborum. Quod consequatur cum neque dolorem eos magni distinctio est eveniet cumque, soluta repellendus. 
    Nam dolorum itaque rem ipsa.  --}}
    @if (isset($elements['text_top']) && $elements['text_top']->is_visible)
    {{ $elements['text_top']->title }}                
    @endif
    </p>
  </div>
</div>
<div class="bottom-block">
  <div class="bottom-left-box">
    <p class="about-title" id="titleBottom" style="color: {{ $elements['title_bottom']->color }}">
      {{-- About Me --}}
      @if (isset($elements['title_bottom']) && $elements['title_bottom']->is_visible)
      {{ $elements['title_bottom']->title }}                
      @endif
    </p>
    <p class="about-text" id="textBottom" style="color: {{ $elements['text_bottom']->color }}">
    {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
    Quidem rem quasi fugit nam! Officiis itaque adipisci natus reprehenderit corporis ad debitis necessitatibus quibusdam nisi? Quae, iusto. 
    Modi officia nemo obcaecati qui optio tempore rem sed dignissimos id suscipit eius quaerat quia pariatur quisquam, itaque iste autem atque ullam excepturi vero tenetur. 
    Facere quibusdam quam architecto quidem est sunt nisi. Commodi alias ad iste. Accusamus incidunt quidem eveniet, cum autem mollitia! --}}
    @if (isset($elements['text_bottom']) && $elements['text_bottom']->is_visible)
    {{ $elements['text_bottom']->title }}                
    @endif
    </p>
  </div>
  <div class="bottom-right-box">
    @if (isset($elements['right_bottom_img']) && $elements['right_bottom_img']->is_visible)
      <img src="{{ asset('storage/elements/'.$elements['right_bottom_img']->image_path) }}" alt="image" id="rightBottomImg" class="about-img">        
    @endif
    {{-- <img src="{{ asset('assets/images/right-bottom.png') }}" alt="image" class="about-img" id="rightBottomImg"> --}}
  </div>
</div>

@endsection

@push('js')
<script></script>
@endpush