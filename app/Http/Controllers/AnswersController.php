<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswersController extends Controller
{

    public function index()
    {
        $context = ['answers' => Answer::latest()->get()];
        return view('index', $context);
//        $answers = Answer::latest()->get();
//        $mes = "Ответ 1 \r\n";
//        foreach ($answers as $answer) {
//            $mes .= $answer->firstAnswer . "\r\n";
//            $mes .= $answer->secondAnswer . "\r\n";
//            $mes .= $answer->thirdAnswer . "\r\n";
//            $mes .= "\r\n";
//        }
//        return response($mes)->header('Content-Type', 'text/plain');

    }
}
