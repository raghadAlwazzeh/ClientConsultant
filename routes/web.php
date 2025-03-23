<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeekingAdviceController;
use App\Http\Controllers\EditClientController;
use Illuminate\Support\Facades\Auth;


Route::middleware(['auth'])->group(function () {
    Route::get('/', [SeekingAdviceController::class, 'showClients'])->name('clients.index');

    //add new client

    Route::get('/newclient', function () {
        return view('createNewClient.newClient');
    }); 
    Route::get('/newclient/schooleducation/{id?}', [SeekingAdviceController::class, 'clientSchoolEducation']);
    Route::post('/newclient/schooleducation/{id?}', [SeekingAdviceController::class, 'createClientSchoolEducation']);

    Route::get('/newclient/training/{id?}', [SeekingAdviceController::class, 'clientTraining']);
    Route::post('/newclient/training/{id?}', [SeekingAdviceController::class, 'createclientTraining']);

    Route::get('/newclient/universitydegree/{id?}', [SeekingAdviceController::class, 'clientUniversityDegree']);
    Route::post('/newclient/universitydegree/{id?}', [SeekingAdviceController::class, 'createClientUniversityDegree']);

    Route::get('/newclient/jobsituation', function () {
        return view('createNewClient.clientJob');
    });
    Route::post('/newclient/jobsituation', [SeekingAdviceController::class, 'createClientjobsituation']);
    Route::get('/newclient/languageskills', function () {
        return view('createNewClient.clientLanguageSkill');
    });
    Route::post('/newclient/languageskills', [SeekingAdviceController::class, 'createClientLanguageSkill']);

    Route::post('/newclient', [SeekingAdviceController::class, 'createNewClient']);


    //show client information
    Route::get('/clients/{id}', [SeekingAdviceController::class, 'showClientInformation'])->name('clients.showinformation');
    Route::get('/clients/qualification/{id}', [SeekingAdviceController::class, 'showClientQualification'])->name('clients.showqualification');

    //edit Client
    Route::get('edit/clientinfo/{id}', [EditClientController::class, 'editClientInfo'])->name('clientinfo.edit');
    Route::patch('/clientinfo/{id}', [EditClientController::class, 'updateClientInfo'])->name('clientinfo.update');

    Route::get('edit/schooleducation/{id}', [EditClientController::class, 'editSchoolEducation'])->name('schooleducation.edit');
    Route::patch('/schooleducation/{id}', [EditClientController::class, 'updateSchoolEducation'])->name('schooleducation.update');
    
    Route::get('edit/training/{id}', [EditClientController::class, 'editTraining'])->name('training.edit');
    Route::patch('/training/{id}', [EditClientController::class, 'updateTraining'])->name('training.update');

    Route::get('edit/universitydegree/{id}', [EditClientController::class, 'editUniversityDegree'])->name('universitydegree.edit');
    Route::patch('/universitydegree/{id}', [EditClientController::class, 'updateUniversityDegree'])->name('universitydegree.update');

    Route::get('edit/job/{id}', [EditClientController::class, 'editJob'])->name('job.edit');
    Route::patch('/job/{id}', [EditClientController::class, 'updateJob'])->name('job.update');

    Route::get('edit/languagrskill/{id}', [EditClientController::class, 'editLanguageSkills'])->name('languageskill.edit');
    Route::patch('/languageskill/{id}', [EditClientController::class, 'updateLanguageSkills'])->name('languageskill.update');


});


Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
