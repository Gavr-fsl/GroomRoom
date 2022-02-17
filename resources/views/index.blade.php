@extends('welcome')

@section('title-block')
    Главная
@endsection

@section('content')
    <div class="hero-image">
        <div class="hero-text">
            <h1 class="hero-title">ГрумRoom</h1>
        </div>
    </div>
    <div class="container">
        <div class="counter">
            <p>Счётчик ваших заявок</p>
            <p>{{$count}}</p>
        </div>
    </div>
@endsection
