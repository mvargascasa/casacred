<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TwController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ModalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class,'home'])->name('web.index');
Route::get('/propiedades/{code?}/{slug?}', [WebController::class,'index'])->name('web.propiedades');
//NUEVAS RUTAS
Route::get('/home', [WebController::class, 'home'])->name('web.home');
Route::get('/creditos', [WebController::class, 'creditos'])->name('web.creditos');
Route::post('/send-lead-contact', [WebController::class, 'sendLeadContact'])->name('web.lead.contact');

//Route::get('/avaluo-de-propiedad', [WebController::class, 'avaluo'])->name('web.avaluo.propiedad');

Route::get('/equipo', [TeamController::class, 'index'])->name('team.index');
Route::get('/propiedad/{listing:slug}', [WebController::class,'detail'])->name('web.detail');
Route::get('/getcities/{idState}', [WebController::class,'getcities'])->name('web.getcities');
Route::get('/getsector/{city_id}', [WebController::class, 'getsector'])->name('web.getsector');
Route::get('/getstate/{city}', [WebController::class, 'getstatebycity'])->name('web.getstate');
Route::get('/getstates/{idCountry}', [WebController::class, 'getstates'])->name('web.states');
Route::get('/nuestros-servicios', [WebController::class,'serviciosall'])->name('web.nuestros-servicios');
Route::get('/servicios/notaria-queens-new-york', [WebController::class,'notariausa'])->name('web.notariausa');
Route::get('/servicios/{service:slug}', [WebController::class,'servicios'])->name('web.servicios');
Route::get('/servicio/{service:slug}', [WebController::class,'servicio'])->name('web.servicio');

Route::get('/politicas-de-privacidad', [WebController::class,'politicas'])->name('web.politicas');

Route::post('sendlead', [WebController::class,'sendlead'])->name('web.sendlead');
Route::post('sendcite', [WebController::class, 'sendcite'])->name('web.sendcite');
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
    //Route::post('delete/{listing_id}', [ListingController::class, 'delete'])->name('admin.listings.delete');    
    Route::post('posted-on-facebook/{listing_id}', [ListingController::class, 'postedfacebook'])->name('admin.listing.posted.facebook');
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
    Route::post('setoutstanding', [AdminController::class, 'setoutstanding'])->name('home.tw.setoutstanding');
    Route::post('setisinplusvalia', [AdminController::class, 'setisinplusvalia'])->name('home.tw.setisinplusvalia');
    Route::post('setwatermark', [UserController::class, 'quitwatermark'])->name('home.user.watermark');

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

    Route::get('seo', [SeoController::class, 'index'])->name('admin.seo.index');
    Route::get('seo/pages', [SeoController::class, 'indexpages'])->name('admin.seo.pages.index');
    Route::get('seo/pages/create', [SeoController::class, 'create'])->name('admin.seo.create');
    Route::post('seo/pages/savepage', [SeoController::class, 'store'])->name('admin.seo.store');
    Route::get('seo/pages/edit/{seopage}', [SeoController::class, 'edit'])->name('admin.seo.edit');
    Route::put('seo/pages/update/{seopage}', [SeoController::class, 'update'])->name('admin.seo.update');
    Route::post('seo/pages/delete/{id}', [SeoController::class, 'delete'])->name('admin.seo.delete');
    Route::get('seo/navbar', [SeoController::class, 'indexnavbar'])->name('admin.seo.navbar.index');
    Route::get('seo/navbar/create', [SeoController::class, 'createnavbar'])->name('admin.seo.navbar.create');
    Route::post('seo/navbar/store', [SeoController::class, 'storenavbar'])->name('admin.seo.navbar.store');
    Route::get('seo/navbar/edit/{id}', [SeoController::class, 'editnavbar'])->name('admin.seo.navbar.edit');
    Route::put('seo/navbar/update/{id}', [SeoController::class, 'updatenavbar'])->name('admin.seo.navbar.update');
    
    Route::get('seo/templates', [SeoController::class, 'indextemplates'])->name('admin.seo.templates.index');

    //BLOG
    Route::get('post', [PostController::class, 'index'])->name('admin.post.index');
    Route::get('post/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('post/store', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('post/edit/{post}', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::put('post/update/{post}', [PostController::class, 'update'])->name('admin.post.update');

    //PROPERTIES DROP PRICE
    Route::get('properties-change-price', [AdminController::class, 'propertieschangeprice'])->name('admin.properties.change.price');

    Route::get('history', [HistoryController::class, 'index'])->name('admin.history');

    //ROUTE TO SHOW PROJECTS TO CASA PROMOTORA
    Route::get('projects', [ProjectController::class, 'index'])->name('admin.api.projects.index');
    Route::get('project/{id}', [ProjectController::class, 'projectById'])->name('admin.api.project.show');

    //Route::get('modals', [ModalController::class, 'index'])->name('admin.modals.index');

    //Route::get('listings', [ListingController::class,'listings'])->name('admin.listings');
    //Route::get('listingadd', [ListingController::class,'create'])->name('admin.listingadd');
    //Route::post('listingstore', [ListingController::class,'store'])->name('admin.listingstore');
    //Route::get('listingedit/{listing}', [ListingController::class,'edit'])->name('admin.listingedit');
    //Route::get('listingshow/{listing}', [ListingController::class,'show'])->name('admin.listingshow');
    //Route::put('listingupdate/{listing}', [ListingController::class,'update'])->name('admin.listingupdate');
    //Route::delete('listingdelete/{listing}', [ListingController::class,'delete'])->name('admin.listingdelete');
    
});

//BLOG
Route::get('/blog', [WebController::class, 'blog'])->name('web.blog');
Route::get('/post/{slug}', [WebController::class, 'showpost'])->name('web.show.post');


Route::get('/crm/getlistingscsv', [WebController::class,'listingscsv'])->name('web.listingscsv');

//   SEO
Route::get('/seo', [WebController::class,'seo'])->name('web.seo');
// Route::get('/casas-de-venta-en-ecuador', [WebController::class,'index'])->name('web.casas.ecu');
// Route::get('/departamentos-de-venta-en-ecuador', [WebController::class,'index'])->name('web.depar.ecu');
// Route::get('/terrenos-de-venta-en-ecuador', [WebController::class,'index'])->name('web.terre.ecu');

// Route::get('/casas-de-venta-en-cuenca', [WebController::class,'index'])->name('web.casas.azu');
// Route::get('/departamentos-de-venta-en-cuenca', [WebController::class,'index'])->name('web.depar.azu');
// Route::get('/terrenos-de-venta-en-cuenca', [WebController::class,'index'])->name('web.terre.azu');

// Route::get('/casas-de-venta-en-quito', [WebController::class,'index'])->name('web.casas.qui');
// Route::get('/departamentos-de-venta-en-quito', [WebController::class,'index'])->name('web.depar.qui');
// Route::get('/terrenos-de-venta-en-quito', [WebController::class,'index'])->name('web.terre.qui');

// Route::get('/casas-de-venta-en-guayaquil', [WebController::class,'index'])->name('web.casas.gua');
// Route::get('/terrenos-de-venta-en-guayaquil', [WebController::class,'index'])->name('web.terre.gua');
// Route::get('/departamentos-de-venta-en-guayaquil', [WebController::class,'index'])->name('web.depar.gua');

//nuevas rutas para el footer de la nueva pagina home
Route::get('/quito', [WebController::class, 'index'])->name('web.quito');
Route::get('/cuenca', [WebController::class, 'index'])->name('web.cuenca');
Route::get('/guayaquil', [WebController::class, 'index'])->name('web.guayaquil');

//landings
Route::post('/landing/leadcredito', [LandingController::class, 'sendleadcredito'])->name('web.lead.credito');
Route::get('/landing/solicite-su-credito', [LandingController::class, 'credito'])->name('web.landing.credito');

Route::get('/thank', function(){return view('thank');})->name('thank');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
