<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePageDescriptionsTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_id')->index();
            $table->unsignedInteger('language_id');
            $table->string('title', 60)->default('');
            $table->text('description')->nullable();
            $table->string('meta_h1', 60)->default('');
            $table->string('meta_title', 100)->default('');
            $table->string('meta_description', 300)->default('');
            $table->string('meta_keywords', 240)->default('');
            $table->unique(['page_id', 'language_id']);
        });

        $this->callSeed('PageDescriptionsTable');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_descriptions');
    }
}
