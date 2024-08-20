<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\RoleController; 


use function Laravel\Prompts\password;

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

// Login Route
Route::get('/user/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); 
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

////// User Frontend All Route \\\\\\\\\
// Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
Route::get('/', [UserController::class, 'UserDashboard'])->name('user.dashboard');


// Admin Group Middleware
Route::middleware(['auth','roles:admin'])->group(function(){
    // Admin route
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::get('/admin/logout', [AdminController::class,'AdminLogout'])->name('admin.logout');
    Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');  

});



// Admin Group Middleware
Route::middleware(['auth','roles:admin'])->group(function(){
  

    // Property Type All Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type','AllType')->name('all.type')->middleware('permission:type.all');
        Route::get('/add/type','AddType')->name('add.type')->middleware('permission:type.add');
        Route::POST('/store/type','StoreType')->name('store.type');
        Route::get('/edit/type/{id}','EditType')->name('edit.type')->middleware('permission:type.edit');
        Route::POST('/update/type','UpdateType')->name('update.type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete.type')->middleware('permission:type.delete');
    });

    // Amenitis All Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/amenitie','AllAmenitie')->name('all.amenitie')->middleware('permission:amenitie.all');
        Route::get('/add/amenitie','AddAmenitie')->name('add.amenitie')->middleware('permission:amenitie.add');
        Route::POST('/store/amenitie','StoreAmenitie')->name('store.amenitie');
        Route::get('/edit/amenitie/{id}','EditAmenitie')->name('edit.amenitie')->middleware('permission:amenitie.edit');
        Route::POST('/update/amenitie','UpdateAmenitie')->name('update.amenitie');
        Route::get('/delete/amenitie/{id}','DeleteAmenitie')->name('delete.amenitie')->middleware('permission:amenitie.delete');
       
    });

     // Permission All Route
     Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all.permission')->middleware('permission:rolepermission.menu');
        Route::get('/add/permission','AddPermission')->name('add.permission')->middleware('permission:rolepermission.menu');
        Route::POST('/store/permission','StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission')->middleware('permission:rolepermission.menu');
        Route::POST('/update/permission','UpdatePermission')->name('update.permission');
        Route::get('/delte/permission/{id}','DeletePermission')->name('delete.permission')->middleware('permission:rolepermission.menu');

        Route::get('/import/permission','ImportPermission')->name('import.permission')->middleware('permission:rolepermission.menu');
        Route::get('/export/permission','ExportPermission')->name('export.permission')->middleware('permission:rolepermission.menu');
       
    });

     // Role All Route
     Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles','AllRoles')->name('all.roles')->middleware('permission:rolepermission.menu');
        Route::get('/add/roles','AddRoles')->name('add.roles')->middleware('permission:rolepermission.menu');
        Route::POST('/store/roles','StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles')->middleware('permission:rolepermission.menu');
        Route::POST('/update/roles','UpdateRoles')->name('update.roles');
        Route::get('/delte/roles/{id}','DeleteRoles')->name('delete.roles')->middleware('permission:rolepermission.menu');

        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission')->middleware('permission:rolepermission.menu');
        Route::POST('/role/permission/store','RolePermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission')->middleware('permission:rolepermission.menu');
        Route::get('/admin/edit/roles/{id}','AdminEditRoles')->name('admin.edit.roles')->middleware('permission:rolepermission.menu');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::get('/admin/delete/roles/{id}','AdminDeleteRoles')->name('admin.delete.roles')->middleware('permission:rolepermission.menu');
    
    });

     // Admin User All Route
     Route::controller(AdminController::class)->group(function () {
        Route::get('/all/admin', 'AllAdmin')->name('all.admin')->middleware('permission:adminuser.menu');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin')->middleware('permission:adminuser.menu');
        Route::POST('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin')->middleware('permission:adminuser.menu');
        Route::POST('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin')->middleware('permission:adminuser.menu');
    });
   
}); //End Role Middleware



// Route::get('/',[UserController::class,'Index']);

// Route::middleware(['auth'])->group(function(){
//     Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
//     Route::POST('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
//     Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
//     Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
//     Route::get('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');
//     Route::get('/user/schedule/request', [UserController::class, 'UserscheduleRequest'])->name('user.schedule.request');
//     // User WishlistAll Routes
//     Route::Controller(WishlistController::class)->group(function(){
//         Route::get('/user/wishlist', 'UserWishlist')->name('user.wishllist');
//         Route::get('/get-wishlist-property', 'GetWishlistProperty');
//         Route::get('/wishlist-remove{id}', 'wishlistRemove');
//     });
//     //User Compare All Routes
//     Route::Controller(CompareController::class)->group(function(){
//         Route::get('/user/compare', 'UserCompare')->name('user.compare');
//         Route::get('/get-compare-property', 'GetCompareProperty');
//         Route::get('/Compare-remove{id}', 'CompareRemove');
//     });
// });

// Agent All Routes
Route::middleware(['auth','roles:agent'])->group(function(){
    // Agent route
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    });
    