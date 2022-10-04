<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TwController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class,'home'])->name('web.index');
Route::get('/propiedades', [WebController::class,'index'])->name('web.propiedades');
//NUEVAS RUTAS
Route::get('/home', [WebController::class, 'home'])->name('web.home');
Route::get('/creditos', [WebController::class, 'creditos'])->name('web.creditos');
Route::post('/send-lead-contact', [WebController::class, 'sendLeadContact'])->name('web.lead.contact');

Route::get('/propiedad/{listing:slug}', [WebController::class,'detail'])->name('web.detail');
Route::get('/getcities/{idState}', [WebController::class,'getcities'])->name('web.getcities');
Route::get('/getstates/{idCountry}', [WebController::class, 'getstates'])->name('web.states');
Route::get('/nuestros-servicios', [WebController::class,'serviciosall'])->name('web.nuestros-servicios');
Route::get('/servicios/notaria-queens-new-york', [WebController::class,'notariausa'])->name('web.notariausa');
Route::get('/servicios/{service:slug}', [WebController::class,'servicios'])->name('web.servicios');
Route::get('/servicio/{service:slug}', [WebController::class,'servicio'])->name('web.servicio');

Route::get('/politicas-de-privacidad', [WebController::class,'politicas'])->name('web.politicas');

Route::post('sendlead', [WebController::class,'sendlead'])->name('web.sendlead');
Route::post('sendleadaval', [WebController::class, 'sendleadaval'])->name('web.sendleadaval');
Route::post('sendemailinterested', [WebController::class, 'sendemailinterested'])->name('web.send.email.interested');
Route::get('indextest', [WebController::class,'indextest'])->name('web.indextest');
Route::get('mobile', [WebController::class,'mobile'])->name('web.mobile');
Route::get('/mobiledet/{listing:slug}', [WebController::class,'mobiledet'])->name('web.mobiledet');

Route::get('/test88', function () {             });

Route::group(['prefix' => 'admin','middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', [AdminController::class,'index'])->name('admin.index');        
    Route::resource('listings', ListingController::class, ['as' => 'admin']);
    Route::post('unlocked/{id}', [ListingController::class, 'unlocked'])->name('admin.listings.unlocked');    
    Route::get('reslug/{listing}', [ListingController::class,'reslug'])->name('admin.reslug');
    Route::get('seo', [ListingController::class,'seo'])->name('admin.seo');
    Route::get('/show-listing/{listing}', [ListingController::class, 'show_listing'])->name('admin.show.listing');

    Route::resource('services', ServiceController::class, ['as' => 'admin']);
    Route::get('/words', [AdminController::class,'words'])->name('admin.words');    
    
    Route::get('tw', [TwController::class,'index'])->name('home.tw');
    Route::get('tw/create', [TwController::class,'create'])->name('home.tw.create');
    Route::get('tw/edit/{listing}', [TwController::class,'edit'])->name('home.tw.edit');
    Route::get('tw/show/{id}', [TwController::class, 'show'])->name('home.tw.show');

    Route::post('setcomment', [TwController::class, 'setcomment'])->name('home.tw.setcomment');

    Route::get('contacts', [TwController::class,'contacts'])->name('admin.contacts');
    Route::get('opports', [TwController::class,'opports'])->name('admin.opports');
    Route::get('properties', [TwController::class,'properties'])->name('admin.properties');
    Route::get('my-properties', [TwController::class, 'properties'])->name('admin.myproperties');
    Route::get('sold-out', [TwController::class, 'properties'])->name('admin.soldout');
    Route::get('propertieshow/{listing}', [TwController::class,'propertieshow'])->name('admin.propertieshow');
    Route::get('tw/css', function () { echo filesize($_SERVER["DOCUMENT_ROOT"].'/css/apptw.css'); });

    Route::get('notifications', [NotificationController::class, 'index'])->name('admin.notifications');
    Route::get('count-notifications', [NotificationController::class, 'countnotifications'])->name('admin.count.notifications');
    Route::get('notification/show/{comment}', [NotificationController::class, 'show'])->name('admin.notification.show');
    Route::post('setviewed', [NotificationController::class, 'setviewed'])->name('admin.comment.setviewed');
    
    Route::get('/maps', function () { return view('admin.maps'); });     
    Route::get('/test', [TwController::class,'test'] )->name('admin.test');
    
    Route::get('users/search', [UserController::class, 'searchuser'])->name('users.search');
    Route::resource('users', UserController::class);
    Route::put('users/changepass/{user}', [UserController::class,'changepass'])->name('users.changepass');
    
    Route::get('getallimg/{listing}', [AdminController::class,'getallimg'])->name('admin.getallimg');

    
    //Route::get('listings', [ListingController::class,'listings'])->name('admin.listings');
    //Route::get('listingadd', [ListingController::class,'create'])->name('admin.listingadd');
    //Route::post('listingstore', [ListingController::class,'store'])->name('admin.listingstore');
    //Route::get('listingedit/{listing}', [ListingController::class,'edit'])->name('admin.listingedit');
    //Route::get('listingshow/{listing}', [ListingController::class,'show'])->name('admin.listingshow');
    //Route::put('listingupdate/{listing}', [ListingController::class,'update'])->name('admin.listingupdate');
    //Route::delete('listingdelete/{listing}', [ListingController::class,'delete'])->name('admin.listingdelete');
    
});


Route::get('/crm/getlistingscsv', [WebController::class,'listingscsv'])->name('web.listingscsv');

//   SEO
Route::get('/seo', [WebController::class,'seo'])->name('web.seo');
Route::get('/casas-de-venta-en-ecuador', [WebController::class,'index'])->name('web.casas.ecu');
Route::get('/departamentos-de-venta-en-ecuador', [WebController::class,'index'])->name('web.depar.ecu');
Route::get('/terrenos-de-venta-en-ecuador', [WebController::class,'index'])->name('web.terre.ecu');

Route::get('/casas-de-venta-en-cuenca', [WebController::class,'index'])->name('web.casas.azu');
Route::get('/departamentos-de-venta-en-cuenca', [WebController::class,'index'])->name('web.depar.azu');
Route::get('/terrenos-de-venta-en-cuenca', [WebController::class,'index'])->name('web.terre.azu');

Route::get('/casas-de-venta-en-quito', [WebController::class,'index'])->name('web.casas.qui');
Route::get('/departamentos-de-venta-en-quito', [WebController::class,'index'])->name('web.depar.qui');
Route::get('/terrenos-de-venta-en-quito', [WebController::class,'index'])->name('web.terre.qui');

Route::get('/casas-de-venta-en-guayaquil', [WebController::class,'index'])->name('web.casas.gua');
Route::get('/terrenos-de-venta-en-guayaquil', [WebController::class,'index'])->name('web.terre.gua');
Route::get('/departamentos-de-venta-en-guayaquil', [WebController::class,'index'])->name('web.depar.gua');

//nuevas rutas para el footer de la nueva pagina home
Route::get('/quito', [WebController::class, 'index'])->name('web.quito');
Route::get('/cuenca', [WebController::class, 'index'])->name('web.cuenca');
Route::get('/guayaquil', [WebController::class, 'index'])->name('web.guayaquil');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
