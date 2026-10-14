@extends('layouts.admin')

@section('title', 'Catalog')
@section('content')

  <section class="head-block">
    <div class="title-block">
      <div class="title-box">
        <p class="title">Catalog</p>
      </div>
    </div>
    <div class="services-block">
      <div class="services-box">
        <x-admin.search route-first="admin.catalog.index" route-second="admin.catalog.index"></x-admin.search>
        <x-admin.add route-add="admin.catalog.create" title-add="Item"></x-admin.add>
      </div>
    </div>
  </section>
  <section class="table-block">
    <table>
      <thead>
        <tr>
          <th class="th-id">#ID</th>
          <th>Title</th>
          {{-- <th>Description</th> --}}
          <th>Thumbnail</th>
          <th>Category</th>
          <th>Palette</th>
          <th>Size</th>
          <th>Year</th>
          <th class="th-status">Status</th>
          <th class="th-fixed">Updated</th>
          <th class="th-fixed">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($itemsList as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->title }}</td>
          {{-- <td>{{ $item->description }}</td> --}}
          <td style="text-align: center; padding-left: 0;"><img class="thumbnail" src="{{ asset('storage/catalog/'.$item->file_path)}}" alt="image"></td>
          <td>{{ $item->categories->title }}</td>
          <td>{{ $item->palette }}</td>
          <td>{{ $item->size }}</td>
          <td>{{ $item->year }}</td>
          <td>
            <div class="statuses">
              <p>{{ $item->status }}</p>
            </div>
          </td>
          <td class="time-field">{{ $item->updated_at->format('d.m.Y H:i') }}</td> 
          <td>
            <div class="actions">              
                <button class="btn-action show" name="actionShow" style="display: block">
                  <a href="">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.5 18C15.5 18 18.96 15.78 20.74 12.5C18.96 9.22 15.5 7 11.5 7C7.50001 7 4.04001 9.22 2.26001 12.5C4.04001 15.78 7.50001 18 11.5 18ZM11.5 6C16.06 6 20 8.65 21.86 12.5C20 16.35 16.06 19 11.5 19C6.94001 19 3.00001 16.35 1.14001 12.5C3.00001 8.65 6.94001 6 11.5 6ZM11.5 8C14 8 16 10 16 12.5C16 15 14 17 11.5 17C9.00001 17 7.00001 15 7.00001 12.5C7.00001 10 9.00001 8 11.5 8ZM11.5 9C10.5718 9 9.68152 9.36875 9.02514 10.0251C8.36876 10.6815 8.00001 11.5717 8.00001 12.5C8.00001 13.4283 8.36876 14.3185 9.02514 14.9749C9.68152 15.6313 10.5718 16 11.5 16C12.4283 16 13.3185 15.6313 13.9749 14.9749C14.6313 14.3185 15 13.4283 15 12.5C15 11.5717 14.6313 10.6815 13.9749 10.0251C13.3185 9.36875 12.4283 9 11.5 9Z" fill="#1B1357"/>
                    </svg>
                  </a>
                </button>              
                 <button class="btn-action" name="actionEdit">
                  <a href="{{ route('admin.catalog.edit', $item) }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M20.987 3.01249C20.6663 2.6918 20.2856 2.43742 19.8666 2.26386C19.4476 2.0903 18.9985 2.00098 18.545 2.00098C18.0915 2.00098 17.6424 2.0903 17.2234 2.26386C16.8044 2.43742 16.4237 2.6918 16.103 3.01249L4.01898 15.0985C3.63793 15.4793 3.36642 15.9556 3.23298 16.4775L2.01948 21.22C1.99271 21.325 1.99372 21.4353 2.02242 21.5398C2.05112 21.6444 2.10652 21.7396 2.18318 21.8163C2.25984 21.893 2.35512 21.9484 2.45967 21.9771C2.56422 22.0058 2.67443 22.0068 2.77948 21.98L7.52298 20.768C8.04524 20.6347 8.52194 20.3632 8.90298 19.982L20.987 7.89599C21.6345 7.24835 21.9982 6.37005 21.9982 5.45424C21.9982 4.53843 21.6345 3.66013 20.987 3.01249ZM16.987 3.89649C17.4002 3.48322 17.9606 3.25102 18.5451 3.25097C19.1295 3.25092 19.69 3.48303 20.1032 3.89624C20.5165 4.30945 20.7487 4.8699 20.7488 5.45431C20.7488 6.03872 20.5167 6.59922 20.1035 7.01249L19 8.11599L15.884 4.99949L16.987 3.89649ZM15 5.88349L18.116 8.99999L8.01898 19.098C7.79663 19.3206 7.51837 19.4792 7.21348 19.557L3.49198 20.508L4.44398 16.7875C4.52198 16.4825 4.68048 16.2045 4.90248 15.9825L15 5.88349Z" fill="#1B1357"/>
                    </svg>
                  </a>
                </button>              
                <button class="btn-action" name="actionDel">
                  <a href="javascript:;" class="delete" rel="{{ $item->id }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.774 6.4L7.586 20.048C7.59823 20.2514 7.68761 20.4425 7.8359 20.5822C7.9842 20.722 8.18023 20.7999 8.384 20.8H15.616C15.8198 20.7999 16.0158 20.722 16.1641 20.5822C16.3124 20.4425 16.4018 20.2514 16.414 20.048L17.226 6.4H6.774ZM18.429 6.4L17.612 20.119C17.5817 20.6278 17.3582 21.1059 16.9872 21.4555C16.6162 21.8051 16.1258 21.9999 15.616 22H8.384C7.87425 21.9999 7.38377 21.8051 7.01279 21.4555C6.64182 21.1059 6.41833 20.6278 6.388 20.119L5.571 6.4H3.5V5.7C3.5 5.56739 3.55268 5.44021 3.64645 5.34645C3.74021 5.25268 3.86739 5.2 4 5.2H20C20.1326 5.2 20.2598 5.25268 20.3536 5.34645C20.4473 5.44021 20.5 5.56739 20.5 5.7V6.4H18.429ZM14 3C14.1326 3 14.2598 3.05268 14.3536 3.14645C14.4473 3.24021 14.5 3.36739 14.5 3.5V4.2H9.5V3.5C9.5 3.36739 9.55268 3.24021 9.64645 3.14645C9.74021 3.05268 9.86739 3 10 3H14ZM9.5 9H10.7L11.2 18H10L9.5 9ZM13.3 9H14.5L14 18H12.8L13.3 9Z" fill="#1B1357"/>
                    </svg>
                  </a>
                </button>
            </div>
          </td>
        </tr>
        @empty
          <tr>
            <td colspan="?">No items</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="custom-pagination">  
      {{ $itemsList->links() }}
    </div>

  </section>

@endsection

@push('js')
<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/catalog/${id}`).then(() => {
                        location.reload();
                    });
                } else {
                    alert("Удаление отменено");
                }
            });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
</script>
@endpush
