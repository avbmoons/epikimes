@extends('layouts.admin')

@section('title', 'Images Cleaner')
@section('content')

{{-- <div class="container"> --}}
  <section class="head-block">
    <div class="title-block">
      <div class="title-box">
        <p class="title">Images Storage Cleaner</p>
      </div>
    </div>  
    <div class="services-block">
        <div class="services-box" style="width: fit-content; justify-content: flex-end; margin-right: 0;">
          <div class="add-block" style="width: 100%;">
            <div class="add-box">
              @if (count($garbageFiles) > 0)
                <!-- Кнопка глобального подтверждения удаления -->
                {{-- <div class="btn-add" style="margin-bottom: 20px;"> --}}
                    <button class="btn-add" type="button" id="delete-selected-btn" disabled>
                      <svg class="img-delete" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.25 25.4999L21 23.2499L15.045 17.2949C14.7929 17.0427 14.4936 16.8427 14.1641 16.7062C13.8347 16.5698 13.4816 16.4995 13.125 16.4995C12.7684 16.4995 12.4153 16.5698 12.0859 16.7062C11.7564 16.8427 11.4571 17.0427 11.205 17.2949L4.5 23.9999M21 23.2499L23.955 20.2949C24.2071 20.0427 24.5064 19.8427 24.8359 19.7062C25.1653 19.5698 25.5184 19.4995 25.875 19.4995C26.2316 19.4995 26.5847 19.5698 26.9141 19.7062C27.2436 19.8427 27.5429 20.0427 27.795 20.2949L31.5 23.9999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke="#453B3A"/>
                        <path d="M18 3.75C11.655 3.75 8.4825 3.75 6.3795 5.547C6.0795 5.803 5.802 6.0805 5.547 6.3795C3.75 8.4825 3.75 11.655 3.75 18C3.75 24.345 3.75 27.5175 5.547 29.6205C5.803 29.9205 6.0805 30.198 6.3795 30.453C8.4825 32.25 11.655 32.25 18 32.25C24.345 32.25 27.5175 32.25 29.6205 30.453C29.9205 30.197 30.198 29.9195 30.453 29.6205C32.25 27.5175 32.25 24.345 32.25 18M32.25 12.75L27.75 8.25M27.75 8.25L23.25 3.75M27.75 8.25L32.25 3.75M27.75 8.25L23.25 12.75" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke="#453B3A"/>
                      </svg>
                    </button>                    
                {{-- </div>   --}}
              @endif
                <p class="lable-add">Delete selected files</p>            
            </div>
          </div>

        </div>
    </div>
    
  </section>
    {{--<h1>Cleaning storage space</h1>
     <h1>Очистка хранилища от мусорных изображений</h1> --}}
    
  <p class="page-comments" style="text-align: center;">Here files in the folder <code>storage/app/public/catalog</code> shown, that are not mentioned in the database.</p>
    {{-- <p>Здесь показаны файлы в папке <code>storage/app/public/catalog</code>, упоминания о которых отсутствуют в базе данных.</p> --}}

    @if(count($garbageFiles) > 0)
        <!-- Кнопка глобального подтверждения удаления -->
        {{-- <div style="margin-bottom: 20px;">
            <button type="button" id="delete-selected-btn" disabled>Delete the selected files</button>
        </div> --}}
        <section class="table-block">
          <table>
            <thead>
              <tr>
                <th><input type="checkbox" id="select-all" style="font-size: 20px;"></th>
                <th>Preview</th>
                <th>File name</th>
                <th>Size</th>
              </tr>
            </thead>
            <tbody>
                @foreach($garbageFiles as $file)
                    <tr id="row-{{ Str::slug($file['name']) }}">
                        <td>
                            <input type="checkbox" class="file-checkbox" value="{{ $file['name'] }}">
                        </td>
                        <td>
                            <!-- Показываем превью мусорной картинки, чтобы админ точно видел, что удаляет -->
                            <img src="{{ asset('storage/catalog/' . $file['name']) }}" alt="preview" style="max-width: 80px; max-height: 80px; object-fit: cover;">
                        </td>
                        <td>{{ $file['name'] }}</td>
                        <td>{{ $file['size'] }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </section>

        {{-- <table class="table-garbage">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>Preview</th>
                    <th>File name</th>
                    <th>Size</th>
                </tr>
            </thead>
            <tbody>
                @foreach($garbageFiles as $file)
                    <tr id="row-{{ Str::slug($file['name']) }}">
                        <td>
                            <input type="checkbox" class="file-checkbox" value="{{ $file['name'] }}">
                        </td>
                        <td>
                            <!-- Показываем превью мусорной картинки, чтобы админ точно видел, что удаляет -->
                            <img src="{{ asset('storage/catalog/' . $file['name']) }}" alt="preview" style="max-width: 80px; max-height: 80px; object-fit: cover;">
                        </td>
                        <td>{{ $file['name'] }}</td>
                        <td>{{ $file['size'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
    @else
        <div class="alert-success">
            <p>No unnecessary files were found in the storage.</p>
            {{-- <p>🎉 Отлично! Лишних файлов в каталоге не обнаружено.</p> --}}
        </div>
    @endif
{{-- </div> --}}


@endsection

@push('js')
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.file-checkbox');
    const deleteBtn = document.getElementById('delete-selected-btn');

    if (!deleteBtn) return;

    // 1. Логика выделения всех чекбоксов одной галкой
    selectAll.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
        toggleDeleteButton();
    });

    // 2. Активация кнопки удаления только если выбран хотя бы один файл
    checkboxes.forEach(cb => {
        cb.addEventListener('change', toggleDeleteButton);
    });

    function toggleDeleteButton() {
        const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
        deleteBtn.disabled = !anyChecked;
    }

    // 3. Отправка AJAX-запроса на удаление выбранных файлов с подтверждением
    deleteBtn.addEventListener('click', function() {
        const selectedFiles = Array.from(checkboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        if (selectedFiles.length === 0) return;

        if (confirm(`Вы уверены, что хотите навсегда удалить выбранные файлы (${selectedFiles.length} шт.) с сервера?`)) {
            sendDeleteRequest('{{ route("admin.images-cleaner.clear") }}', selectedFiles).then(result => {
                if (result && result.ok) {
                    alert(result.message);
                    // Вместо полной перезагрузки страницы просто перезагружаем её, чтобы обновить списки
                    location.reload();
                } else {
                    alert('Произошла ошибка при удалении файлов.');
                }
            });
        }
    });
});

async function sendDeleteRequest(url, filesArray) {
    let response = await fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ files: filesArray })
    });

    if (response.ok) {
        return await response.json();
    }
    return null;
}
</script>
@endpush

