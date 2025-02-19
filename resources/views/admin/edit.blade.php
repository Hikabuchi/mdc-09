@extends('theme')
@section('title', 'Добавить фильм')
@section('content')
    <div class="d-flex">
        @include('admin.admin_nav')
        <div class="container">
            <form action="/films/{{$film->id}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Название</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{$film->title}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Год</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="year" value="{{$film->year}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Описание</label><br>
                    <textarea name="description" id="" cols="60" rows="10">{{$film->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Продюссер</label><br>
                    <select name="producer" id="">
                        <option value="producer">Выбрать режиссёра</option>
                        @foreach($producers as $producer)
                            <option value="{{$producer->id}}" @if($film->producer->id == $producer->id) selected @endif>{{$producer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Страна</label><br>
                    <select name="country" id="">
                        <option value="">Выбрать страну</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}" @if($film->country->id == $country->id) selected @endif>{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Жанры</label><br>
                    <select multiple name="genres[]" id="genre" class="sel2 col-12">
                        <option value="">Выбрать жанры</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}" @if($film->genres->contains('id', $genre->id)) selected @endif>{{$genre->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 aroles">
                    <label for="exampleInputEmail1" class="form-label">Актеры</label><br>
                    @foreach($film->actors as $a)
                    <div class="arole">
                        <select name="actors[]" id="actor">
                            <option value="">Выбрать актера</option>
                            @foreach($actors as $actor)
                                <option value="{{$actor->id}}" @if($a->id == $actor->id) selected @endif>{{$actor->name}}</option>
                            @endforeach
                        </select>
                        <label for="role" class="form-label">В роли </label>
                        <input type="text" name="role[]" id="role" value="{{$a->pivot->role}}">
                        <input type="button" value="-" class="del-role">
                    </div>
                    @endforeach
                </div>
                <input type="button" value="+" class="clonerole">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Фото</label> <br>
                    <img src="{{Storage::url($film->image)}}" alt="" class="">
                    <input type="file"  class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ссылка на плеер</label><br>
                    <textarea name="video" id="" cols="60" rows="10">{{$film->video}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
    </div>

@endsection

