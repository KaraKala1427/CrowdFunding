@extends('layouts.general')

@section('title')
    CrowdFunding.kz
@endsection

@section('content')
    <div class="alert alert-info" style="width: 500px; margin: auto; margin-top: 100px; margin-bottom: 50px">
        <h1>{{ $publication->title}}</h1>
        <p>Фонд : {{$publication->user->full_name}} </p>
        <p>Категория: <small>{{ $publication->category->name}}</small></p>
        <figure class="awards__image">
            @foreach($publication->images as $image)
                <img src="{{asset("storage/".$image->path)}}" alt="рисунок" width="100%">
{{--                <img src="{{$publication->img_path}}" width="100%">--}}
            @endforeach
        </figure>
        <p>{{  $publication->description}}</p>
        <p><strong>{{ $publication->amount_needed}} тг</strong></p>
        <p><small>Осталось : {{$leftDays}} дней</small></p>
        @if($profile->id == $publication->user_id)
            <a href="{{ route('profile.get-publication-edit', $publication->id) }}"><button class="btn btn-primary">Edit</button></a>
            <a href="{{ route('profile.delete-publication', $publication->id) }}"><button class="btn btn-danger">Delete</button></a>
        @else
            <a href="{{ route('payment', $publication->id) }}"><button class="btn btn-primary">Поддержать</button></a>
        @endif
    </div>
@endsection
