<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PDO;

class CreateDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:database {dbname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a database with the name "dbname" param';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {

            $dbname = $this->argument('dbname');
            $connection = 'mysql';
   
            $hasDb = DB::connection($connection)
                ->select(
                    "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = "."'".$dbname."'"
                );
   
            if (empty($hasDb)) {
                DB::connection($connection)->select('CREATE DATABASE '. $dbname);
                $this->info("Database '$dbname' created for '$connection' connection");
            } else {
                $this->info("Database $dbname already exists for $connection connection");
            }

            return Command::SUCCESS;

        } catch (\Exception $e) {
            
            $this->error($e->getMessage());
            
            return Command::FAILURE;
        }
        
    }
}
