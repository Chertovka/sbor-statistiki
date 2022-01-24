@extends('layouts.base')

@section('title', 'Опросник')

@section('main')
    <h2>Добро пожаловать, {{Auth::user()->name}}!</h2>
    <p class="text-right"><a href="{{route('question.add')}}">Добавить вопрос</a></p>

    @if ($questions ?? '')
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Вопрос</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td><h3>{{$question->question}}</h3></td>
                    <td>
                        <a href="{{route('question.edit', ['question'=>$question->id])}}">Изменить</a>
                    </td>
                    <td>
                        <a href="{{route('question.delete', ['question'=>$question->id])}}">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

{{--    <p class="text-right"><a href="{{route('answer.add')}}">Добавить ответы</a></p>--}}

{{--    @if ($answers ?? '')--}}
{{--        <table class="table table-striped">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Ответ 1 </th>--}}
{{--                <th>Ответ 2 </th>--}}
{{--                <th>Ответ 3 </th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach ($answers as $answer)--}}
{{--                <tr>--}}
{{--                    <td><h3>{{$answer->answer}}</h3></td>--}}
{{--                    <td>--}}
{{--                        <a href="{{route('answer.edit', ['answer'=>$answer->id])}}">Изменить</a>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <a href="{{route('answer.delete', ['question'=>$answer->id])}}">Удалить</a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    @endif--}}
@endsection
