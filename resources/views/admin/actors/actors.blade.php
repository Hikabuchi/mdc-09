@extends('theme')
@section('title', 'Актеры')
@section('content')
    <div class="d-flex">
        @include('admin.admin_nav')
        <div class="container">
            <h1>Админ панель для {{Auth::user()->name}}</h1>
            <a href="actors/create">Добавить актера</a>
            <div class="bd-example m-0 border-0">
                <div class="my-5">
                    <div class="row text-center">
                        <div class="col-3 border">ФИО</div>
                        <div class="col-1 border">Дата рождения</div>
                        <div class="col-5 border">Фото</div>
                        <div class="col-3 border">Действие</div>
                    </div>
                    @foreach($actors as $actor)
                    <div class="row text-center">
                        <div class="col-3 border">{{$actor -> name}}</div>
                        <div class="col-1 border">{{$actor -> year_of_birth}}</div>
                        <div class="col-5 border">{{$actor -> image}}</div>
                        <div class="col-3 border d-flex">
                            <a href="/actors/{{$actor -> id}}/edit/" class="btn btn-primary">Редактировать</a>
                            <form action="{{route('actors.destroy',$actor->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$actor->id}}">
                                <button type="submit" class="del btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection
