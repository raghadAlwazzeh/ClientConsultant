<?php

use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeekingAdviceController;
use App\Http\Controllers\EditClientController;
use App\Http\Controllers\ShowClientController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

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
    Route::get('/client/schooleducation/{id}', [ShowClientController::class, 'showClientSchoolEducation'])->name('client.showschooleducation');
    Route::get('/client/training/{id}', [ShowClientController::class, 'showClientTraining'])->name('client.showtraining');
    Route::get('/client/universitydegree/{id}', [ShowClientController::class, 'showClientUniversityDegree'])->name('client.showuniversitydegree');
    Route::get('/client/job/{id}', [ShowClientController::class, 'showClientJob'])->name('client.showjob');
    Route::get('/client/languageskill/{id}', [ShowClientController::class, 'showClientLanguageSkill'])->name('client.showlanguageskill');

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

    Route::get('edit/languageskill/{id}', [EditClientController::class, 'editLanguageSkills'])->name('languageskill.edit');
    Route::patch('/languageskill/{id}', [EditClientController::class, 'updateLanguageSkills'])->name('languageskill.update');

    //covnversation protocol
    Route::get('newconversationprotocol/{id}', [AdvisorController::class, 'addConversationProtocol'])->name('conversationprotocol.new');
    Route::post('newconversationprotocol/{id}', [AdvisorController::class, 'storeConversationProtocol'])->name('conversationprotocol.store');
    Route::get('conversationprotocol/{id}', [AdvisorController::class, 'conversationProtocol'])->name('conversationprotocol.showall');
    Route::get('showconversationprotocol/{id}', [AdvisorController::class, 'showConversationProtocol'])->name('conversationprotocol.show');

    //calendar 
    //Route::get('/calendar/{year?}/{month?}', [TaskController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/{client}/{year?}/{month?}', [TaskController::class, 'index'])->name('calendar');
    Route::post('/calendar/store', [TaskController::class, 'store'])->name('calendar.store');
    Route::delete('/calendar/{calendar}', [TaskController::class, 'destroy'])->name('calendar.destroy');

    //tasks
    Route::get('/task/add/{client}', [TaskController::class, 'addTask'])->name('task.new');
    Route::post('/task/store/{client}', [TaskController::class, 'storeTask'])->name('task.store');
    Route::get('/task/show/{client}', [TaskController::class, 'showTask'])->name('task.show');
    Route::get('/task/details/{task}', [TaskController::class, 'showTaskDetails'])->name('task.details');

    //documents
    Route::get('/document/add/{client}', [DocumentController::class, 'addDocument'])->name('document.new');
    Route::post('/document/upload', [DocumentController::class, 'uploadDocument'])->name('document.upload'); 
    Route::get('/document/show/{client}', [DocumentController::class, 'showClientDocument'])->name('client.document.show');
    Route::get('/documentbop/add', [DocumentController::class, 'addDocumentBOP'])->name('documentbop.new');
    Route::get('/documentbop/show', [DocumentController::class, 'showDocumentBOP'])->name('documentbop.show');
    Route::get('/documentbou/add', [DocumentController::class, 'addDocumentBOU'])->name('documentbou.new');
    Route::get('/documentbou/show', [DocumentController::class, 'showDocumentBOU'])->name('documentbou.show');
    Route::post('/documentbou/upload', [DocumentController::class, 'uploadDocumentBOU'])->name('documentbou.upload');

    //contact
    Route::get('/contactperson/show', [ContactController::class, 'showContactPerson'])->name('contactperson.show');
    Route::get('/networkpartner/show', [ContactController::class, 'showNetworkPartner'])->name('networkpartner.show');

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
