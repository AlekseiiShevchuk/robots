<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new DB if no exist';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $host = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');

        try {
            $conn = new \PDO("mysql:host=$host", $username, $password);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS ".env('DB_DATABASE').";";
            $conn->exec($sql);
        }
        catch(\PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
