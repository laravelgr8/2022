first you run command 
php artisan make:command showDB

now you goto app->console->command folder
open your file

protected $signature = 'showDB';  //it is your command name

protected $signature = 'getDB {id}';   //if you want to pass data

public function handle()
{
    $this->info(DB::connection()->getDatabaseName());
    
    //if you want to fetch data
    $id = $this->argument('id');
    $data=DB::table('users')->where('id',$id)->get();
    $this->info($data);
}

now php artisan showDB

now php artisan showDB 12
