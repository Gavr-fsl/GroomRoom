@extends('welcome')

@section('title-block')
    Регистрация
@endsection

@section('content')
    <div class="container">
        <div class="form">
            <h1 class="form-title">Регистрация</h1>
            @if(session()->has('success'))
                <div class="alert-success">Регистрация прошла успешно</div>
            @endif
            <form method="POST">
                @csrf
                <div class="form-block">
                    <label for="fullname" class="form-label">ФИО:</label>
                    <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror"  id="inputFullname" aria-describedby="inputFullnameValidation">
                    @error('fullname')
                    <div id="inputNameValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-block">
                    <label for="login" class="form-label">Логин:</label>
                    <input type="text" name="login" class="form-control @error('login') is-invalid @enderror"  id="inputLogin" aria-describedby="inputLoginValidation">
                    @error('login')
                    <div id="inputLoginValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-block">
                    <label for="email" class="form-label">Почта:</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"  id="inputEmail" aria-describedby="inputEmailValidation">
                    @error('email')
                    <div id="inputEmailValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-block">
                    <label for="inputPassword" class="form-label">Пароль: </label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="inputPassword" aria-describedby="inputPasswordValidation">
                    @error('password')
                    <div id="inputPasswordValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-block">
                    <label for="inputConfirmation" class="form-label">Подтверждение пароля: </label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"  id="inputConfirmation">
                    @error('password_confirmation')
                    <div id="inputConfirmationValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-block">
                    <div class="form-checkbox">
                        <input type="checkbox" name="checkbox" class="checkbox" aria-describedby="checkboxValidation">
                        <label for="checkbox">Согласие на обработку персональных данных</label>
                    </div>
                    @error('checkbox')
                    <div id="checkboxValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn" style="margin-top: 10px">Зарегистрироваться</button>
            </form>
        </div>
    </div>


@endsection
