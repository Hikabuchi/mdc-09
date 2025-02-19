@extends('theme')
@section('title', 'Регистрация')
@section('content')
    <div class="container d-flex justify-content-center">
        <form class="col-4 py-5" method="POST" action="/registration">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Регистрация</h1>
            @if($errors -> any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <div class="form-floating pb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="example0000">
                <label for="floatingInput">Login</label>
            </div>
            <div class="form-floating pb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating pb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-floating pb-3">
                <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check text-start my-3 pb-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Запомнить меня
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Зарегестрироваться</button>
            <p class="mt-5 mb-3 text-body-secondary">Уже есть аккаунт? <a href="">Авторизоваться</a></p>
        </form>
    </div>
@endsection
