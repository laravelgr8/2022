On model

class McibModel extends Model {

    protected $connection= 'second_db_connection';

    protected $table = 'agencies';

}


return array(
    'connections' => array(
        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'database1',
            'username'  => 'user1',
            'password'  => 'pass1'
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),

        'second_db_connection' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'database2',
            'username'  => 'user2',
            'password'  => 'pass2'
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
    ),



How to specific database connect by query builder


$programs=DB::connection('mysql2')
->table('node')
->where('type', 'Programs')
->get();
