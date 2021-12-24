<section id="categories" class="campanies">
    <div class="container">
        <div class="row text-center">
            <h1 class="fw-bold lead mb-3">Категории</h1>
            <div class="heading-line mb-5"></div>
        </div>
    </div>
    <!-- START THE CAMPANIES CONTENT  -->
    <div class="container">
        <div class="justify-content-center">
            @foreach($categories as $category)
            <div class="col-md-4 col-lg-2" style="float: left; margin: 10px;" >
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$category->name}}</h5>
                        <p class="card-text"><small>Количество фондов: {{$category->publications->count()}}</small></p>
                        <a href="{{route('category-publications',$category->id)}}" class="btn btn-primary">Посмотреть фонды</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div style="clear: both"></div>

        </div>
    </div>
</section>
