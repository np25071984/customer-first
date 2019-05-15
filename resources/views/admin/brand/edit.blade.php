@extends('admin.layouts.app')

@section('content')

    <h1>Редактирование бренда</h1>
    <hr>
    <form action="{{ route('admin.brand.update', $brand->id)}}" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_method" value="PUT">

        {{ csrf_field() }}

        <div class="form-group required">
            <label for="name">Название бренда</label>
            <input type="text"
                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   name="name"
                   value="{{ $brand->name }}">

            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group">
            <label for="description">Описание бренда</label>
            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                      name="description">{{ $brand->description }}</textarea>

            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>

        <div class="form-group required">
            <label for="slug">Slug</label>
            <input type="text"
                   class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
                   name="slug"
                   value="{{ $brand->slug->value }}">

            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
        </div>

        <div class="form-group">
            <label for="logo">Логотип</label>
            <div>
                @if ($brand->logo)
                    <input type="text" name="filename" id="filename" class="form-control mb-3" value="{{ $brand->logo }}"/>
                    <img id="preview" src="/logo/{{ $brand->logo }}" />
                @else
                    <input type="text" name="filename" id="filename" class="form-control mb-3 d-none" />
                    <img id="preview" src="{{ asset('logo/noimage.jpeg') }}" />
                @endif

                <input type="file" name="logo" id="logo" class="d-none" onChange="refreshLogo(this)" />
                <br />
                <a href="javascript:changeLogo();">Изменить</a> |
                <a style="color: red" href="javascript:removeLogo()">Удалить</a>
                <input type="hidden" class="d-none" value="0" name="remove" id="remove">

                @if ($errors->has('logo'))
                    <div class="invalid-feedback d-block">{{ $errors->first('logo') }}</div>
                @elseif ($errors->has('filename'))
                    <div class="invalid-feedback d-block">{{ $errors->first('filename') }}</div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Изменить</button>
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
                reader.filename = input.files[0].name;

                reader.onload = function (e) {
                    document.getElementById("preview").src = e.target.result;
                    document.getElementById("filename").value = e.target.filename;
                    document.getElementById("filename").classList.remove("d-none");
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
            document.getElementById("filename").value = '';
            document.getElementById("filename").classList.add("d-none");
            document.getElementById("preview").src = '/logo/noimage.jpeg';
            document.getElementById("remove").value = 1;
        }
    </script>
@endsection