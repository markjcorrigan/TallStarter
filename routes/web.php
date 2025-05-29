<?php

use App\Http\Controllers\ImpersonationController;
use App\Livewire\Admin\Index;
use App\Livewire\Admin\Permissions;
use App\Livewire\Admin\Permissions\CreatePermission;
use App\Livewire\Admin\Permissions\EditPermission;
use App\Livewire\Admin\Roles;
use App\Livewire\Admin\Roles\CreateRole;
use App\Livewire\Admin\Roles\EditRole;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Users\CreateUser;
use App\Livewire\Admin\Users\EditUser;
use App\Livewire\Admin\Users\ViewUser;
use App\Livewire\Dashboard;
use App\Livewire\Greeter;
use App\Livewire\Home;
use App\Livewire\PostForm;
use App\Livewire\PostList;
use App\Livewire\PrivateOne;
use App\Livewire\Search;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Profile;
use App\Livewire\ShowArticle;
use Illuminate\Support\Facades\Route;

Route::get('/greeter', Greeter::class);
Route::get('/search', Search::class);
Route::get('/articles/{article}', ShowArticle::class);

Route::get('/', Home::class)->name('home');
// Route::get('/', function () {  //this is the standard Laravel boilerplate page.
//    return view('welcome');
// });

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('posts', PostList::class)->name('posts');
Route::get('posts/create', PostForm::class)->name('posts.create');
Route::get('posts/{post}/view', PostForm::class)->name('posts.view');
Route::get('posts/{post}/edit', PostForm::class)->name('posts.edit');

Route::middleware(['auth'])->group(function (): void {

    // Impersonations
    Route::post('/impersonate/{user}', [ImpersonationController::class, 'store'])->name('impersonate.store')->middleware('can:impersonate');
    Route::delete('/impersonate/stop', [ImpersonationController::class, 'destroy'])->name('impersonate.destroy');

    // Settings
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', \App\Livewire\Settings\Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('settings/locale', \App\Livewire\Settings\Locale::class)->name('settings.locale');

    // Admin

    Route::middleware(['auth', 'verified', 'can:is-super-admin'])->group(function () {
        Route::get('/privateone', PrivateOne::class);
        // Add more routes here...
    });

    Route::prefix('admin')->as('admin.')->group(function (): void {
        Route::get('/', Index::class)->middleware(['auth', 'verified'])->name('index')->middleware('can:access dashboard');
        Route::get('/users', Users::class)->name('users.index')->middleware('can:view users');
        Route::get('/users/create', CreateUser::class)->name('users.create')->middleware('can:create users');
        Route::get('/users/{user}', ViewUser::class)->name('users.show')->middleware('can:view users');
        Route::get('/users/{user}/edit', EditUser::class)->name('users.edit')->middleware('can:update users');
        Route::get('/roles', Roles::class)->name('roles.index')->middleware('can:view roles');
        Route::get('/roles/create', CreateRole::class)->name('roles.create')->middleware('can:create roles');
        Route::get('/roles/{role}/edit', EditRole::class)->name('roles.edit')->middleware('can:update roles');
        Route::get('/permissions', Permissions::class)->name('permissions.index')->middleware('can:view permissions');
        Route::get('/permissions/create', CreatePermission::class)->name('permissions.create')->middleware('can:create permissions');
        Route::get('/permissions/{permission}/edit', EditPermission::class)->name('permissions.edit')->middleware('can:update permissions');
    });
});

require __DIR__.'/auth.php';
