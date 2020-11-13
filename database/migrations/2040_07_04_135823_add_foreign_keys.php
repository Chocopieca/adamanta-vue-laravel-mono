<?php

class AddForeignKeys extends BaseMigration
{
    public $log = false;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->upForeign([
//            'roles' => [
//                ['foreign' => 'user_id', 'on' => 'users', 'delete' => 'cascade'],
//            ],
        ]);
    }

    public function down()
    {
        //
    }
}
