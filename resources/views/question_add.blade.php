@extends('layouts.base')

@section('question', 'Добавление вопроса и ответов:: Вопросы и ответы')

@section('main')
    <form action="{{route('question.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="txtTitle">
                Вопрос
            </label>
            <input name="question" id="txtTitle" class="form-control @error('question') is-invalid @enderror" value="{{ old('question') }}">
            @error('question')
            <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
            @enderror
                </div>
                <input type=" submit" class="btn btn-primary" value="Добавить">
    </form>
@endsection
