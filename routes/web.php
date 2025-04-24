<?php

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

// comentado temporalmente
// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/', 'WelcomeController@index')->name('welcome');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Validar los usuarios por el Administrador registrados en el sistema
Route::get('user/validation', ['as' => 'userValidation.index', 'uses' => 'Auth\ValidationUserClientController@index']);
Route::post('uservalidationUpdate/{id}', ['as' => 'userValidation.update', 'uses' => 'Auth\ValidationUserClientController@update']);
Route::post('userValidationUpdateFromHome', ['as' => 'userValidation.updateFromHome', 'uses' => 'Auth\ValidationUserClientController@updateFromHome']);
Route::get('userClient/create', ["as" => "userClient.create", "uses" => "Auth\ValidationUserClientController@create"]);
Route::post('userCliente/store', ["as" => "userClient.store", "uses" => "Auth\ValidationUserClientController@store"]);
Route::get('user/showUser', ["as" => "user.showUser", "uses" => "Auth\ValidationUserClientController@showUser"]);
Route::get('user/edit_from_table/{id}', 'UserController@edit_from_table')->name('user/edit_from_table');
Route::get('user/update/{id}', 'UserController@update')->name('user/update');
Route::post('user/searchUser', ["as" => "user.searchUser", "uses" => "Auth\ValidationUserClientController@searchUser"]);
Route::post('user/read/{id}', ["as" => "user.read", "uses" => "Auth\ValidationUserClientController@read"]);
Route::get('user/inactive/{id}', ["as" => "user.inactive_form", "uses" => "Auth\ValidationUserClientController@inactive_form"]);
Route::get('user/active/{idUser}', ["as" => "user.active_form", "uses" => "Auth\ValidationUserClientController@active"]);
Route::post('user/inactive', ["as" => "user.inactive", "uses" => "Auth\ValidationUserClientController@inactive"]);
Route::post('userCliente/storeAjax', ["as" => "userClient.storeAjax", "uses" => "Auth\ValidationUserClientController@storeAjax"]);

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('password/showFormResetPassw', ["as" => "password.showFormResetPassw", "uses" => "Auth\ResetPasswordController@showFormResetPassw"])->middleware('auth');
Route::post('password/updateFromSession', ["as" => "password.updateFromSession", "uses" => "Auth\ResetPasswordController@passwordUpdateFromSession"]);

// Password Confirmation Routes...
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/verify/{code}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Usuario
Route::get('user/edit/', ["as" => "user.edit", "uses" => "UserController@edit"]);
Route::post("user/update/{id}", ["as" => "user.update", "uses" => "UserController@update"]);
Route::get('user/delete/confirm', ["as" => "user.delete.confirm", "uses" => "UserController@deleteConfirm"]);
Route::post('user/delete', ["as" => "user.delete", "uses" => "UserController@delete"]);
Route::post('user/edit_from_table/{id}', ["as" => "user.edit_from_table", "uses" => "UserController@edit_from_table"])->middleware('checkOnlyAdmin');



Route::get('/home', 'HomeController@index')->name('home');

Route::view('/modulartop', 'modulartop');
// Route::view('/novedades', 'novedades');
// Route::view('/post', 'post');
Route::view('/servicios', 'servicios/servicios');
Route::view('/fabricacion', 'fabricacion/fabricacion');
// Route::view('/acabado-tradicional', 'tableros/tableros-tradicional');
// Route::view('/acabado-altobrillo', 'tableros/tableros-altobrillo');
// Route::view('/acabado-supermate', 'tableros/tableros-supermate');
Route::get('tablero/byVisualEfect/{id}', ["as" => "tablero.byVisualEfect", "uses" => "ProductController@ShowViewByVisualEfect"]);
Route::get("tablero/{id}/description", ["as" => "tablero.description", "uses" => "ProductController@descriptionByProducto"]);
Route::get("tableros/{id}/showImages", ["as" => "tablero.showImages", "uses" => "ProductController@showImagesByProduct"])->middleware('auth');

Route::post('fabricacion/messageFabrication', ['as' => 'fabricacion.messageFabricacion', 'uses' => 'ContactController@formFabricacion']);


// Contacts
Route::post('contact/messageContact', ['as' => 'contact.messageContact', 'uses' => 'ContactController@formContact']);
Route::post('contact.store', ['as' => 'contact.store', 'uses' => 'ContactController@store']);
Route::post('contact.contact', ['as' => 'contact.contact', 'uses' => 'ContactController@contact']);
Route::get('contact/tellus', ['as' => 'contact.tellus', 'uses' => 'ContactController@tellus']);

// Newsletter
Route::get('newsletter/create', ['as' => 'newsletter.create', 'uses' => 'NewsletterController@create']);
Route::post('newsletter/store', ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']);
Route::get('newsletter/index', ['as' => 'newsletter.index', 'uses' => 'NewsletterController@index']);
Route::get('newsletter/edit/{id}', ['as' => 'newsletter.edit', 'uses' => 'NewsletterController@edit']);
Route::put('newsletter/update/{id}', ['as' => 'newsletter.update', 'uses' => 'NewsletterController@update']);
// Route::get('novedades/{id?}', ['as' => 'novedades', 'uses' => 'NewsletterController@novedades']);
Route::get('novedades/{id?}', ['as' => 'novedades', 'uses' => 'NewsletterController@novedades']);
Route::get('tags/{id}/{tag}', ['as' => 'tags', 'uses' => 'NewsletterController@tags']);
Route::get('post/{id}/{name}', ['as' => 'show', 'uses' => 'NewsletterController@show']);
Route::delete('newsletter/delete/{id}', ['as' => 'newsletter.delete', 'uses' => 'NewsletterController@delete']);
Route::patch('newsletter/{id}', ['as' => 'newsletter.restore', 'uses' => 'NewsletterController@restore']);
// Route::get('novedadesFilter/{id}', ['as' => 'novedadesFilter', 'uses' => 'NewsletterController@novedadesFilter']);

// Leds - Marketing
Route::get("leds/ledsget", ["as" => "leds.ledsget", "uses" => "NewsletterController@ledsget"]);
Route::post("leds/download", ["as" => "leds.download", "uses" => "NewsletterController@ledsdownload"]);




// Tags
Route::post('tag/storeajax', ['as' => 'tag.storeajax', 'uses' => 'TagController@store_ajax']);
//buscar TAGS
Route::get('search_tags/{d?}', ['as' => 'search_tags', 'uses' => 'TagController@search_tags']);


// Products
Route::get("product/create", ["as" => "product.create", "uses" => "ProductController@create"]);
Route::post("product/store", ["as" => "product.store", "uses" => "ProductController@store"]);
Route::get("product/index", ["as" => "product.index", "uses" => "ProductController@index"]);
Route::get("product/edit/{id}", ["as" => "product.edit", "uses" => "ProductController@edit"]);
Route::post("product/update/{id}", ["as" => "product.update", "uses" => "ProductController@update"]);
Route::get("product/delete/{id}", ["as" => "product.delete", "uses" => "ProductController@delete"]);
Route::get("product/restore/{id}", ["as" => "product.restore", "uses" => "ProductController@restore"]);
Route::get("product/show/{id}", ["as" => "product.show", "uses" => "ProductController@show"]);
Route::post("product/searchProduct", ["as" => "product.searchProduct", "uses" => "ProductController@searchProduct"]);
Route::get("product/import", ["as" => "product.import", "uses" => "ProductController@import"]);
Route::post("product/import", ["as" => "product.storeImport", "uses" => "ProductController@storeImport"]);
Route::post("product/importImages", ["as" => "product.storeImportImages", "uses" => "ProductController@storeImportImages"]);

// Catalogo
Route::get("catalog/import", ["as" => "catalog.import", "uses" => "CatalogController@import"]);
Route::post("catalog/store", ["as" => "catalog.store", "uses" => "CatalogController@store"]);
Route::post("catalog/addAliado", "CatalogController@addAliado")->name("catalog.addAliado");
Route::post("catalog/addEmail", "CatalogController@addEmail")->name("catalog.addEmail");


// Ficha tecnica
Route::get("fichaTecnica/uploadFichaTecnica", ["as" => "fichaTecnica.uploadFichaTecnica", "uses" => "FichaTecnicaController@showFormFichaTecnica"]);

Route::get("fichaTecnica/downloadFichaTecnica/{id}", ["as" => "fichaTecnica.downloadFichaTecnica", "uses" => "FichaTecnicaController@downloadFichaTecnica"])->middleware("auth");
Route::get("fichaTecnica/deleteFichaTecnica/{id}", ["as" => "fichaTecnica.deleteFichaTecnica", "uses" => "FichaTecnicaController@deleteFichaTecnica"]);
Route::get("fichaTecnica/showFichaTecnica", ["as" => "fichaTecnica.showFichaTecnica", "uses" => "FichaTecnicaController@showFichaTecnica"])->middleware("auth");
Route::post("fichaTecnica/storeFichaTecnica", ["as" => "fichaTecnica.storeFichaTecnica", "uses" => "FichaTecnicaController@storeFichaTecnica"]);




//Compras - Purchase
Route::get("purchase/create", ["as" => "purchase.create", "uses" => "PurchaseController@create"]);
Route::post("purchase/store", ["as" => "purchase.store", "uses" => "PurchaseController@store"]);
Route::get("purchase/index", "PurchaseController@index")->name("purchase.index");
Route::post("purchase/index", "PurchaseController@searchPurchase")->name("purchase.searchPurchase");
Route::get("purchase/show/{id}", "PurchaseController@show")->name("purchase.show");
Route::post("purchase/downloadpurchase", "PurchaseController@downloadpurchase")->name("purchase.downloadpurchase");

// Ventas - Sales
Route::get("sale/create", ["as" => "sale.create", "uses" => "SaleController@create"]);
Route::post("sale/store", ["as" => "sale.store", "uses" => "SaleController@store"]);
Route::get("sale/saleslist", ["as" => "sale.saleslist", "uses" => "SaleController@saleslist"]);
Route::get("sales/downloadsales", ["as" => "sales.downloadsales", "uses" => "SaleController@downloadsales"]);
Route::get("sales/statistics", ["as" => "sale.statistics", "uses" => "SaleController@statistics"]);
Route::post("sales/getStatisticsData", ["as" => "sale.getStatisticsData", "uses" => "SaleController@getStatisticsData"]);
Route::post("sales/validarExistencia", ["as" => "sale.validarExistencia", "uses" => "SaleController@validarExistencia"]);
Route::get("sale/show/{id}", ["as" => "sale.show", "uses" => "SaleController@show"]);


// Order Sale
Route::get("ordersale/downloadexcel", ["as" => "ordersale.downloadexcel", "uses" => "OrderSaleController@downloadexcel"]);
Route::post("ordersale/uploadexcel", ["as" => "ordersale.uploadexcel", "uses" => "OrderSaleController@uploadexcel"])->middleware('administrative');
Route::get("ordersale/create", ["as" => "ordersale.create", "uses" => "OrderSaleController@create"])->middleware('checkIfAreClient');
Route::post("ordersale/store", ["as" => "ordersale.store", "uses" => "OrderSaleController@store"]);
Route::get("ordersale/index", ["as" => "ordersale.index", "uses" => "OrderSaleController@index"])->middleware('checkIfAreClient');;
Route::post("ordersale/delete/{id}", ["as" => "ordersale.delete", "uses" => "OrderSaleController@delete"]);
Route::post("ordersale/attend/{id}", ["as" => "ordersale.attend", "uses" => "OrderSaleController@attend"]);
Route::post("ordersale/attendFromHome", ["as" => "ordersale.attendFromHome", "uses" => "OrderSaleController@attendFromHome"]);
Route::post("ordersale/cancelFromHome", ["as" => "ordersale.cancelFromHome", "uses" => "OrderSaleController@cancelFromHome"]);
Route::get("ordersale/show/{id}", ["as" => "ordersale.show", "uses" => "OrderSaleController@show"])->middleware('checkIfAreClient');
Route::get("ordersale/downloadplanilla/{ordersale_id}", ["as" => "ordersale.downloadplanilla", "uses" => "OrderSaleController@downloadplanilla"])->middleware('checkIfAreClient');
Route::post("ordersale/process/{id}", ["as" => "ordersale.process", "uses" => "OrderSaleController@process"]);
Route::post("ordersale/processorder", ["as" => "ordersale.processorder", "uses" => "OrderSaleController@processorder"]);
Route::post("ordersale/processFromHome", ["as" => "ordersale.processFromHome", "uses" => "OrderSaleController@processFromHome"]);


// Poyectos - Project
Route::get("project/create", ["as" => "project.create", "uses" => "ProjectController@create"]);
Route::get("project/create_3", ["as" => "project.create_3", "uses" => "ProjectController@create_3"]);
// Route::get("project/create_2", ["as" => "project.create_2", "uses" => "ProjectController@create_2"]);
Route::post("project/store", ["as" => "project.store", "uses" => "ProjectController@store"]);
Route::post("project/update/{id}", ["as" => "project.update", "uses" => "ProjectController@update"]);
Route::post("project/uploadimg", ["as" => "project.uploadimg", "uses" => "ProjectController@uploadimg"]);
Route::post("project/deleteimg", ["as" => "project.deleteimg", "uses" => "ProjectController@deleteimg"]);
Route::get("project/index", ["as" => "project.index", "uses" => "ProjectController@index"]);
Route::get("project/edit/{id}", ["as" => "project.edit", "uses" => "ProjectController@edit"]);
Route::post("project/searchalttext", ["as" => "project.searchalttext", "uses" => "ProjectController@searchalttext"]);
Route::post("project/updatetext", ["as" => "project.updatetext", "uses" => "ProjectController@updatetext"]);
Route::get("project/showphotos/{id}", ["as" => "project.showphotos", "uses" => "ProjectController@showphotos"]);
Route::get("project/showphotosbyproyectista", ["as" => "project.showphotosbyproyectista", "uses" => "ProjectController@showphotosbyproyectista"]);
Route::delete("project/delete/{id}", ["as" => "project.delete", "uses" => "ProjectController@delete"]);
Route::patch("project/{id}", ["as" => "project.restore", "uses" => "ProjectController@restore"]);
Route::post("project/showProyectistaById", ["as" => "project.showProyectistaById", "uses" => "ProjectController@showProyectistaById"]);

// Inventario - Inventory
Route::get("inventory/index", ["as" => "inventory.index", "uses" => "InventoryController@index"]);
Route::post("inventory/download", ["as" => "inventory.download", "uses" => "InventoryController@download"]);
Route::post("inventory/searchProduct", ["as" => "inventory.searchProduct", "uses" => "InventoryController@searchProduct"]);

// AJAX
//Category
Route::post('category/storeajax', ['as' => 'category.storeajax', 'uses' => 'CategoryController@store_ajax']);

//Proveedor
Route::post('provider/storeajax', ['as' => 'provider.storeajax', 'uses' => 'ProviderController@store_ajax']);

//Ver mas post
Route::post('newsletter/other_post_eajax', ['as' => 'newsletter.otherpostajax', 'uses' => 'NewsletterController@other_post_ajax']);
//Ontener novedad por ID
Route::post("newsletter/show_newsletter_by_id", ["as" => "newsletter.showNewsletterById", "uses" => "NewsletterController@showNewsletterById"]);


//Llenar combos de subcategroria y tipo de clasificacion
Route::post("product/subcategory", ["as" => "product.fillCombo", "uses" => "ProductController@fillCombo"]);

// Exportar Excel con los IDs de Productos
Route::get("product/exportProductFile", ["as" => "product.exportProductFile", "uses" => "ProductController@exportProductFile"]);
// Descargar Plantilla Excel para importar Productos
Route::get("product/exportTemplateFile", ["as" => "product.exportTemplateFile", "uses" => "ProductController@exportTemplateFile"]);

// Borrado de imagenes de productos
Route::post("product/deleteimg", ["as" => "product.deleteimg", "uses" => "ProductController@deleteimg"]);

// Productos
Route::post("product/storeajax", ["as" => "product.storeajax", "uses" => "ProductController@storeajax"]);
Route::post("product/addSubType", ["as" => "product.addSubType", "uses" => "ProductController@addSubType"]);
Route::post("product/deleteSubtype", ["as" => "product.deleteSubtype", "uses" => "ProductController@deleteSubtype"]);
Route::post("product/addAcabado", ["as" => "product.addAcabado", "uses" => "ProductController@addAcabado"]);
Route::post("product/addMaterial", ["as" => "product.addMaterial", "uses" => "ProductController@addMaterial"]);
Route::post("product/addSustrato", ["as" => "product.addSustrato", "uses" => "ProductController@addSustrato"]);
Route::post("product/addColor", ["as" => "product.addColor", "uses" => "ProductController@addColor"]);
Route::post("product/addCategory", "ProductController@addCategory")->name("product.addCategory");
Route::post("product/deleteCategory", "ProductController@deleteCategory")->name("product.deleteCategory");
Route::post("product/addType", "ProductController@addType")->name("product.addType");
Route::post("product/deleteType", "ProductController@deleteType")->name("product.deleteType");

// Images-link
Route::post("newsletter/uploadimage", ["as" => "newsletter.uploadimage", "uses" => "NewsletterController@uploadimage"]);

// Temporal
Route::get("vermensaje", ['as' => 'vermensaje', 'uses' => 'Auth\RegisterController@vermensaje']);
// limpiar cache
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});
// borrar caché de ruta
 Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});
// borrar caché de configuración
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
}); 
// borrar caché de vista
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
// genera una nueva key
// Route::get('/key-generate', function() {
//     $exitCode = Artisan::call('key:generate');
//     return 'View key generated';
// });
// Ejecuta cualquier comando de php artisan definido en la variable $comando
// Route::get('/artisan', function() {
//     $comando = 'storage:link';
//     $exitCode = Artisan::call($comando);
//     return 'Artisan comando ejecutado';
// });

