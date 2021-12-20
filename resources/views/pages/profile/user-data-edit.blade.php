<section id="home" class="intro-section">
    <div class="container">
        <div class="main-body">

            <form action="{{route('profile.update-post')}}" method="post" class="row gutters-sm" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{asset('storage/'.$imagePath)}}" type="file" alt="profile_image"
                                     class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <input type="file" id="img" name="img" accept="image/*" class="btn btn-primary" placeholder="Загрузите фото"/>
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
                                    <input type="text" name="full_name" value="{{$data->full_name}}"/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Почта</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email" value="{{$data->email}}"/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Позиция</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="position" value="{{$data->position}}"/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Моб.номер</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone_number" value="{{$data->phone_number}}"/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Адресс</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address" value="{{$data->address}}"/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


</section>
