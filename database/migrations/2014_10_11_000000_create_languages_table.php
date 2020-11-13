<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('title', 20);
            $table->string('code', 4)->unique();
            $table->string('iso_code', 8)->unique();
            $table->boolean('is_default')->default(0);
            $table->boolean('active')->default(0);
        });

        $this->callSeed('Languages');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
