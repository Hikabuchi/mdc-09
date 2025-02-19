@extends('theme')
@section('title', 'Поиск')
@section('content')
    @include('filter_nav')
    <div class="container my-4">
        <h1>Поиск "{{$text}}"</h1>
        <div class="row mb-2">
            @foreach($film as $f)
                <div class="col-md-5">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-4 d-none d-lg-block">
                            <img class="img-fluid" src="{{$f ->image}}" alt="">
                        </div>
                        <div class="col-8 p-4 d-flex flex-column position-static">
                            <h3 class="mb-0"><a href="/films/{{$f->id}}">{{$f ->title}}</a> ({{$f ->year}}год)</h3>
                            <div class="mb-1 text-body-secondary">Жанры: @foreach($f->genres as $g) {{$g->name}} @if(!$loop->last)/ @endif @endforeach</div>
                            <div class="mb-1 text-body-secondary">Режисер: {{$f ->producer->name}}</div>
                            <div class="mb-1 text-body-secondary">Страна: {{$f ->country->name}}</div>
                            <div class="mb-1 text-body-secondary">Описание: {{mb_substr($f ->description, 0, 50) }}...</div>
                        </div>

                    </div>
                </div>@endforeach

        </div>

    </div>
</div>
@endsection
