@extends('theme')
@section('title', 'Добавить страну')
@section('content')
    <div class="d-flex">
        @include('admin.admin_nav')
        <div class="container">
            <form action="{{route('producers.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Название</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
