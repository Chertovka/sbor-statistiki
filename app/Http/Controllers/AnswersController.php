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

    }
}
