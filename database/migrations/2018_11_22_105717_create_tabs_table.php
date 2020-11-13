<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateTabsTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('name', 40)->default('');
            $table->string('key', 40)->default('');
            $table->string('path', 30)->default('');
            $table->string('icon', 40)->default('');
            $table->boolean('active')->unsigned()->default(1);
            $table->boolean('order')->unsigned()->default(0);

            $table->index('parent_id');
        });

        $this->callSeed('Tabs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabs');
    }
}
