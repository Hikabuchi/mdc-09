@extends('theme')
@section('title', 'Личный кабинет')
@section('content')
    <div class="d-flex">
        @include('admin.admin_nav')
        <div class="container">
            <form action="{{route('actors.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Имя и фамилия</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Дата рождения</label>
                    <input type="date" class="form-control" name="year_of_birth">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Фото</label>
                    <input type="file"  class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
    </div>

@endsection
