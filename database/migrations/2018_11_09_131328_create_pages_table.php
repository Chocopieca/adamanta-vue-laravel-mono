<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_type_id')->default(1);
            $table->string('slug', 60)->unique();
            $table->boolean('home')->unsigned()->default(0);
            $table->boolean('active')->unsigned()->default(0);
            $table->boolean('show_title')->unsigned()->default(1);
            $table->boolean('no_index')->unsigned()->default(0);
            $table->integer('order')->default(0);
            $this->timestamps($table);

            $table->index('page_type_id');
        });

        $this->callSeed('PagesTable');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
