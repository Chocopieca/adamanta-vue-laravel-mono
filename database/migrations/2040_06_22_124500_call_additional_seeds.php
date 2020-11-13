<?php

class CallAdditionalSeeds extends BaseMigration
{
    public function up()
    {
        \Illuminate\Support\Facades\Artisan::call('passport:install', ['--force' => '']);
    }
}
