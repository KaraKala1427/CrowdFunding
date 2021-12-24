@extends('layouts.general')

@section('title')
    CrowdFunding.kz
@endsection

@section('content')
    <section class="publish-section">
        <div class="container">
            <div class="row text-center text-white">
                <h1 class="display-3 fw-bold">Создание фонда</h1>
                {{--            <hr style="width: 100px; height: 3px; " class="mx-auto">--}}
            </div>
            <div class="publish_form" style="width: 500px; margin: auto">
                <form action="{{route('profile.update-publication', $publication->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="category_id" class="text-white">Категория</label>
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="">---</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == ($publication->category_id ?? '') ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="title" class="text-white">Название стартапа</label>
                        <input type="text" id="title" name="title"  value="{{$publication->title}}" class="form-control" placeholder="Введите название">
                    </div>
                    <div class="form-group mt-3">
                        <label for="description" class="text-white">Описание</label>
                        <textarea name="description" id="description"  class="form-control"
                                  placeholder="Описание">{{$publication->description}}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="amount_needed" class="text-white">Сколько требуется накопить ?</label>
                        <input type="number" id="amount_needed" name="amount_needed" value="{{$publication->amount_needed}}" class="form-control" placeholder="Введите сумму (в тенге)">
                    </div>
                    <div class="form-group mt-3">
                        <label for="start_date" class="text-white">Дата начало</label>
                        <input type="date" id="start_date" value="{{$publication->start_date}}" name="start_date" class="form-control" placeholder="Введите дата начало">
                    </div>
                    <div class="form-group mt-3">
                        <label for="end_date" class="text-white">Дата окончание</label>
                        <input type="date" id="end_date" value="{{$publication->end_date}}" name="end_date" class="form-control" placeholder="Введите дата окончание">
                    </div>
                    <div class="form-group mt-3">
                        <label for="img" class="text-white">Рисунок</label>
                        <input type="file" class="form-control" id="img" name="img" accept="image/*" ><br><br>
                        @error('img')
                        <small id="emailHelp" class="form-text text-danger">Загрузите рисунок</small>
                        @enderror
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-light">Сохранить</button>
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
