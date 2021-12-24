@extends('layouts.general')

@section('title')
    CrowdFunding.kz
@endsection

@section('content')
    <section id="categories" class="campanies" style="padding-top: 40px">
        <div class="container mt-5">
            <div class="row text-center">
                <h1 class="fw-bold lead mb-3">Фонды категории : {{$categoryName}}</h1>
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
                                <p><small>Осталось : {{$publication->leftDays}} дней</small></p>
                                <a href="{{route('profile.get-publication',$publication->id)}}" class="btn btn-warning">Детально</a>
                                <a href="{{ route('payment', $publication->id) }}"><button class="btn btn-primary">Поддержать</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
