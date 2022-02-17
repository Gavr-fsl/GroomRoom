@extends('welcome')

@section('title-block')
    Аккаунт администратора
@endsection

@section('content')
    <div class="container">
        <h1 class="content-title">Личный кабинет администратора</h1>
        <h2>Заявки пользователей</h2>
        @forelse($applications as $application)
            <div class="card">
                <div class="card-header">
                    ID заявки: {{$application->id}}
                </div>
                <img src="../public/storage/{{ $application->photo }}" alt="Картинка поста" class="card-img-top" >
                <div class="card-body">
                    <p class="card-title">{{$application->nickname}}</p>
                    <p class="card-subtitle text-muted">{{$application->name}}</p>
                    <p class="card-text">{{$application->description}}</p>

                </div>
                <div class="card-footer">
                    <p class="text-muted">Статус заявки: {{$application->status}}</p>
                    <form action="" method="GET">
                        @csrf
                        <input type="hidden" name="id" value="{{ $application->id }}">
                        <button type="submit" class="link">Изменить статус заявки</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="alert">Заявки пользователей отсутствуют</div>
        @endforelse
    </div>
@endsection
