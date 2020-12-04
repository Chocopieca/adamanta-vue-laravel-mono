<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUseDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_use_descriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_use_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->string('description', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_use_descriptions');
    }
}
