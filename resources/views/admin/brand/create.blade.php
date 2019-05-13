@extends('admin.layouts.app')

@section('content')

    <h1>Создание нового бренда</h1>
    <hr>
    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group required">
            <label for="name">Название бренда</label>
            <input type="text"
                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   name="name"
                   required
                   value="{{ old('name') }}">

            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group">
            <label for="description">Описание бренда</label>
            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                      name="description">{{ old('description') }}</textarea>

            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>

        <div class="form-group required">
            <label for="slug">Slug</label>
            <input type="text"
                   class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
                   name="slug"
                   value="{{ old('slug') }}">

            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
        </div>

        <div class="form-group">
            <label for="logo">Логотип</label>
            <div>
                <img id="preview" src="{{asset('logo/noimage.jpeg')}}" />
                <input type="file" name="logo" id="logo" class="d-none" onChange="refreshLogo(this)" />
                <br/>
                <a href="javascript:changeLogo();">Изменить</a> |
                <a style="color: red" href="javascript:removeLogo()">Удалить</a>

                <div>{{ $errors->first('logo') }}</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Создать</button>
    </form>
@endsection

@section('js')
    <script>
        function changeLogo() {
            document.getElementById("logo").click();
        }
        function refreshLogo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById("preview").src = e.target.result;
                };

                var imgPath = input.value;
                var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                    reader.readAsDataURL(input.files[0]);
                } else {
                    input.value = '';
                    alert('Принимаются только файлы форматов gif, png и jpg');
                }
            }
        };
        function removeLogo() {
            document.getElementById("preview").src = '/logo/noimage.jpeg';
            document.getElementById("logo").value = '';
        }
    </script>
@endsection