@extends('theme')
@section('title', 'Добавить фильм')
@section('content')
    <div class="d-flex">
        @include('admin.admin_nav')
        <div class="container">
            <form action="{{route('films.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Название</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Год</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="year">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Описание</label><br>
                    <textarea name="description" id="" cols="60" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Продюссер</label><br>
                    <select name="producers" id="">
                    <option value="producer">Выбрать режиссёра</option>
                    @foreach($producers as $producer)
                        <option value="{{$producer->id}}">{{$producer->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Страна</label><br>
                    <select name="countries" id="">
                        <option value="">Выбрать страну</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Жанры</label><br>
                    <select multiple name="genres[]" id="genre" class="sel2 col-12">
                        <option value="">Выбрать жанры</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 aroles">
                    <label for="exampleInputEmail1" class="form-label">Актеры</label><br>
                    <div class="arole">
                        <select name="actors[]" id="actor">
                            <option value="">Выбрать актера</option>
                            @foreach($actors as $actor)
                                <option value="{{$actor->id}}">{{$actor->name}}</option>
                            @endforeach
                        </select>
                        <label for="role" class="form-label">В роли </label>
                        <input type="text" name="role[]" id="role">
                        <input type="button" value="-" class="del-role-create ">
                    </div>
                </div>
                <input type="button" value="+" class="clonerole">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Фото</label>
                    <input type="file"  class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ссылка на плеер</label><br>
                    <textarea name="video" id="" cols="60" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
    </div>

@endsection
