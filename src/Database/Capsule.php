<?php

namespace App\Database;

// use Illuminate\Container\Container;
// use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Capsule\Manager as CapsuleManager;

class Capsule
{
    private $capsule;

    public function __construct()
    {
        $this->capsule = new CapsuleManager;

        $this->capsule->addConnection([
            'driver' => 'mysql',
            'host' => getenv('DB_HOST'),
            'database' => getenv('DB_NAME'),
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PASS'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
        ]);

        // Make this Capsule instance available globally via static methods... (optional)
        $this->capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $this->capsule->bootEloquent();
    }

    public function getCapsule()
    {
        return $this->capsule;
    }
}
