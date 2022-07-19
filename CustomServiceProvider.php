===============================================First method =================================
Step 1 :
php artisan make:provider SiteServiceProvider

Step 2:
Go to config->app.php in provider section
'providers' => [
        ...

        App\Providers\SiteServiceProvider::class,
        
        ...
    ]


Step 3 :
create a folder in app->Repo->SiteRepo.php
<?php
namespace App\Repo;
use App\Repo\SiteRepo;
class SiteRepo
{
    public function details()
    {
        return [
            'server' => 'AWS',
            'type' => 'dedicated',
            'disk' => '1250Mb',
        ];
    }
}


Step 4: 
Now you go to provider folder and open your create service provider file
and import 
use App\Repo\SiteRepo;

public function register()
{
    $this->app->bind('SiteRepo', function($app) {
        return new SiteRepo();
    });
}


Step 5 :
On controller 
use App\Repo\SiteRepo;

public function index(SiteRepo $siterepo)
{
    $server_details = $siterepo->details();

    dd($server_details);
}
------------------
View composer: -

use Illuminate\Support\Facades\View;

public function boot()
{
    View::composer(['demo1', 'demo2'], function($view) {
        $data=DB::table('students')->get();
        $view->with('key', $data);
    });
}


Route::get('/demo1', function () {
    return view('demo1');
});

Route::get('/demo2', function () {
    return view('demo2');
});


<?php 
dd($key);
?>




================================================second method=================================
Step 1: 
create a folder in app folder App->Service
Create to file
First create interface
AddInterface.php
<?php 
namespace App\Service;

interface addInterface{
	public function add($a,$b);
}

Second file 
<?php 
namespace App\Service;
class AddServiceProvider implements AddInterface{
	public function add($a,$b)
	{
		return $a+$b;
	}
}


Step 2:
Now we create a service provider
php artisan make:provider AddServiceProvider
create a file in app->provider

use App\Service\AddInterface;
public function register()
{
    $this->app->bind('App\Service\addInterface','App\Service\AddServiceProvider');
}


Step 3:
go to app->config->app.php
provider section and import your provider
App\Providers\AddServiceProvider::class,

Step 4:
on controller 
use App\Service\AddServiceProvider;
public function test(AddServiceProvider $addservice)
{
    return $addservice->add(10,4);
}
