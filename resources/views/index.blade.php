@extends('theme')
@section('title', 'Главная')
@section('content')
    @include('filter_nav')
        <div class="container my-4">
            <h1>Фильмы онлайн бесплатно без регистрации и СМС</h1>
            <div class="row mb-2">
                @if(count($films))
                    @foreach($films as $film)
                        <div class="col-md-5">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col-4 d-none d-lg-block">
                                    <img class="img-fluid" src="{{Storage::url($film ->image)}}" alt="">
                                </div>
                                <div class="col-8 p-4 d-flex flex-column position-static">
                                    <h3 class="mb-0"><a href="/films/{{$film->id}}">{{$film ->title}}</a> ({{$film ->year}}год)</h3>
                                    <div class="mb-1 text-body-secondary">Жанры: @foreach($film->genres as $g) {{$g->name}} @if(!$loop->last)/ @endif @endforeach</div>
                                    <div class="mb-1 text-body-secondary">Режисер: {{$film ->producer->name}}</div>
                                    <div class="mb-1 text-body-secondary">Страна: {{$film ->country->name}}</div>
                                    <div class="mb-1 text-body-secondary">Описание: {{mb_substr($film ->description, 0, 50) }}...</div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <h2>Фильмы по вашему запросу не найдены</h2>
                @endif
            </div>

        </div>
    </div>

@endsection


