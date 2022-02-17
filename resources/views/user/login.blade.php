@extends('welcome')

@section('title-block')
    Авторизация
@endsection

@section('content')
    <div class="container">
        <div class="form">
            <h1 class="form-title">Авторизация</h1>
            <form method="POST">
                @csrf
                <div class="form-block">
                    <label for="login" class="form-label">Логин:</label>
                    <input type="text" name="login" class="form-control @error('login') is-invalid @enderror"  id="inputLogin" aria-describedby="inputLoginValidation">
                    @error('login')
                    <div id="inputLoginValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-block">
                    <label for="inputPassword" class="form-label">Пароль: </label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="inputPassword" aria-describedby="inputPasswordValidation">
                    @error('password')
                    <div id="inputPasswordValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn">Войти</button>
            </form>
        </div>
    </div>

@endsection
