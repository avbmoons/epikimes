@extends('layouts.main')

@section('title', 'About')
@section('content')

<div class="top-block">
          <div class="top-left-box">
            {{--<img src="../../../public/assets/images/left-top.png" alt="image" class="about-img">--}} 
            <img src="{{ asset('assets/images/left-top.png') }}" alt="image" class="about-img">
          </div>
          <div class="top-right-box">
            <p class="about-title">About My Arts</p>
            <p class="about-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta maxime voluptatum possimus, sunt eveniet atque ipsam saepe. 
            Aut autem hic ea harum, sint vel repellendus necessitatibus sequi accusamus consequatur, ut alias est ipsam rerum qui cupiditate fuga reprehenderit dolor voluptas molestiae laborum? Nostrum, error ipsa a expedita cum ullam dignissimos corporis deserunt,
            suscipit deleniti rem optio sapiente reiciendis incidunt sed natus laborum. Quod consequatur cum neque dolorem eos magni distinctio est eveniet cumque, soluta repellendus. 
            Nam dolorum itaque rem ipsa. </p>
          </div>
</div>
<div class="bottom-block">
          <div class="bottom-left-box">
            <p class="about-title">About Me</p>
            <p class="about-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Quidem rem quasi fugit nam! Officiis itaque adipisci natus reprehenderit corporis ad debitis necessitatibus quibusdam nisi? Quae, iusto. 
            Modi officia nemo obcaecati qui optio tempore rem sed dignissimos id suscipit eius quaerat quia pariatur quisquam, itaque iste autem atque ullam excepturi vero tenetur. 
            Facere quibusdam quam architecto quidem est sunt nisi. Commodi alias ad iste. Accusamus incidunt quidem eveniet, cum autem mollitia!</p>
          </div>
          <div class="bottom-right-box">
            <img src="{{ asset('assets/images/right-bottom.png') }}" alt="image" class="about-img">
          </div>
</div>

@endsection

@push('js')
<script></script>
@endpush