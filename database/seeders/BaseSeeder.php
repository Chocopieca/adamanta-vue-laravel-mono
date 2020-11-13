<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseSeeder extends Seeder
{
    /**
     * @param $table
     * @param $insert
     * @param $images
     * @param $runForProd
     */
    public function rebuildTable($table, $insert, $images = false, $runForProd = true)
    {
        if ($runForProd || (!$runForProd && !app()->environment('production'))) {
            DB::table($table)->delete();
            DB::statement('ALTER TABLE ' . $table . ' AUTO_INCREMENT = 1;');
            DB::table($table)->insert($insert);

            if ($images) {
                $this->copyImages((isset($images[0]) ? $images[0] : ''), (isset($images[1]) ? $images[1] : ''));
            }
        }
    }

    public function copyImages($from, $to = '')
    {
        //Copy start imges to storage
        \File::copyDirectory(
            resource_path('/seeds/images/' . $from),
            \Storage::disk('admin')->path('images/' . $to)
        );
    }
}
