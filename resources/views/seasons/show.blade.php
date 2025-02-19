@extends('theme')
@section('title', 'Сезон')
@section('content')
    <div class="container">
        <div class="row d-flex">
            <div class="col-7 flex-md-equal">
                <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">{{$season->film->title}} Сезон {{$season ->number}}</h2>
                    </div>
                    <img class="img-fluid min-vh-100" src="{{$season ->image}}" alt="">
                </div>
            </div>
            <div class="col-5 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
                <div class="my-3 p-3">
                    <h3 class="fs-2 text-body-emphasis">Описание:</h3>
                    <p>{{$season ->description}}</p>
                    <div class="d-flex justify-content-between">
                        <h4>Год:</h4>
                        <p>{{$season->film ->year}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Страна:</h4>
                        <p>{{$season->film ->country->name}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Режиссёр:</h4>
                        <p>{{$season->film ->producer->name}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Жанры:</h4>
                        <p>@foreach($season->film->genres as $g) {{$g->name}} @if(!$loop->last)/ @endif @endforeach</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <select id="series" class="mb-2 form-select w-25">
                    @foreach($season->series as $serie)
                        <option value="{{$serie->id}}">Серия: {{$serie->number}}: {{$serie->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row" id="player">{!! $season->series[0]->video !!}</div>
            <h4>Сезон: {{$season->number}} Серия <span id="serie_num">{{$season->series[0]->number}} "{{$season->series[0]->title}}"</span></h4>
        </div>
    </div>
@endsection
