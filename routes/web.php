<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login', [LoginController::class, 'auth'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        // Artisan::call('config:cache');
        Artisan::call('route:clear');
        // Artisan::call('view:cache');
        return Inertia::render('Home');
    });
    Route::get('/users', function () {
        // Artisan::call('config:cache');
        Artisan::call('route:clear');
        // return User::paginate(10);
        // Artisan::call('view:cache');
        return Inertia::render('Users/Index', [
            'users' => User::query()->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
                ->paginate(10)
                ->appends(Request::all())
                ->through(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                    ];
                }),
            'filters' => Request::only(['search'])
        ]);
    });
    Route::get('/users/create', function () {
        // Artisan::call('config:cache');
        Artisan::call('route:clear');
        // Artisan::call('view:cache');
        return Inertia::render('Users/Create');
    });
    Route::post('/users', function () {
        Artisan::call('route:clear');
        // return Inertia::render('Users/Create');
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        User::create($attributes);
        return redirect('/users');
    });
    Route::get('/settings', function () {
        // Artisan::call('config:cache');
        Artisan::call('route:clear');
        // Artisan::call('view:cache');
        return Inertia::render('Settings');
    });
    // Route::post('/logout', function () {
    //     // Artisan::call('config:cache');
    //     Artisan::call('route:clear');
    //     // // Artisan::call('view:cache');
    //     // return Inertia::render('Settings');
    //     dd(request());
    //     dd("Logging User Out");
    // });
});
