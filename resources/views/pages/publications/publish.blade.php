@extends('layouts.general')

@section('title')
    CrowdFunding.kz
@endsection

@section('content')
    <section class="publish-section">
        <div class="container">
        <div class="row text-center text-white">
            <h1 class="display-3 fw-bold">Добавление публикации</h1>
{{--            <hr style="width: 100px; height: 3px; " class="mx-auto">--}}
        </div>

        <form action="#" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-3">
                <label for="category" class="text-white">Категория</label>
                <select id="category" name="category" class="form-control">
                    <option value="">Category 1</option>
                    <option value="">Category 2</option>
                    <option value="">Category 3</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="name" class="text-white">Название проекта</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Введите название">
            </div>
            <div class="form-group mt-3">
                <label for="description" class="text-white">Описание</label>
                <textarea name="description" id="description" class="form-control" placeholder="Описание"></textarea>
            </div>
{{--            <div class="form-group mt-3">--}}
{{--                <label for="price" class="text-white">Цена</label>--}}
{{--                <input type="number" id="price" name="price" class="form-control" placeholder="Цена">--}}
{{--                @error('price')--}}
{{--                <small id="emailHelp" class="form-text text-danger">Укажите цену</small>--}}
{{--                @enderror--}}
{{--            </div>--}}
            <div class="form-group mt-3">
                <label for="img" class="text-white">Рисунок</label>
                <input type="file" class="form-control" id="img" name="img" accept="image/*"><br><br>
                @error('img')
                <small id="emailHelp" class="form-text text-danger">Загрузите рисунок</small>
                @enderror
            </div>

            <div class="row justify-content-center">
                <a class="btn btn-light col-4 p-2"
                   href="{{route('profile.publish')}}">Создать публикацию</a>
            </div>

        </form>
        </div>
    </section>

    <script src="https://cdn.tiny.cloud/1/o65lxpcmzh1b9m7amf72e0rvw485mdj8m5y6reaoe65r8z35/tinymce/5/tinymce.min.js"  referrerpolicy="origin"></script>
    <script src="{{asset('filemanager2/js/tinymce/tinymce.min.js')}}" ></script>
    <script>
        window.onload = function () {
            tinymce.init({
                height: 250,
                mode : "textareas",
                plugins: "link image code table",
                menubar: 'insert tools table',
                toolbar: 'bold italic underline | link | image code | copy aligncenter alignjustify alignleft alignnone alignright',
                image_caption: true,
                file_browser_callback_types: 'file image media',
                file_picker_callback: filemanager.tinyMceCallback,
            });
        };
    </script>
@endsection
