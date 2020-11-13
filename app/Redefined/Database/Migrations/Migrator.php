<?php

namespace App\Redefined\Database\Migrations;

use Illuminate\Database\Migrations\Migrator as Base;

class Migrator extends Base
{
    protected function runUp($file, $batch, $pretend)
    {
        // First we will resolve a "real" instance of the migration class from this
        // migration file name. Once we have the instances we can run the actual
        // command such as "up" or "down", or we can just simulate the action.
        $migration = $this->resolve(
            $name = $this->getMigrationName($file)
        );

        if ($pretend) {
            return $this->pretendToRun($migration, 'up');
        }

        $this->note("<comment>Migrating:</comment> {$name}");

        $this->runMigration($migration, 'up');

        //This condition is added for ignore record about migration
        if(isset($migration->log) ? $migration->log : true) {
            // Once we have run a migrations class, we will log that it was run in this
            // repository so that we don't try to run it next time we do a migration
            // in the application. A migration repository keeps the migrate order.

            $this->repository->log($name, $batch);
        }

        $this->note("<info>Migrated:</info>  {$name}");
    }
}