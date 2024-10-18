<?php

use App\Http\Controllers\AcceptedTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DevController;
use App\Http\Controllers\Backend\CvController;
use App\Http\Controllers\Backend\ContactdevController;
use App\Http\Controllers\Backend\ComptedevController;
use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EnregistestController;
use App\Http\Controllers\ReponseTestController;
use App\Http\Controllers\Backend\CompteentrepriController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Assurez-vous que l'URI et le nom du contrôleur correspondent à votre configuration
Route::get('/devs', [CvController::class, 'apiIndex']);
Route::get('/cvs/search', [CvController::class, 'search']);

Route::get('/devs/{id}/cvpublic', [CvController::class, 'getPublicCV']);
Route::post('/contactdev', [ContactdevController::class, 'store']);
Route::post('/register', [ComptedevController::class, 'register']);
Route::post('/login', [ComptedevController::class, 'login']);

Route::post('/profile', [DevController::class, 'addprofile']);
Route::get('/profile/{id}', [DevController::class, 'profile']);
Route::post('change-password', [ComptedevController::class, 'changePassword']);
Route::post('/delete-account', [ComptedevController::class, 'deleteAccount']);
Route::post('/cvs', [CvController::class, 'cvdev']);
Route::get('/skills', [SkillController::class ,'getSkills']);
Route::post('/cvs', [CvController::class, 'cvdev']);
Route::get('/cvs/{devId}', [CvController:: class , 'getCvsByDeveloper']);
Route::get('/cvs/details/{cv}', [CvController::class,'showcv']);
Route::delete('/cvs/{cv}', [CvController::class ,'destroycv']);
Route::put('/cvs/{cv}', [CvController::class , 'updatecv']);
Route::get('/devs/{dev}', [DevController::class, 'getDevProfile']);
Route::put('/devs/{dev}', [DevController::class , 'updateprofil']);
Route::get('/messages', [ContactdevController::class, 'index']);


Route::post('/contactdevs/{id}/respond', [ContactdevController::class, 'respond']);



Route::post('/registerentreprise', [CompteentrepriController::class, 'register']);
Route::post('/loginentreprise', [CompteentrepriController::class, 'login']);
Route::get('/entrepri-details/{id}', [CompteentrepriController::class, 'entrepriDetails']);
Route::post('/update-password', [CompteentrepriController::class, 'updatePassword']);
Route::post('/delete-accountentrepri', [CompteentrepriController::class, 'deleteAccountentrepri']);
Route::get('/entreprise/messages/{email}', [CompteentrepriController::class, 'getMessages']);
Route::post('/entreprise/messages/{email}', [CompteentrepriController::class, 'addResponse']);


Route::get('/company-tests', [TestController::class, 'getCompanyTests']);
Route::post('/tests', [TestController::class, 'store']);
Route::get('/accepted_tests', [AcceptedTestController::class, 'getAcceptedTests']);

Route::get('/accepted_tests/{id}', [AcceptedTestController::class, 'getAcceptedTestById']);
Route::get('/verify-test', [TestController::class, 'verifyTest']);


Route::get('/api/accepted_tests/view-pdf/{fileName}', [AcceptedTestController::class, 'viewPdf'])->name('acceptedTests.viewPdf');

Route::post('/enregistests', [EnregistestController::class, 'store']);

Route::post('/updateEndTime', [ReponseTestController::class, 'updateEndTime']);

Route::post('/updateStartTime', [ReponseTestController::class, 'updateStartTime']);
Route::get('/get-test-and-developer-id', [EnregistestController::class, 'getTestAndDeveloperId']);
Route::post('/developer-id', [EnregistestController::class, 'getDeveloperId']);


Route::post('/reponses', [ReponseTestController::class, 'store']);

Route::get('responses/{enterpriseId}', [ReponseTestController::class ,'getResponsesByEnterpriseId']);
Route::get('response/{id}', [ReponseTestController::class, 'getResponseById']);
Route::post('responses/{id}/update-note', [ReponseTestController::class, 'updateNote']);


Route::get('reponse-tests/note/{devId}', [ReponseTestController::class, 'getNoteByDevId']);
Route::get('reponse-tests/test-id/{devId}', [ReponseTestController::class, 'getTestIdByDevId']);
Route::get('/developers-with-notes', [DevController::class, 'getDevelopersWithNotes']);

Route::get('developer/{id}/tests/count', [EnregistestController::class, 'getTestCountByDeveloper']);
Route::get('/developer/{id}/cv-count', [CvController::class, 'countCvsByDeveloper']);

Route::get('/messages/count/{dev_id}', [ContactdevController::class, 'countMessagesByDeveloper']);
Route::get('/messages/responses/count/{dev_id}', [ContactdevController::class, 'countResponsesByDeveloper']);
Route::get('/api/tests/{testId}/developer-count', [EnregistestController::class, 'getDeveloperCountByTestId']);


Route::get('/responses/count', [ReponseTestController::class, 'countResponsesByEntrepriseId']);
Route::get('/accepted-tests/count/{enterpriseId}', [AcceptedTestController::class, 'countAcceptedTestsByEnterpriseId']);