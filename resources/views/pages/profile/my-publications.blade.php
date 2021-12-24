<section id="categories" class="campanies">
    <div class="container mt-5">
        <div class="row text-center">
            <h1 class="fw-bold lead mb-3">Мои фонды</h1>
            <div class="heading-line mb-5"></div>
        </div>
    </div>
    <!-- START THE CAMPANIES CONTENT  -->
    <div class="container">
        <div class="row justify-content-evenly">
            @foreach($publications as $publication)
            <div class="col-md-4 col-lg-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-center">{{$publication->title}}</h5>
{{--                        <h7 class="card-title">{{$publication->category}}</h7><br><br>--}}
                        <figure class="card">
                            @foreach($publication->images as $image)
                                <img src="{{asset("storage/".$image->path)}}" alt="рисунок">
                            @endforeach
                        </figure>
                        <p class="card-text">{{$publication->description}}</p>
                        <p class="card-text">Сколько требуется : <b>{{$publication->amount_needed}} тг</b></p>
                        <p class="card-text">Дата начало: <b>{{$publication->start_date}}</b></p>
                        <p class="card-text">Дата окончание: <b>{{$publication->end_date}}</b></p>
{{--                        <p><small>Осталось : {{$publication->leftDays}} дней</small></p>--}}
                        <a href="{{route('profile.get-publication',$publication->id)}}" class="btn btn-primary">Детально</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
