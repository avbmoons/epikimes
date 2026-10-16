<header-admin>
  <div class="header-block-admin" id="headerBlockAdmin">
    <div class="header-left-admin">
      <a href="index.html" class="site-title-admin">
        {{-- My Hobby Arts --}}
        @if (isset($headerElements['title_site']) && $headerElements['title_site']->is_visible)
            {{ $headerElements['title_site']->title }}
        @endif
        . Admin
      </a>
    </div>
    <div class="header-center-admin">
      <div class="menu-block">
        <a href="{{ route('home') }}" class="menu-item-admin">home</a>
        <a href="{{ route('catalog') }}" class="menu-item-admin">catalog</a>
        <a href="{{ route('about') }}" class="menu-item-admin last">about</a>
      </div>
    </div>
    <div class="header-right">
      <div class="service-block">
        <div class="service-item-admin">
          <a href="#" class="sign-out-link">Sign out</a>
        </div>
      </div>
    </div>
  </div>
</header-admin>