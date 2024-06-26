<?php

use App\Http\Controllers\Admin\ManageDocumentsController;
use App\Http\Controllers\Admin\ManageNotificationController;
use App\Http\Controllers\Admin\MembersManagementController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Members\ApostolicWorkController;
use App\Http\Controllers\Members\AssignmentController;
use App\Http\Controllers\Members\ProfileController;
use App\Http\Controllers\Members\ViewNotificationController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Members\MembersController;

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


Route::get('/clear-all', function () {
    // Clear cache
    Artisan::call('cache:clear');

    // Clear compiled views
    Artisan::call('view:clear');

    // Clear route cache
    Artisan::call('route:clear');

    // Clear configuration cache
    Artisan::call('config:clear');

    // Run migrations
    Artisan::call('migrate');

    // Optionally, optimize Composers autoload files (if needed)
    Artisan::call('optimize');

    return 'Cache, views, routes, config, and migrations cleared and run successfully.';
})->name('clear.all');

Route::view('/','auth.login');

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');



// Admin section route management
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function(){
    // managing admin profile routes
    Route::controller(AdminController::class)->group(function (){
        Route::get('dashboard', 'index')->name('admin.dashboard');
        Route::get('logout', 'logout')->name('admin.logout');
        Route::get('profile', 'show')->name('admin.show');
        Route::post('profile/{user}', 'update')->name('admin.profile.update');
        Route::get('profile/setting', 'settings')->name('admin.setting');
        Route::post('profile/setting/update', 'update_settings')->name('admin.setting.update');
    });
    // Managing members route in the admin section area routes
    Route::controller(MembersManagementController::class)->group(function (){
        Route::get('member/create', 'create')->name('admin.member.create');
        Route::post('member/create','store')->name('admin.member.store');
        Route::get('all-members', 'index')->name('admin.member.all');
        Route::get('member-details/{member:username}', 'show')->name('admin.member.view');
        Route::get('member-edit/{member:username}', 'edit')->name('admin.member.edit');
        Route::post('member-update/{member:username}', 'update')->name('admin.member.update');
        Route::delete('member/delete/{member}', 'destroy')->name('admin.member.delete');
        Route::get('work-history', 'history')->name('admin.history.work');
        Route::get('work-history/{member}/user', 'SingleHistory')->name('admin.SingleHistory.work');
    });
    // task assignment from the admin section routes
    Route::controller(TaskController::class)->group(function (){
        Route::get('assign/task', 'create')->name('admin.task.create');
        Route::get('user/task/{user}','showFormForUser')->name('admin.user.task');
        Route::post('assign/task','store')->name('admin.task.store');

        Route::get('active/tasks', 'index')->name('admin.active.task');
        Route::get('all/tasks', 'allTasks')->name('admin.all.task');
        Route::get('active/user/task/{taskId}', 'activeUserTask')->name('admin.user.activeTask');
        Route::get('edit/active/task/{taskId}', 'edit')->name('admin.user.editActiveTask');
        Route::put('update/active/task/{taskId}', 'update')->name('admin.user.updateActiveTask');

        Route::put('end/active/task/{taskId}', 'endActiveTask')->name('admin.user.endActiveTask');
        Route::get('view/task/{taskId}', 'ViewTask')->name('admin.view.CurrentTask');
        Route::delete('delete/task/{taskId}', 'destroy')->name('admin.task.destroyTaskNow');
        Route::get('archive/tasks','archivedTask')->name('admin.task.archive');

        Route::get('restore/task/{taskId}', 'restoreTask')->name('admin.restore.task');

        Route::delete('force-delete/task/{taskId}', 'forceDeleteTask')->name('admin.forceDelete.task');

    });

    Route::controller(ManageNotificationController::class)->group(function(){
        Route::get('notifications', 'index')->name('admin.notification.view');
        Route::get('notification/create', 'create')->name('admin.notification.create');
        Route::post('notification/store', 'store')->name('admin.notification.store');
        Route::get('notification/{notice}', 'edit')->name('admin.notification.edit');
        Route::post('notification/{notice}/update', 'update')->name('admin.notification.update') ;
        Route::delete('notification/delete/{notify}', 'destroy')->name('admin.notification.delete');
        Route::get('notification/show/{notify}', 'show')->name('admin.notification.show');
    });

    Route::controller(ManageDocumentsController::class)->group(function(){
        Route::get('manage-documents', 'index')->name('admin.manage.document');
        Route::post('manage-documents', 'store')->name('admin.document.store');
        Route::get('manage-documents/{id}', 'show')->name('admin.document.show');
        Route::get('manage-documents/del/{id}', 'destroy')->name('admin.document.delete');

    });

});



Route::prefix('member')->middleware(['auth','verified', 'role:member'])->group(function(){

    Route::controller(MembersController::class)->group(function (){
        Route::get('dashboard', 'dashboard')->name('member.dashboard');
        Route::get('logout', 'logout')->name('member.logout');
    });

    Route::controller(AssignmentController::class)->group(function (){
        Route::get('active-assignment', 'activeAssignment')->name('member.active.assignment');
        Route::get('all-previous-assignment', 'allPreviousAssignments')->name('member.all.allPreviousAssignments');
        Route::get('previous-assignment-details/{details}', 'previousAssignmentDetails')->name('member.previousAssignmentDetails.view');
    });

    Route::controller(ViewNotificationController::class)->group(function(){
        Route::get('notice', 'index')->name('member.notice.view');
        Route::get('notice/{notice}', 'show')->name('member.notice.show');

        Route::get('download-documents', 'downloadDocuments')->name('member.download.documents');
        Route::get('download-documents/{id}', 'download')->name('member.download');

    });

    Route::controller(ProfileController::class)->group(function (){
        Route::get('profile', 'index')->name('member.profile.view');
        Route::get('update-password', 'ViewUpdatePassword')->name('member.password.view');
        Route::post('update-password/update', 'updatePassword')->name('member.password.update');
        Route::get('update-profile', 'viewUpdateProfile')->name('member.view.updateProfile');
        Route::post('update-profile/{member}', 'updateProfile')->name('member.update.updateProfile');
    });

    Route::controller(ApostolicWorkController::class)->group(function (){
        Route::get('apostolic-history', 'index')->name('apostolic.history.view');
        Route::get('apostolic-history/create', 'create')->name('apostolic.history.create');
        Route::post('apostolic-history/save', 'save')->name('apostolic.history.save');
        Route::get('apostolic-history/{history}', 'show')->name('apostolic.history.show');
        Route::get('apostolic-history/{history}/edit', 'edit')->name('apostolic.history.edit');
        Route::post('apostolic-history/{history}/update', 'update')->name('apostolic.history.update');
        Route::get('apostolic-history/{history}/destroy', 'destroy')->name('apostolic.history.destroy');
    });
});

//php artisan queue:work


require __DIR__.'/auth.php';
