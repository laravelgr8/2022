Step 1 :-
Create A folder In App Like 'Suman' and create a file like Invoice.php
Invoice.php
<?php
namespace App\Suman;
use Carbon\Carbon;
  
class Invoice {
    public function companyName(){
        return 'Theequicom pvt ltd';
    }
 
}


Step 2 :-
Create another file in app->suman foler like InvoiceFacade.php
<?php
  
namespace App\Suman;
  
use Illuminate\Support\Facades\Facade;
  
class InvoiceFacade extends Facade{
    protected static function getFacadeAccessor() 
    { 
    	return 'invoice'; 
    }
}


Step 3:-
Create a service provider class
php artisan make:provider SumanServiceProvider

it's create a file in app->provider 
use App\Suman\Invoice;
public function boot()
{
    $this->app->bind('invoice',function(){
        return new Invoice();
    });
}


Now go to app->confic
provider section
App\Providers\SumanServiceProvider::class,

aliases section
'Invoice'=> App\Suman\InvoiceFacade::class


echo Invoice::companyName();





