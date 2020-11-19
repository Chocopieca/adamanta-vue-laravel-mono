<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleSubPagesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_sub_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('module_id')->index();
            $table->string('key', 40);
        });

        $this->callSeed('ModuleSubPagesTable');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_sub_pages');
    }
}
