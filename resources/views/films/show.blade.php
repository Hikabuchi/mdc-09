@extends('theme')
@section('title', 'Фильм')
@section('content')
    <div class="container">
        <div class="row d-flex">
            <div class="col-7 flex-md-equal">
                <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">{{$film ->title}}</h2>
                    </div>
                    <img class="img-fluid min-vh-100" src="{{Storage::url($film ->image)}}" alt="">
                </div>
            </div>
            <div class="col-5 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
                <div class="my-3 p-3">
                    <h3 class="fs-2 text-body-emphasis">Описание:</h3>
                    <p>{{$film ->description}}</p>
                    <div class="d-flex justify-content-between">
                        <h4>Год:</h4>
                        <a href="/filter?year[]={{$film ->year}}"><p>{{$film ->year}}</p></a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Страна:</h4>
                        <a href="/filter?country[]={{$film ->country->id}}"><p>{{$film ->country->name}}</p></a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Режиссёр:</h4>
                        <a href="/filter?producer={{$film ->producer->id}}"><p>{{$film ->producer->name}}</p></a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Жанры:</h4>
                        <p>@foreach($film->genres as $g)<a href="/filter?genre[]= {{$g->id}}"> {{$g->name}} @if(!$loop->last)/ @endif </a>@endforeach</p>
                    </div>
                </div>
            </div>
            <hr>
           <div class="row">
               @foreach($film->actors as $actor)
                       <div class="col-lg-4">
                           <div class="">
                               <a href="/{{$actor->image}}" data-lightbox="actors" data-title="{{$actor->name}}"><img src="{{Storage::url($actor->image)}}" alt=""></a>
                           </div>
                           <a href="/filter?actor={{$actor->id}}">
                               <h2 class="fw-normal">{{$actor->name}}</h2>
                           </a>
                           <p>{{$actor->pivot->role}}</p>
                       </div>

               @endforeach
           </div>

            <div class="row">
                @if($film->video != 'NULL')
                {!! $film ->video !!}
                @endif
            </div>
            @if(count($film->seasons))
                <div class="row d-flex">
                    <h3>Сезоны</h3>
                    @foreach($film->seasons as $season)
                            <div class="col-2 d-none d-lg-block">
                                <img class="img-fluid" src="{{$season ->image}}" alt="">
                            </div>
                            <div class="col-10 p-4 d-flex flex-column position-static ">
                                <h2 class="mb-0"><a href="/seasons/{{$season->id}}">Сезон: {{$season ->number}}</a> </h2>
                                <div class="mb-1 text-body-secondary">Описание: {{$season ->description}}</div>
                            </div>
                    @endforeach
                </div>
            @endif
        </div>
        <h2>Отзывы:</h2>
        @auth()
            <div class="">
                <form action="/review/create" method="post">
                    <input type="hidden" name="film_id" value="{{$film -> id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    @csrf
                    <label for="rate">Оценка</label><br>
                    <input type="range" name="rate" id="rate" max="5" min="1" step="1"><br>
                    <label for="text">Отзыв</label><br>
                    <textarea id="text" name="text"></textarea><br>
                    <input name="review" id="review" type="submit" class="btn btn-secondary" value="Оставить отзыв">
                </form>
            </div>
        @endauth

        @if($errors -> any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

            @foreach($film->reviews as $rev)
                @if($rev->status != 2)
                    <div class="col">
                        <div class="card  rounded-3 shadow-sm">
                            <div class="card-header py-3">{{$rev->user->name}}
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    {{$rev->rate}}
                                </p>
                                <p>{{\Carbon\Carbon::parse($rev->created_at)->format('d/m/y H:i')}}</p>
                            </div>
                            {{$rev->text}}

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
