<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePageModulesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('module_id')->index();
            $table->unsignedInteger('page_id')->index();
            $table->boolean('enabled')->default(1);
            $table->integer('order')->default(0);
        });

        $this->callSeed('PageModulesTable');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_modules');
    }
}
