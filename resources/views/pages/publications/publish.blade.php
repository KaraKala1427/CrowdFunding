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
            <div class="publish_form" style="width: 500px; margin: auto">
                <form action="{{route('profile.publish-create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="category" class="text-white">Категория</label>
                        <select id="category" name="category" class="form-control">
                            <option value="">---</option>
                            <option value="">eCommerce</option>
                            <option value="">Образовательные стартап</option>
                            <option value="">FinTech</option>
                            <option value="">Игры</option>
                            <option value="">Аппаратное и программное обеспечение</option>
                            <option value="">Социальные сети</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="name" class="text-white">Название стартапа</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Введите название">
                    </div>
                    <div class="form-group mt-3">
                        <label for="description" class="text-white">Описание</label>
                        <textarea name="description" id="description" class="form-control"
                                  placeholder="Описание"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="img" class="text-white">Рисунок</label>
                        <input type="file" class="form-control" id="img" name="img" accept="image/*" multiple><br><br>
                        @error('img')
                        <small id="emailHelp" class="form-text text-danger">Загрузите рисунок</small>
                        @enderror
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-light">Создать публикацию</button>
                    </div>
{{--                    <button type="submit" class="row justify-content-center">--}}
{{--                        --}}
{{--                        <a class="btn btn-light col-4 p-2">Создать публикацию</a>--}}
{{--                    </button>--}}

                    <div>
                        <br>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
