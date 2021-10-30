<?php

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

Auth::routes();

// Page racine (visiteur)
Route::get('/', function () {
    return view('visiteurs');
});
// Visiteurs
Route::view('index','visiteurs')->name('visiteurs');

/* For members */
Route::get('/suggestions','MemberController@index')->name('projets.membres');
Route::get('/liste_propostions','MemberController@list_propositions')->name('list-prop-membres');
Route::get('/export-Propositions','MemberController@export_pdf')->name("export-propositions");
Route::post('/store-proposition','MemberController@store')->name("store-proposition");
Route::delete('/proposition/{proposition}','MemberController@delete')->name("delete-proposition");
Route::delete('/user/{user}','MemberController@delete_user')->name("delete-memb");

// shows
Route::get('/see-cooperations','MemberController@cooperations')->name("see-cooperations");
Route::get('/see-projets','MemberController@projets')->name("see-projets");
Route::get('/see-realisations','MemberController@realisations')->name("see-realisations");


/* For redirects pages */
Route::get('redirects','RequestController@request')->name('admin');

// Route::view('statistiques','statistiques.statistiques')->name('statistiques');

/* searches */
Route::get('/search','MissionController@search')->name('search');
Route::get('/search-proposition','MemberController@search')->name('search-proposition');

// export propositions
Route::get('/export-propositions','MemberController@export_pdf')->name("export-propositions");

// Search
Route::get('/search-user','MemberController@search_user')->name('search-user');
Route::get('/searchpart','PartenaireController@search')->name('searchpart');
Route::get('/searchdon','DonController@search')->name('searchdon');
Route::get('/searchconv','ConventionController@search')->name('searchconv');
Route::get('/searchprojet','ProjetController@search')->name('searchprojet');

// General counts
Route::get('admin','RequestController@request')->name('dashboard');

/*Status pages*/
//conventions
Route::get('conv_en_cours','Statut_pagesController@conv_encours')->name('conv_encours');
Route::get('conv_expiree','Statut_pagesController@conv_expiree')->name('conv_expiree');
//missions
Route::get('miss_en_attente','Statut_pagesController@miss_en_attente')->name('miss_en_attente');
Route::get('miss_encours','Statut_pagesController@miss_encours')->name('miss_encours');
Route::get('miss_accomplie','Statut_pagesController@miss_accomplie')->name('miss_accomplie');
//projets
Route::get('pro_en_attente','Statut_pagesController@pro_en_attente')->name('pro_en_attente');
Route::get('pro_encours','Statut_pagesController@pro_encours')->name('pro_encours');
Route::get('pro_realise','Statut_pagesController@pro_realise')->name('pro_realise');


/*Indexes */
Route::get('/partenaires','PartenaireController@index')->name("partenaires");
Route::get('/conventions','ConventionController@index')->name("conventions");
Route::get('/dons','DonController@index')->name("dons");
Route::get('/missions','MissionController@index')->name("missions");
Route::get('/projets','ProjetController@index')->name("projets");
Route::get('/realisations','RealisationController@index')->name("realisations");

// Partenaires
Route::get('/create-partenaire','PartenaireController@create')->name("create-partenaire");
Route::post('/store-partenaire','PartenaireController@store')->name("store-partenaire");
Route::get('/partenaires/{partenaire}','PartenaireController@show')->name("show-partenaire");
Route::get('/partenaires/{partenaire}/edit','PartenaireController@edit')->name("edit-partenaire");
Route::put('/partenaires/{partenaire}','PartenaireController@update')->name("update-partenaire");
Route::get('/export-partenaires','PartenaireController@export_pdf')->name("export-partenaires");
Route::get('/export-search','PartenaireController@export_pdf_search')->name("export-searchPartenaires");
Route::delete('/partenaire/{partenaire}','PartenaireController@delete')->name("delete-partenaire");

// Conventions
Route::get('/create-convention','ConventionController@create')->name("create-convention");
Route::post('/store-convention','ConventionController@store')->name("store-convention");
Route::get('/conventions/{convention}','ConventionController@show')->name("show-convention");
Route::get('/conventions/{convention}/edit','ConventionController@edit')->name("edit-convention");
Route::put('/conventions/{convention}','ConventionController@update')->name("update-convention");
Route::get('/download{file}','ConventionController@download')->name("download");
Route::get('/export-conventions','ConventionController@export_pdf')->name("export-conventions");

// Dons
Route::get('/create-don','DonController@create')->name("create-don");
Route::post('/store-don','DonController@store')->name("store-don");
Route::get('/dons/{don}','DonController@show')->name("show-don");
Route::get('/export-dons','DonController@export_pdf')->name("export-dons");

// Missions
Route::get('/create-mission','MissionController@create')->name("create-mission");
Route::post('/store-mission','MissionController@store')->name("store-mission");
Route::get('/missions/{mission}','MissionController@show')->name("show-mission");
Route::get('/missions/{mission}/edit','MissionController@edit')->name("edit-mission");
Route::put('/missions/{mission}','MissionController@update')->name("update-mission");
Route::get('/export-missions','MissionController@export_pdf')->name("export-missions");
Route::delete('/mission/{mission}','MissionController@delete')->name("delete-mission");

// Projets
Route::get('/create-projet','ProjetController@create')->name("create-projet");
Route::post('/store-projet','ProjetController@store')->name("store-projet");
Route::get('/projets/{projet}','ProjetController@show')->name("show-projet");
Route::get('/projets/{projet}/edit','ProjetController@edit')->name("edit-projet");
Route::put('/projets/{projet}','ProjetController@update')->name("update-projet");
Route::get('/export-projets','ProjetController@export_pdf')->name("export-projets");
Route::delete('/projet/{projet}','ProjetController@delete')->name("delete-projet");

// Realisations
Route::get('/create-realisation','RealisationController@create')->name("create-realisation");
Route::post('/store-realisation','RealisationController@store')->name("store-realisation");
Route::get('/realisations/{realisation}','RealisationController@show')->name("show-realisation");
Route::get('/export-realisations','RealisationController@export_pdf')->name("export-realisations");

/*Routes charts*/
Route::get('chartRealisation','ChartController@chartRealisation')->name("chartRealisation");
Route::get('chartUser','ChartController@chartUser')->name("chartUser");
Route::get('chartUser_super','ChartController@chartUser_super')->name('chartUser_super');

// Laravel dashboard (pas utilisé)
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route gestion membres
Route::view('admin-session','admin_session')->name('admin-session');
Route::post('/store-user','AdminController@store')->name("store-user");
Route::get('/list-users','AdminController@index')->name("users-list");
Route::get('/admins/{user}/edit','AdminController@edit')->name("edit-user");
Route::post('/admins/{user}','AdminController@update')->name("update-user");

// Routes super utilisateur
Route::get('/supers','SuperController@superUser')->name("super-list");
Route::get('/admins','SuperController@adminUser')->name("admin-list");
Route::get('/members','SuperController@memberUser')->name("member-list");
Route::get('/actifs','SuperController@actifUser')->name("actif-users");
Route::get('/inactifs','SuperController@inactifUser')->name("inactif-users");
Route::get('/super/{user}/edit','SuperController@edit')->name("users-edit");
Route::post('/super/{user}','SuperController@update')->name("users-update");
Route::delete('/user/{user}','SuperController@delete')->name("user.delete");
Route::delete('/userg/{user2}','SuperController@delete2')->name("user.delete2");

// Route reset password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('reset.pass');

// Route guide
Route::get('/guide','AdminController@guide')->name("guide");
