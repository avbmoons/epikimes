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
            @if (isset($elements['title_link_catalog']) && $elements['title_link_catalog']->is_visible)
              <a href="pages/catalog.html" class="title-link" id="titleLinkCatalog" style="color: {{ $elements['title_link_catalog']->color }}">{{ $elements['title_link_catalog']->title }}</a>
            @endif
          </div>
          <div class="greeting-text-block">            
            @if (isset($elements['welcome_text']) && $elements['welcome_text']->is_visible)
              <p class="greeting-text" id="welcomeText" style="color: {{ $elements['title_link_catalog']->color }}">{{ $elements['welcome_text']->title }}</p>               
            @endif            
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
          <a href="{{ route('catalog') }}" class="collage-link">&#9472;&#9472;&#9472;&nbsp;Go to Catalog&nbsp;&#9472;&#9472;&#9472;</a>
        </div>
        <div class="news-block">
          <div class="title-link-block" style="margin-bottom: 50px;">
            <a href="#newImagesBlock" class="title-link" id="titleNews" style="color: {{ $elements['title_news']->color }}">
              {{-- New arts --}}
              @if (isset($elements['title_news']) && $elements['title_news']->is_visible)
              {{ $elements['title_news']->title }}                
              @endif
            </a>
          </div>          
          @php
            $totalImagesCount = $newItems->whereNotNull('file_path')->count();
          @endphp

          @if ($totalImagesCount > 0)
            <div class="custom-slider" id="catalogSlider" data-total-images="{{ $totalImagesCount }}">
              <div class="slider-viewport" id="newImagesBlock">
                <div class="slider-track">
                  @foreach ($newItems as $item)
                    @if ($item->file_path)
                      <div class="slider-slide">
                        <div class="product-card">
                          <img src="{{ asset('storage/catalog/'.$item->file_path) }}" alt="{{ $item->title }}">
                          <span class="badge-new">New image</span>
                          <p class="item-title-new">{{ $item->title }}</p>
                        </div>
                      </div>
                    @endif  
                  @endforeach
                </div>
              </div>
              <button class="slider-btn prev-btn" aria-label="Prev">&#9668;&nbsp;</button>
              <button class="slider-btn next-btn" aria-label="Next">&nbsp;&#9658;</button>
              <div class="slider-dots"></div>
            </div>  
          @else
            <p class="no-news">Nothing new images yet</p>
          @endif


          {{-- <div class="new-images-block" id="newImagesBlock">
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
          </div> --}}
        </div>

@endsection

@push('js')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementById('catalogSlider');
    if (!slider) return;

    // Читаем количество картинок из атрибута шаблона
    const totalImages = parseInt(slider.getAttribute('data-total-images')) || 0;

    // --- ЛОГИКА АВТОСТОПОРА ---
    // Если новинок меньше 4, слайдер отключается и превращается в статичную сетку
    if (totalImages < 4) {
        slider.classList.add('not-enough-slides');
        return; 
    }

    const track = slider.querySelector('.slider-track');
    const prevBtn = slider.querySelector('.prev-btn');
    const nextBtn = slider.querySelector('.next-btn');
    const dotsContainer = slider.querySelector('.slider-dots');
    
    const originalSlides = Array.from(track.children);
    const originalCount = originalSlides.length;

    let currentIndex = 0;
    let slidesPerView = getSlidesPerView();
    let isTransitioning = false;

    // Переменные свайпа
    let startX = 0;
    let currentX = 0;
    let isDragging = false;

    // 1. Бесконечное клонирование: вставляем копии оригиналов в начало и в конец
    const clonesBefore = originalSlides.slice(-originalCount).map(el => el.cloneNode(true));
    const clonesAfter = originalSlides.slice(0, originalCount).map(el => el.cloneNode(true));

    clonesBefore.forEach(clone => track.insertBefore(clone, track.firstChild));
    clonesAfter.forEach(clone => track.appendChild(clone));

    // 2. Создание пагинации
    for (let i = 0; i < originalCount; i++) {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => {
            if (isTransitioning) return;
            currentIndex = originalCount + i;
            updatePosition(true);
        });
        dotsContainer.appendChild(dot);
    }
    const dots = dotsContainer.querySelectorAll('.dot');    

    // Пропускаем левые клоны, встаем на реальный первый слайд
    currentIndex = originalCount;
    updatePosition(false);



    // 3. Расчет позиции и сдвига трека в %
    function updatePosition(animation = true) {
        if (!animation) {
            track.style.transition = 'none';
        } else {
            track.style.transition = 'transform 0.4s ease-in-out';
            isTransitioning = true;
        }

        const slideWidthPercent = 100 / slidesPerView;
        track.style.transform = `translateX(-${currentIndex * slideWidthPercent}%)`;
        
        updateDots();
    }

    function updateDots() {
        dots.forEach(dot => dot.classList.remove('active'));
        let realIndex = (currentIndex - originalCount) % originalCount;
        if (realIndex < 0) realIndex += originalCount;
        if (dots[realIndex]) dots[realIndex].classList.add('active');
    }

    // 4. Бесшовная подмена клона на оригинал (после завершения CSS-анимации)
    track.addEventListener('transitionend', () => {
        isTransitioning = false;

        if (currentIndex >= originalCount * 2) {
            currentIndex = currentIndex - originalCount;
            updatePosition(false);
        }
        if (currentIndex < originalCount) {
            currentIndex = currentIndex + originalCount;
            updatePosition(false);
        }
    });

    // 5. Клик по кнопкам
    nextBtn.addEventListener('click', () => {
        if (isTransitioning) return;
        currentIndex++;
        updatePosition(true);
    });

    prevBtn.addEventListener('click', () => {
        if (isTransitioning) return;
        currentIndex--;
        updatePosition(true);
    });

    // --- ЛОГИКА СВАЙПА (Touch на мобильных & Mouse на ПК) ---
    function handleTouchStart(e) {
        if (isTransitioning) return;
        isDragging = true;
        startX = e.type.includes('touch') ? e.touches.clientX : e.clientX;
        track.style.transition = 'none'; // Отключаем анимацию при движении пальца
    }

    function handleTouchMove(e) {
        if (!isDragging) return;
        currentX = e.type.includes('touch') ? e.touches.clientX : e.clientX;
        const diffX = currentX - startX;

        // Двигаем ленту вслед за пальцем/курсором
        const slideWidthPercent = 100 / slidesPerView;
        const baseLeftPercent = -(currentIndex * slideWidthPercent);
        const dragPercent = (diffX / slider.offsetWidth) * 100;
        
        track.style.transform = `translateX(${baseLeftPercent + dragPercent}%)`;
    }

    function handleTouchEnd() {
        if (!isDragging) return;
        isDragging = false;
        const diffX = currentX - startX;
        
        const threshold = 50; // Минимальная длина свайпа для перелистывания в пикселях

        if (diffX < -threshold) {
            currentIndex++; // Свайп влево -> следующий
            updatePosition(true);
        } else if (diffX > threshold) {
            currentIndex--; // Свайп вправо -> предыдущий
            updatePosition(true);
        } else {
            updatePosition(true); // Слабый свайп -> возврат на место
        }
        
        startX = 0;
        currentX = 0;
    }

    // Тач-события для смартфонов
    track.addEventListener('touchstart', handleTouchStart, { passive: true });
    track.addEventListener('touchmove', handleTouchMove, { passive: true });
    track.addEventListener('touchend', handleTouchEnd);

    // События мыши для десктопа (удобно для тестов)
    track.addEventListener('mousedown', handleTouchStart);
    window.addEventListener('mousemove', handleTouchMove);
    window.addEventListener('mouseup', handleTouchEnd);

    // 6. Динамический подсчет количества видимых слайдов при изменении экрана
    function getSlidesPerView() {
        const width = window.innerWidth;
        if (width >= 1024) return 4;
        if (width >= 768) return 3;
        if (width >= 576) return 2;
        return 1;
    }

    window.addEventListener('resize', () => {
        const newSlidesPerView = getSlidesPerView();
        if (newSlidesPerView !== slidesPerView) {
            slidesPerView = newSlidesPerView;
            updatePosition(false); // Мгновенно подгоняем размеры без анимации скачка
        }
    });
  });

</script>
@endpush
