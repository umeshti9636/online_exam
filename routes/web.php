<?php


use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnsUpdateController;

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
Route::get('/register',[RegisterController::class,'register']);
Route::post('/valRegister',[RegisterController::class, 'valRegister'])->name('valRegister');
Route::get('/login',[LoginController::class,'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/vallogin', [LoginController::class, 'vallogin']);
Route::group(['middleware'=>['web', 'checkAdmin']],function(){
    Route::get('/admin/dashboard', [LoginController::class, 'admindashboard']);
    Route::get('/admin/subject', [SubjectController::class,'subject']);
    Route::post('/Addsubject', [SubjectController::class, 'Addsubject']);
    Route::get('/admin/exam', [ExamController::class, 'Exam']);
    Route::post('/Addexam', [ExamController::class, 'Addexam']);
    Route::get('/admin/exam_details', [ExamController::class, 'exam_details']);
    Route::get('/admin/question', [QuestionController::class, 'Question']);
    Route::post('/Addquestion', [QuestionController::class, 'Addquestion']);
    Route::get('AnswerUpdate/{id}',[AnsUpdateController::class, 'AnswerUpdate']);
    Route::post('/Addans/{id}', [AnsUpdateController::class, 'Addans']);
    
});
Route::group(['middleware' => ['web', 'checkStudent']], function () {
    Route::get('/dashboard', [LoginController::class, 'loaddashboard']);
});


