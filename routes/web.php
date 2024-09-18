<?php
use App\Http\Controllers\Backend\DevController;
use App\Http\Controllers\Backend\CvController;
use App\Http\Controllers\Backend\EducationController;
use App\Http\Controllers\Backend\ExperienceController;
use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\ContactdevController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EnregistestController;
use App\Http\Controllers\ReponseTestController;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactInfoMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/devs', DevController::class);
    Route::resource('/cvs', CvController::class);
    Route::resource('/educations', EducationController::class);
    Route::resource('/experiences', ExperienceController::class);
    Route::resource('/skills', SkillController::class);
    Route::get('/devs/create', [DevController::class, 'create'])->name('devs.create');
    Route::post('/devs', [DevController::class, 'store'])->name('devs.store');
    Route::get('/devs/{dev}', [DevController::class, 'show'])->name('devs.show');
    Route::get('/devs/{dev}/edit', [DevController::class, 'edit'])->name('devs.edit');
    Route::put('/devs/{dev}', [DevController::class, 'update'])->name('devs.update');
    Route::post('/cvs', [CvController::class, 'store'])->name('cvs.store');
    Route::get('/educations/create', [EducationController::class, 'create'])->name('educations.create');
    Route::post('/educations', [EducationController::class, 'store'])->name('educations.store');
    Route::get('/educations/{education}', [EducationController::class, 'show'])->name('educations.show');
    Route::get('/educations/{education}/edit', [EducationController::class, 'edit'])->name('educations.edit');
    Route::put('/educations/{education}', [EducationController::class, 'update'])->name('educations.update');
    Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('experiences.create');
    Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store');
    Route::get('/tests', [TestController::class, 'index'])->name('tests.index');
Route::post('/tests', [TestController::class, 'store'])->name('tests.store');

Route::post('/tests/{id}/reject', [TestController::class, 'reject'])->name('tests.reject');

Route::post('/tests/{id}/accept', [TestController::class, 'accept'])->name('tests.accept');

Route::get('/tests', [TestController::class, 'index'])->name('tests.index');
 
Route::get('/tests/accepted', [TestController::class, 'accepted'])->name('tests.accepted');
Route::get('/tests/rejected', [TestController::class, 'rejected'])->name('tests.rejected');
Route::get('/dashboard', [ContactdevController::class, 'dashboard'])->name('dashboard');

Route::get('/enregistest', [EnregistestController::class, 'index'])->name('enregistest.index');
Route::get('/reponse-tests', [ReponseTestController::class, 'index'])->name('reponse-tests.index');

Route::put('/contactdevs/{id}/approve', [ContactdevController::class ,'approve'])->name('contactdevs.approve');
Route::put('/contactdevs/{id}/reject', [ContactdevController::class ,'reject'])->name('contactdevs.reject');
});

require __DIR__.'/auth.php';
