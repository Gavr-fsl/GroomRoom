@extends('welcome')

@section('title-block')
    Создание заявки
@endsection

@section('content')
    <div class="container">
        <div class="form">
            <h1 class="form-title">Создайте заявку</h1>
            @if(session()->has('success'))
                <div class="alert-success">Заявка успешно отправлена</div>
            @endif
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-block">
                    <label for="inputNickname" class="form-label">Кличка домашнего животного: </label>
                    <input type="text" name="nickname" class="form-control @error('nickname') is-invalid @enderror" id="inputNickname" aria-describedby="inputNicknameValidation">
                    @error('nickname')
                    <div id="inputNicknameValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-block">
                    <label for="inputDescription" class="form-label">Описание: </label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="inputDescription" aria-describedby="inputDescriptionValidation" rows="3"></textarea>
                    @error('description')
                    <div id="inputDescriptionValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-block">
                    <label for="inputCategory" class="form-label">Категория заявки: </label>
                    <select name="category_id" id="inputCategory" class="form-control form-select @error('category_id') is-invalid @enderror" aria-describedby="inputCategoryValidation">
                        <option selected disabled>Выберите категорию</option>
                        @foreach($categories as $сategory)
                            <option value="{{$сategory->id}}">{{$сategory->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div id="inputCategoryValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-block">
                    <label for="inputPhoto" class="form-label">Фото:</label>
                    <input type="file" class="form-file" id="inputPhoto" name="photo" accept="image/*">
                    @error('photo')
                    <div id="inputPhotoValidation" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="status" value="{{"Новая"}}">

                <button type="submit" class="btn">Отправить заявку</button>
            </form>
        </div>
    </div>
@endsection
