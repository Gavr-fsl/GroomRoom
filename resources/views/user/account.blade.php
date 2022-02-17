@extends('welcome')

@section('title-block')
    Аккаунт
@endsection

@section('content')
    <div class="container">
        <h1 class="content-title">Личный кабинет</h1>
        <h2>Ваши заявки</h2>
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
                    <form action="{{ route('delete', ['id' => $application->id]) }}" method="GET">
                        @csrf
                        <input type="hidden" name="id" value="{{ $application->id }}">
                        <button type="submit" class="link-danger" data-operation="delete" data-confirm="true" data-id="{{ $application->id }}">Удалить</button>
                    </form>
                </div>
            </div>

        @empty
            <div class="alert">У вас отсутствуют заявки =>  <a href="{{route('application.create')}}" class="link"> Создать заявку</a></div>
        @endforelse
    </div>
@endsection
