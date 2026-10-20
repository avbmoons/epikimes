@extends('layouts.main')

@section('title', 'Catalog')
@section('content')
        <div class="btn-up-block">
          <a href="#top">
            <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M31 2.58331C15.3063 2.58331 2.58337 15.3062 2.58337 31C2.58337 46.6937 15.3063 59.4166 31 59.4166C46.6938 59.4166 59.4167 46.6937 59.4167 31C59.4167 15.3062 46.6938 2.58331 31 2.58331ZM22.4931 36.7014C22.0059 37.172 21.3533 37.4324 20.676 37.4265C19.9987 37.4206 19.3507 37.1489 18.8718 36.6699C18.3928 36.191 18.1211 35.543 18.1152 34.8657C18.1093 34.1883 18.3697 33.5358 18.8403 33.0486L29.1736 22.7152C29.6581 22.2309 30.315 21.9589 31 21.9589C31.685 21.9589 32.342 22.2309 32.8265 22.7152L43.1598 33.0486C43.6304 33.5358 43.8908 34.1883 43.8849 34.8657C43.879 35.543 43.6073 36.191 43.1283 36.6699C42.6493 37.1489 42.0014 37.4206 41.3241 37.4265C40.6467 37.4324 39.9942 37.172 39.507 36.7014L31 28.1945L22.4931 36.7014Z" fill="#d2d0cf"/>
            </svg>
          </a>
        </div>
        <div class="greeting-block" id="greetingBlock" style="height: fit-content; margin-bottom: 60px;">
          <div class="title-link-block">
            @if (isset($elements['title_catalog']) && $elements['title_catalog']->is_visible)
              <a href="{{ route('catalog') }}" class="title-link" id="titleCatalog" style="color: {{ $elements['title_catalog']->color }}">{{ $elements['title_catalog']->title }}</a>
            @endif
          </div>
          <div class="search-admin-block">
            <x-admin.search route-first="catalog" route-second="catalog"></x-admin.search>
          </div>
          
          {{-- <div class="search-block">
            <input type="text" class="input-search" placeholder="write your searched text here ...">
            <button type="button" class="btn-search">
              <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M31.5 31.5L24.771 24.759M28.5 15.75C28.5 19.1315 27.1567 22.3745 24.7656 24.7656C22.3745 27.1567 19.1315 28.5 15.75 28.5C12.3685 28.5 9.12548 27.1567 6.73439 24.7656C4.3433 22.3745 3 19.1315 3 15.75C3 12.3685 4.3433 9.12548 6.73439 6.73439C9.12548 4.3433 12.3685 3 15.75 3C19.1315 3 22.3745 4.3433 24.7656 6.73439C27.1567 9.12548 28.5 12.3685 28.5 15.75Z" stroke="#453B3A" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </button>
          </div> --}}
          <div class="resource-link-block">
            <a href="#">
              <img src="../assets/icons/instagram-logo.png" alt="instagram" class="resource-link">
            </a>
          </div>
        </div>
        <div class="catalog-block">
          @forelse ($itemsList as $item)
            @if ($item->status === 'active')           
              <a href="{{ route('itemId', ['id' => $item->id]) }}" id="item1Link" class="item-link">
                <div class="catalog-item" id="item-1">
                  <div class="item-img-block">
                    <img src="{{ asset('storage/catalog/'.$item->file_path)}}" alt="image" class="item-img">
                  </div>
                  <div class="item-txt-block">
                    <div class="txt-left-block">
                      <p class="item-title">{{ $item->title }}</p>
                      <div class="item-like-block">
                        <a href="#" class="item-like" title="Like this">
                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_231_1497)">
                              <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                              <clipPath id="clip0_231_1497">
                                <rect width="20" height="20" fill="white"/>
                              </clipPath>
                            </defs>
                          </svg>                    
                        </a>
                        <p class="item-like-score">2</p>
                      </div>
                      <p class="item-series">{{ $item->categories->title }}&nbsp;series</p>
                    </div>
                    <div class="txt-right-block">
                      <p class="item-txt">{{ $item->palette }}</p>
                      <p class="item-txt">{{ $item->colors->map(fn($item) => $item->title)->implode(", ") }}</p>
                      <p class="item-txt">{{ $item->size }}</p>
                      <p class="item-txt">{{ $item->year }}</p>
                    </div>
                  </div>
                </div>            
              </a>
            @endif  
          @empty
              <h2>No items</h2>
          @endforelse

        </div>

@endsection

@push('js')
<script></script>
@endpush