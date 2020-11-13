<?php

namespace App\Providers;

class MigrationServiceProvider extends \Illuminate\Database\MigrationServiceProvider
{
    public function boot()
    {
        //Set path for all migrations via directories
        $mainPath = database_path('migrations');

        $this->loadMigrationsFrom(array_merge([$mainPath], glob($mainPath . '/*' , GLOB_ONLYDIR)));
    }

    protected function registerMigrator()
    {
        $this->app->singleton('migrator', function ($app) {
            return new \App\Redefined\Database\Migrations\Migrator($app['migration.repository'], $app['db'], $app['files']);
        });
    }
}
