<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 40);
            $table->string('url', 60);
            $table->string('name', 100);
            $table->boolean('for_all')->default(0);
            $table->boolean('show_title')->default(0);
            $table->integer('order')->default(0);
            $table->boolean('position')->default(0);
        });

        $this->callSeed('Module');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
