<?php

class CallAdditionalSeeds extends BaseMigration
{
    public function up()
    {
        \Illuminate\Support\Facades\Artisan::call('passport:install', ['--force' => '']);

        // Only for test or local env
        if (!env('production')) {
            $this->callSeed('NovaMenuMenusTable');
            $this->callSeed('NovaMenuMenuItemsTable');
//            $this->callSeed(ModuleSubPagesTableSeeder::class);
        }
    }
}
