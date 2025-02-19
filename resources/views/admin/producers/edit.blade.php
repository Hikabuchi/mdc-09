@extends('theme')
@section('title', 'Редактирование страны')
@section('content')
    <div class="d-flex">
        @include('admin.admin_nav')
        <div class="container">
            <form action="/countries/{{$country->id}}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Название</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$country->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
