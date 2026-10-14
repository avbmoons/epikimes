@props(['routeAdd', 'titleAdd'])

<div class="add-block">
  <div class="add-box">            
    <button class="btn-add">
      <a href="{{ route($routeAdd) }}">
      <svg class="img-add" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.875 16.875V5.25H19.125V16.875H30.75V19.125H19.125V30.75H16.875V19.125H5.25V16.875H16.875Z" fill="#453B3A"/>
      </svg>
      </a>
    </button>            
    <p class="lable-add">Add {{ $titleAdd }}</p>
  </div>
</div>