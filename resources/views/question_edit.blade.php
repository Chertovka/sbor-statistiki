@section('title', 'Правка вопроса и ответов:: Вопросы и ответы')

@section('main')
    <form action="{{route('question.update', ['question'=>$question->id])}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="txtTitle">
                Вопрос
            </label>
            <input name="question" id="txtTitle" class="form-control"
                   value="{{$question->question}}">
        </div>
        <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
    <form action="{{route('answer.update', ['answer'=>$answer->id])}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="txtTitle">
                Ответы
            </label>
            <input name="firstAnswer" id="txtTitle" class="form-control @error('firstAnswer') is-invalid @enderror" value="{{ old('firstAnswer', $firstAnswer->firstAnswer) }}">
            @error('firstAnswer')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <input name="secondAnswer" id="txtTitle" class="form-control @error('secondAnswer') is-invalid @enderror" value="{{ old('secondAnswer', $secondAnswer->secondAnswer) }}">
            @error('secondAnswer')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <input name="thirdAnswer" id="txtTitle" class="form-control @error('thirdAnswer') is-invalid @enderror" value="{{ old('thirdAnswer', $thirdAnswer->thirdAnswer) }}">
            @error('thirdAnswer')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
@endsection
