<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->string('slug', 140)->unique();
            $table->string('image', 100)->nullable();
            $table->boolean('availability')->unsigned()->default(0);
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
        Schema::dropIfExists('products');
    }
}
