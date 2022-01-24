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
{{--    <form action="{{route('answer.store')}}" method="post">--}}
{{--        @csrf--}}
{{--        <div class="form-group">--}}
{{--            <label for="txtTitle">--}}
{{--                Ответы--}}
{{--            </label>--}}
{{--            <input name="firstAnswer" id="txtTitle" class="form-control--}}
{{--@error('firstAnswer') is-invalid @enderror--}}
{{--                " value="{{ old('firstAnswer') }}">--}}
{{--            @error('firstAnswer')--}}
{{--            <span class="invalid-feedback">--}}
{{--                            <strong>{{$message}}</strong>--}}
{{--                        </span>--}}
{{--            @enderror--}}
{{--            <input name="secondAnswer" id="txtTitle" class="form-control--}}
{{--@error('secondAnswer') is-invalid @enderror--}}
{{--                " value="{{ old('secondAnswer') }}">--}}
{{--            @error('secondAnswer')--}}
{{--            <span class="invalid-feedback">--}}
{{--                            <strong>{{$message}}</strong>--}}
{{--                        </span>--}}
{{--            @enderror--}}
{{--            <input name="thirdAnswer" id="txtTitle" class="form-control--}}
{{--@error('thirdAnswer') is-invalid @enderror--}}
{{--                " value="{{ old('thirdAnswer') }}">--}}
{{--            @error('thirdAnswer')--}}
{{--            <span class="invalid-feedback">--}}
{{--                            <strong>{{$message}}</strong>--}}
{{--                        </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--        <input type="submit" class="btn btn-primary" value="Добавить">--}}
{{--    </form>--}}
@endsection
