<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private const QUESTION_VALIDATOR = [
        'question' => 'required'
    ];


    private const QUESTION_ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длиннее :max символов',
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['questions' => Auth::user()->questions()->latest()->get()]);
    }

    public function showAddQuestionForm()
    {
        return view('question_add');
    }


    public function storeQuestion (Request $request)
    {
        $validated = $request->validate(
            self::QUESTION_VALIDATOR,
            self::QUESTION_ERROR_MESSAGES
        );
        Auth::user()->questions()->create(
            [
               'question' => $validated['question'],
            ]
        );
        return redirect()->route('home');
    }

    public function showEditQuestionForm(Question $question)
    {
        return view('question_edit', ['question' => $question]);
    }


    public function updateQuestion (Request $request, Question $question)
    {
        $validated = $request->validate(
            self::QUESTION_VALIDATOR,
            self::QUESTION_ERROR_MESSAGES
        );
        $question->fill([
            'question' => $validated['question'],
        ]);
        $question->save();
        return redirect()->route('home');
    }

    public function showDeleteQuestionForm(Question $question) {
        return view('question_delete', ['question'=>$question]);
    }


    public function destroyQuestion(Question $question) {
        $question->delete();
        return redirect()->route('home');
    }

}
