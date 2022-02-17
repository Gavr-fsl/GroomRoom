@extends('welcome')

@section('title-block')
    Категории
@endsection

@section('content')
    <div class="container">
        <h2 class="content-title">Добавить категорию</h2>
        <div class="category-add">
            @if(session()->has('success'))
                <div class="alert-success">Категория добавлена</div>
            @endif
            <form method="POST">
                @csrf
                <div class="form-block">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  id="inputName" aria-describedby="inputNameValidation" placeholder="Добавить категорию">
                    @error('name')
                    <div id="inputNameValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn" >Добавить</button>
            </form>
        </div>
        <h2>Список категорий</h2>
        <div class="category-list">
            <table class="table">
                <thead>
                <tr>
                    <th>Начвание категории</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>-</td>
                    </tr>
                @empty
                    <tr>
                        <td class="invalid-feedback">Категории отсутствуют</td>
                        <td></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
