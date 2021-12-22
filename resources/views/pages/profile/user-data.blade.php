<section id="home" class="intro-section">
    <div class="container ">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img @if($imagePath != '')src="{{asset("storage/".$imagePath)}}"@endif alt="profile image"
                                     class="rounded-circle" width="150">
                                <div class="mt-3">
{{--                                    <button class="btn btn-primary">Загрузить фото</button>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ФИО</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$profile->full_name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Почта</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$profile->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Позиция</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$profile->position}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Моб.номер</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$profile->phone_number}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Адресс</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$profile->address}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-primary"
                                       href="{{ route('profile.edit') }}">Редактировать</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <a class="btn btn-outline-light col-4 p-2"
                   href="{{route('profile.publish')}}">Создать фонд</a>
            </div>
        </div>
    </div>


</section>
