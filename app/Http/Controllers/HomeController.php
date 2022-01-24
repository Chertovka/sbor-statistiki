<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
//    private const ANSWER_VALIDATOR = [
//        'firstAnswer' => 'required',
//        'secondAnswer' => 'required',
//        'thirdAnswer' => 'required'
//    ];

    private const QUESTION_VALIDATOR = [
        'question' => 'required'
    ];


//    private const ANSWER_ERROR_MESSAGES = [
//        'required' => 'Заполните это поле',
//        'max' => 'Значение не должно быть длиннее :max символов',
//    ];

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

// public function showAddAnswerForm()
//    {
//        return view('answer_add');
//    }

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
//    public function storeAnswer (Request $request)
//    {
//        $validated = $request->validate(
//            self::ANSWER_VALIDATOR,
//            self::ANSWER_ERROR_MESSAGES
//        );
//        Auth::user()->answers()->create(
//            [
//
//                'firstAnswer' => $validated['firstAnswer'],
//                'secondAnswer' => $validated['secondAnswer'],
//                'thirdAnswer' => $validated['thirdAnswer'],
//            ]
//        );
//               return redirect()->route('home');
//    }

    public function showEditQuestionForm(Question $question)
    {
        return view('question_edit', ['question' => $question]);
    }

//    public function showEditAnswerForm(Answer $answer)
//    {
//        return view('answer_edit', ['answer' => $answer]);
//    }

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
//    public function updateAnswer(Request $request, Answer $answer)
//    {
//        $validated = $request->validate(
//            self::ANSWER_VALIDATOR,
//            self::ANSWER_ERROR_MESSAGES
//        );
//        $answer->fill([
//            'firstAnswer' => $validated['firstAnswer'],
//            'secodAnswer' => $validated['secondAnswer'],
//            'thirdAnswer' => $validated['thirdAnswer']
//        ]);
//        $answer->save();
//        return redirect()->route('home');
//    }

    public function showDeleteQuestionForm(Question $question) {
        return view('question_delete', ['question'=>$question]);
    }

//    public function showDeleteAnswerForm(Answer $answer) {
//        return view('answer_delete', ['answer'=>$answer]);
//    }

    public function destroyQuestion(Question $question) {
        $question->delete();
        return redirect()->route('home');
    }

//    public function destroyAnswer(Answer $answer) {
//        $answer->delete();
//        return redirect()->route('home');
//    }

}
