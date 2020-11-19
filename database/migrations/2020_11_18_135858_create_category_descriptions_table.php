<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryDescriptionsTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->index();
            $table->unsignedInteger('language_id');
            $table->string('name', 60)->default('');
            $table->text('description')->nullable();
            $table->string('meta_h1', 60)->default('');
            $table->string('meta_title', 100)->default('');
            $table->string('meta_description', 300)->default('');
            $table->string('meta_keywords', 240)->default('');
            $table->unique(['category_id', 'language_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_descriptions');
    }
}
