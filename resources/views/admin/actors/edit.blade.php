@extends('theme')
@section('title', 'Личный кабинет админа')
@section('content')
    <div class="d-flex">
        @include('admin.admin_nav')
        <div class="container">
            <form action="/actors/{{$actor->id}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Имя и фамилия</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$actor->name}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Дата рождения</label>
                    <input type="date" class="form-control" name="year_of_birth" value="{{$actor->year_of_birth}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Фото</label> <br>
                    <img src="{{Storage::url($actor->image)}}" alt="" class="">
                    <input type="file"  class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
    </div>
@endsection
