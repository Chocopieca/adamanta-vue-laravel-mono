<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default(0)->index();
            $table->string('slug', 60)->unique();
            $table->string('image', 100)->nullable();
            $table->boolean('active')->unsigned()->default(0);
            $table->unsignedInteger('creator_id')->default(0)->index();
            $table->softDeletes();
            $this->timestamps($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
