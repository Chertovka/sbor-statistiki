<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//
//Route::get('/home/add', [HomeController::class, 'showAddQuestionForm'])->name('question.add');
//Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/question', [QuestionsController::class, 'index']);
//Route::get('/answers', [AnswersController::class, 'index']);
//
Route::get('/question', [QuestionsController::class, 'index'])->name('index');
//Route::get('/answer', [AnswersController::class, 'index'])->name('index');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/add/', [HomeController::class, 'showAddQuestionForm'])->name('question.add');
//Route::post('/home', [HomeController::class, 'storeQuestion'])->name('question.store');
//Route::get('/home/addanswer', [HomeController::class, 'showAddAnswerForm'])->name('answer.add');
//Route::post('/homeanswer', [HomeController::class, 'storeAnswer'])->name('answer.store');

Route::get('home/{question}/editquestion', [HomeController::class, 'showEditQuestionForm'])->name('question.edit');
//Route::get('home/{answer}/edit', [HomeController::class, 'showEditAnswerForm'])->name('answer.edit');
Route::patch('home/{question}', [HomeController::class, 'updateQuestion'])->name('question.update');
//Route::patch('home/{answer}', [HomeController::class, 'updateAnswer'])->name('answer.update');
Route::get('home/{question}/delete', [HomeController::class, 'showDeleteQuestionForm'])->name('question.delete');
//Route::get('home/{answer}/delete', [HomeController::class, 'showDeleteAnswerForm'])->name('answer.delete');
Route::delete('home/{question}', [HomeController::class, 'destroyQuestion'])->name('question.destroy');
//Route::delete('home/{answer}', [HomeController::class, 'destroyAnswer'])->name('answer.destroy');
//Route::get('/{bb}', [BbsController::class, 'detail'])->name('detail');
