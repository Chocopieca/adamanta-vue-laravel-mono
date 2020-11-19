<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitSaleDescriptionsTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_sale_descriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('unit_sale_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->string('name', 10);
        });

        $this->callSeed('UnitSales');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_sale_descriptions');
    }
}
