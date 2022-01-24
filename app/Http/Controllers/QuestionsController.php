<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index() {
//        $context = ['questions' => Question::latest()->get()];
//        return view('index', $context);
        $questions = ['questions' => Question::latest()->get()];
        $mes = "Вопрос 1 \r\n";
        foreach($questions as $question) {
            $mes .= $question->question . "\r\n";
            $mes .= "\r\n";
        }
        return response($mes)->header('Content-Type', 'text/plain');
    }
}
