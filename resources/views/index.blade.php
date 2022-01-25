@extends('layouts.base')

@section('title', 'Главная')

@section('main')
    @if($questions ?? '')
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Вопросы</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td><h3>{{$question->question}}</h3></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection('main')
