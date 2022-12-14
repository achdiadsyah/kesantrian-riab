<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('wilayah')->name('wilayah.')->group(function () {
    Route::get('province', [App\Http\Controllers\Master\WilayahController::class, 'getProvince'])->name('province');
    Route::get('city', [App\Http\Controllers\Master\WilayahController::class, 'getCity'])->name('city');
    Route::get('district', [App\Http\Controllers\Master\WilayahController::class, 'getDistrict'])->name('district');
    Route::get('village', [App\Http\Controllers\Master\WilayahController::class, 'getVillage'])->name('village');
});

Auth::routes([
    'register'  => false,
    'reset'     => true,
    'verify'    => true,
]);

Route::get('student/register', function () {
    return view('auth.register-student');
});

// Can Access after verified and login
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Bucket S3 Method
    Route::prefix('cdn')->group(function () {
        Route::get('/', [App\Http\Controllers\BucketController::class, 'showFile'])->name('fileS3');
        Route::post('upload', [App\Http\Controllers\BucketController::class, 'upload'])->name('uploadS3');
        Route::post('delete', [App\Http\Controllers\BucketController::class, 'delete'])->name('deleteS3')->middleware('IsStaff');
        Route::get('archive/{id}', [App\Http\Controllers\BucketController::class, 'archive'])->name('archiveS3')->middleware('IsStaff');
    });

    // Public Menu
    Route::prefix('home')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('account-setting', [App\Http\Controllers\HomeController::class, 'userDetail'])->name('account-setting');
        Route::post('account-setting-update-data', [App\Http\Controllers\HomeController::class, 'updateData'])->name('account-setting-update-data');
        Route::post('account-setting-update-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('account-setting-update-password');
    });

    // Super Access Only
    Route::middleware(['IsAdmin'])->group(function () {
        Route::prefix('admin')->name('admin.')->group(function () {

            Route::get('app-setting', [App\Http\Controllers\Admin\AppSettingController::class, 'index'])->name('app-setting');
            Route::post('app-setting', [App\Http\Controllers\Admin\AppSettingController::class, 'update'])->name('update-setting');

            Route::get('user-list', [App\Http\Controllers\Admin\UserManagementController::class, 'index'])->name('user-list');
            Route::get('user-detail/{id}', [App\Http\Controllers\Admin\UserManagementController::class, 'detail'])->name('user-detail');
            Route::post('user-create-data', [App\Http\Controllers\Admin\UserManagementController::class, 'create'])->name('user-create-data');
            Route::post('user-update-data', [App\Http\Controllers\Admin\UserManagementController::class, 'update'])->name('user-update-data');
            Route::post('user-update-password', [App\Http\Controllers\Admin\UserManagementController::class, 'updatePassword'])->name('user-update-password');
            Route::post('user-delete', [App\Http\Controllers\Admin\UserManagementController::class, 'destroy'])->name('user-delete');
            
            Route::get('role-list', [App\Http\Controllers\Admin\RoleManagementController::class, 'index'])->name('role-list');
            Route::get('role-detail/{id}', [App\Http\Controllers\Admin\RoleManagementController::class, 'detail'])->name('role-detail');
            Route::post('role-create-data', [App\Http\Controllers\Admin\RoleManagementController::class, 'create'])->name('role-create-data');
            Route::post('role-update-data', [App\Http\Controllers\Admin\RoleManagementController::class, 'update'])->name('role-update-data');
            Route::post('role-delete', [App\Http\Controllers\Admin\RoleManagementController::class, 'destroy'])->name('role-delete');

            Route::get('app-log', [App\Http\Controllers\Admin\AppLogController::class, 'index'])->name('app-log');

        });
    });

    // Staff Access and Super
    Route::middleware(['IsStaff'])->group(function () {
        
        Route::prefix('master')->name('master/')->group(function () {
            Route::get('classroom-list', [App\Http\Controllers\Master\ClassroomController::class, 'index'])->name('classroom-list');
            Route::get('classroom-list/create', [App\Http\Controllers\Master\ClassroomController::class, 'create'])->name('classroom-list-create');
            Route::get('classroom-list/edit/{id}', [App\Http\Controllers\Master\ClassroomController::class, 'edit'])->name('classroom-list-edit');
            Route::post('classroom-list/store', [App\Http\Controllers\Master\ClassroomController::class, 'store'])->name('classroom-list-store');
            Route::post('classroom-list/destroy', [App\Http\Controllers\Master\ClassroomController::class, 'destroy'])->name('classroom-list-store-destroy');
            
            
            Route::get('dormitory-list', [App\Http\Controllers\Master\DormitoryController::class, 'index'])->name('dormitory-list');
        });
    });

    //Student Menu with Status "PSB"
    Route::middleware(['IsStudentPsb'])->group(function () {
        Route::prefix('psb')->name('psb.')->group(function () {

        });
    });

    // Student Menu with Status "Active" 
    Route::middleware(['IsStudentActive'])->group(function () {
        Route::prefix('student')->name('student.')->group(function () {
            
        });
    });
});






















