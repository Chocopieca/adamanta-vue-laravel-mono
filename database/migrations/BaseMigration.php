<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Traits\RawTrait;

class BaseMigration extends Migration
{
    use RawTrait;

    /**
     * @param $name
     */
    protected function callSeed($name)
    {
        Artisan::call('db:seed', ['--class' => $name . Seeder::class]);
    }

    /**
     * @param $table
     */
    protected function timestamps($table)
    {
        $table->timestamp('created_at')->default(self::currentTimestamp());
        $table->timestamp('updated_at')->default(self::onUpdateTimestamp());
    }

    /**
     * @param $data
     */
    protected function upForeign($data)
    {
        $foreignKeys = \DB::table('INFORMATION_SCHEMA.KEY_COLUMN_USAGE')
            ->select('CONSTRAINT_NAME')
            ->where([
                'REFERENCED_TABLE_SCHEMA' => 'karree',
            ])
            ->get()
            ->pluck('CONSTRAINT_NAME')->toArray();

        foreach ($data as $table => $fields) {
            foreach ($fields as $field) {
                try {
                    if (!in_array($table . '_' . $field['foreign'] . 'foreign', $foreignKeys)) {
                        Schema::table($table, function (Blueprint $table) use ($field) {
                            $ref = isset($field['ref']) ? $field['ref'] : 'id';

                            $on = $table->foreign($field['foreign'])
                                ->references($ref)->on($field['on']);

                            if (isset($field['delete'])) {
                                $on->onDelete($field['delete']);
                            }
                        });
                    }
                } catch (Exception $e) {
                    //
                }
            }
        }
    }

    /**
     * @param $tables
     * @param $field
     */
    protected function downForeign($tables, $field)
    {
        foreach ($tables as $table) {
            try {
                Schema::table($table, function (Blueprint $that) use ($field, $table) {
                    $that->dropForeign($table.'_'.$field.'_foreign');
                });
            } catch (Exception $e) {
                //
            }
        }
    }
}
