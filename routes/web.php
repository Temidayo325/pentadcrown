<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ShortlistedController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TestController;

use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get("/", [PagesController::class, 'home']);
Route::get("/about", [PagesController::class, 'about']);
Route::get("/contact", [PagesController::class, 'contact']);
Route::get("/faq", [PagesController::class, 'faq']);
Route::post("/contact", [EmailController::class, 'sendMail']);

Route::post("/admin", [AdminController::class, 'Login']);
//This would be grouped under authorized access only
Route::get("/iamtheadmin", [AdminController::class, 'Dashboard'])->name('iamtheadmin');
Route::get("/search", [AdminController::class, 'Search']);

// Routes around UserController
Route::middleware(['auth:sanctum', 'verified'])->post("/upload_cv", [UserController::class, 'upload_cv']);

// Routes around JobController
Route::get("/getCategories", [JobController::class, 'getCategories']);
Route::post("/addCategories", [JobController::class, 'addUserCategories']);
Route::post("/addAdminCategories", [JobController::class, 'addAdminCategory']);
Route::post("/removeCategory", [JobController::class, 'removeCategory']);
// Routes around ShortListedController
Route::post("/createShortList", [ShortlistedController::class, 'create']);
Route::get("/readShortList", [ShortlistedController::class, 'read']);
Route::post("/deleteShortList", [ShortlistedController::class, 'destroy']);
Route::post("/sendAttachment", [ShortlistedController::class, 'sendAttachment']);
Route::post("/sendMail", [ShortlistedController::class, 'sendMail']);
// Routes around EstablishmentController
Route::post("/createEstablishment", [EstablishmentController::class, 'Create']);
Route::get("/getEstablishment", [EstablishmentController::class, 'Read']);
Route::post("/removeEstablishment", [EstablishmentController::class, 'Destroy']);
// Routes around NotificationController
Route::post("/createNotification", [NotificationController::class, 'Create']);
Route::get("/getNotification", [NotificationController::class, 'Read']);
Route::post("/removeNotification", [NotificationController::class, 'Destroy']);
// Routes around TestController
Route::post("/createTest", [TestController::class, 'store']);
Route::post("/createTestWithImage", [TestController::class, 'storeImage']);
Route::get("/getTest", [TestController::class, 'show']);
Route::post("/removeTest", [TestController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->post("/getTestResult", [TestController::class, 'getTestResult']);
Route::middleware(['auth:sanctum', 'verified'])->get("/denied", function(){
   return Inertia::render('Component/DoneTest');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/upload', function () {
    return Inertia::render('Component/Upload');
})->name('upload');

Route::middleware(['auth:sanctum', 'verified'])->get('/jobcategory', function () {
    return Inertia::render('Component/Job');
})->name('jobcategory');

Route::middleware(['auth:sanctum', 'verified'])->get('/test', [TestController::class, 'StartTest'])->name('test');
// function () {
//     return Inertia::render('Component/Test');
// }
Route::middleware(['auth:sanctum', 'verified'])->get('/aptitude', function () {
    return Inertia::render('Component/Aptitude');
})->name('aptitude');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//
Route::get('/admin', function () {
    return Inertia::render('Admin/Admin');
})->name('admin');
