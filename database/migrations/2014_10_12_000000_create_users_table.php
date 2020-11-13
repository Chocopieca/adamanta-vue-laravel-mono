<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('role_id')->default(1);
            $table->string('first_name', 40);
            $table->string('last_name', 40)->default('');
            $table->string('patronymic', 40)->default('');
            $table->string('phone', 20)->default('');
            $table->string('country', 60)->default('');
            $table->string('city', 60)->default('');
            $table->string('email')->unique();
            $table->string('photo', 80)->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('subscribe')->unsigned()->default(0);
            $table->boolean('active')->unsigned()->default(0);
            $table->string('token', 254)->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $this->timestamps($table);

            $table->index('role_id');
        });

        $this->callSeed('Users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
