@extends('layouts.general')

@section('title')
    CrowdFunding.kz
@endsection

@section('content')
    <section id="categories" class="campanies" style="padding-top: 40px">
        <div class="container mt-5">
            <div class="row text-center">
                <h1 class="fw-bold lead mb-3">Поддержать фонд : {{$fund->title}}</h1>
                <div class="heading-line mb-5"></div>
            </div>
        </div>
        <!-- START THE CAMPANIES CONTENT  -->
        <div class="container">
            <div class="row justify-content-evenly">
                Form for payment by MasterCard, Visa ...
            </div>
        </div>
    </section>

@endsection
