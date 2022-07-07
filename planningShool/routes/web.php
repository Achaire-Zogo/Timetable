<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome']);
Auth::routes();
Route::get('/voirToutUser', [App\Http\Controllers\WelcomeController::class, 'voirToutUser'])->name('voirToutUser');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('loadLevels/{$id}', 'App\Http\Controllers\TimeTableController@selectedCourse')->name('loadLevels');
Route::get('createTTStep2', 'App\Http\Controllers\TimeTableController@createStep2')->name('createTTStep2');
Route::post('selectedUE', 'App\Http\Controllers\TimeTableController@selectedUE');
Route::post('selectedGroup', 'App\Http\Controllers\TimeTableController@selectedGroup');
Route::post('saveCours', 'App\Http\Controllers\TimeTableController@saveCours');
Route::post('searchSpec', 'App\Http\Controllers\TimeTableController@searchSpec');
Route::post('delEx', 'App\Http\Controllers\TimeTableController@delEx');

Route::get('displayTTStud', 'App\Http\Controllers\TimeTableController@displayTTStud')->name('displayTTStud');
Route::get('displayTTEns', 'App\Http\Controllers\TimeTableController@displayTTEns')->name('displayTTEns');
Route::get('displayTTHall', 'App\Http\Controllers\TimeTableController@displayTTHall')->name('displayTTHall');
Route::get('displayCompleteTT', 'App\Http\Controllers\TimeTableController@displayCompleteTT')->name('displayCompleteTT');


Route::get('/connectStudent','App\Http\Controllers\TimeTableController@connectStudent')->name('connectStudent');
Route::get('/connectTeacher', 'App\Http\Controllers\TimeTableController@connectTeacher')->name('connectTeacher');
Route::group(['prefix' => 'timeTable', 'middleware' => ['auth'], 'namespace' => 'App\Http\Controllers', 'as' => 'TimeTable.'], function() {
    Route::resource('timetable', 'TimeTableController');

});
Route::group(['prefix' => 'EnsFil', 'middleware' => ['auth'], 'namespace' => 'App\Http\Controllers', 'as' => 'EnsFil.'], function() {
    Route::resource('EF', 'EnseignantFiliereController');

});
//CRUD CLASSE
Route::get('/liste/classe', [App\Http\Controllers\classeController::class, 'classe'])->name('classe.liste');
Route::get('/classe/create', [App\Http\Controllers\classeController::class, 'create'])->name('classe.create');
Route::get('/classe/{classe}', [App\Http\Controllers\classeController::class, 'edite'])->name('classe.edite');
Route::post('/classe/create', [App\Http\Controllers\classeController::class, 'ajouter'])->name('classe.ajouter');
Route::delete('/classe/{classe}', [App\Http\Controllers\classeController::class, 'supprimer'])->name('classe.supprimer');
Route::put('/classe/{classe}', [App\Http\Controllers\classeController::class, 'update'])->name('classe.update');
//CRUD UE

Route::get('/liste/ue', [App\Http\Controllers\ueController::class, 'ue'])->name('ue.liste');
Route::get('/ue/create', [App\Http\Controllers\ueController::class, 'create'])->name('ue.create');
Route::post('/ue/create', [App\Http\Controllers\ueController::class, 'ajouter'])->name('ue.ajouter');
Route::delete('/ue/{ue} ', [App\Http\Controllers\ueController::class, 'supprimer'])->name('ue.supprimer');
Route::get('/ue/{ue} ', [App\Http\Controllers\ueController::class, 'edite'])->name('ue.edite');
Route::put('/ue/{ue} ', [App\Http\Controllers\ueController::class, 'update'])->name('ue.update');

//Groupe
Route::get('groupe/create/{groupe}/{classe} ', [App\Http\Controllers\groupeController::class, 'edite'])->name('groupe.edite');
Route::put('groupe/create/{groupe}/{classe} ', [App\Http\Controllers\groupeController::class, 'update'])->name('groupe.update');
Route::get('liste/groupe/{classe}' , [App\Http\Controllers\groupeController::class, 'groupe'])->name('groupe.liste');
Route::get('groupe/create/{classe} ', [App\Http\Controllers\groupeController::class, 'create'])->name('groupe.create');
Route::post('groupe/create ', [App\Http\Controllers\groupeController::class, 'ajouter'])->name('groupe.ajouter');
Route::delete('groupe/create/{groupe}', [App\Http\Controllers\groupeController::class, 'supprimer'])->name('groupe.supprimer');
Route::resource('timetable', 'TimeTableController');




Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'App\Http\Controllers\admin', 'as' => 'admin.'], function() {
    Route::resource('niveau', 'NiveauCOntroller');
    Route::resource('specialites', 'SpecialiteController');
    Route::resource('filiere', 'FiliereController');
    Route::resource('enseignant', 'EnseignantController');
    Route::resource('salle', 'SalleController');
});
Route::get('voirEnsFil', 'App\Http\Controllers\admin\FiliereController@voirEnsFil')->name('voirEnsFil');
Route::get('delEnsFil', 'App\Http\Controllers\admin\FiliereController@delEnsFil')->name('delEnsFil');




