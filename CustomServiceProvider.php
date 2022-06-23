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
public function test(AddServiceProvider $addservice)
{
    return $addservice->add(10,4);
}
