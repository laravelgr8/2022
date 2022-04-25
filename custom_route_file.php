How to Create Custom Route File in Laravel?:-


Step 1 :- 
create some file in routs folder like-
admin.php
manager.php

in admin.php
Route::get('/', function () {
    dd('Welcome to admin routes.');
});

in manager.php
Route::get('/', function () {
    dd('Welcome to Manager routes.');
});

Step 2 :-
now go to app->Providers->RouteServiceProvider.php
public function boot()
{
    $this->configureRateLimiting();

    $this->routes(function () {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
        
        Route::prefix('admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
        Route::prefix('manager')
            ->namespace($this->namespace)
            ->group(base_path('routes/manager.php')); 
    });
}

api and web pahle se rahta hai uske niche admin and manager ka prefix create kiya.

http://localhost:8000/admin/*
http://localhost:8000/manager/
