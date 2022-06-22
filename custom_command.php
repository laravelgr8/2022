first you run command 
php artisan make:command showDB

now you goto app->console->command folder
open your file

protected $signature = 'showDB';  //it is your command name

public function handle()
{
    $this->info(DB::connection()->getDatabaseName());
}

now php artisan showDB
