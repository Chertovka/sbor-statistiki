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


Route::get('/question', [QuestionsController::class, 'index'])->name('index');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/add/', [HomeController::class, 'showAddQuestionForm'])->name('question.add');

Route::get('home/{question}/editquestion', [HomeController::class, 'showEditQuestionForm'])->name('question.edit');

Route::patch('home/{question}', [HomeController::class, 'updateQuestion'])->name('question.update');

Route::get('home/{question}/delete', [HomeController::class, 'showDeleteQuestionForm'])->name('question.delete');

Route::delete('home/{question}', [HomeController::class, 'destroyQuestion'])->name('question.destroy');
