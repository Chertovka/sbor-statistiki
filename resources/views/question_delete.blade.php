

@section('title', 'Удаление вопроса или ответов :: Вопросы и ответы')

@section('main')
    <h2>{{$question->question}}</h2>
    <p>Автор: {{$question->user->name}}</p>
    <form action="{{route('question.destroy', ['question'=>$question->id])}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Удалить">
    </form>
@endsection('main')
