@extends('theme')
@section('title', 'Личный кабинет')
@section('content')
    <div class="d-flex">
        @include('admin.admin_nav')
        <div class="container">
            <div class="row">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Имя</th>
                        <th scope="col">Текст</th>
                        <th scope="col">Статус</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($reviews as $r)
                        @if($r->status != 2 && $r->status != 1)
                        <tr>
                            <td>{{$r->user->name}}</td>
                            <td>{{$r->text}}</td>
                            <td>
                                <a href="/reviews/moder/{{$r->id}}/1" class="btn btn-primary">V</a>
                                <a href="/reviews/moder/{{$r->id}}/2" class="btn btn-danger">X</a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
