<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait DbBatch
{
    /**
     * Update multiple rows
     * @param string $table Table
     * @param array $values Values
     * @param string $index Index
     *
     * Example
     *
     * $table = 'users';
     * $value = [
     *      [
     *          'id' => 1,
     *          'status' => 'active',
     *          'nickname' => 'Mohammad'
     *      ] ,
     *      [
     *          'id' => 5,
     *          'status' => 'deactive',
     *          'nickname' => 'Ghanbari'
     *      ] ,
     * ];
     *
     * $index = 'id';
     *
     * @return mixed
     */
    public static function updateBatch($table, $values, $index)
    {
        $final  = [];
        $ids    = [];

        if (!count($values)) {
            return false;
        }

        if (!isset($index) && empty($index)) {
            return false;
        }

        foreach ($values as $key => $val)
        {
            $ids[] = $val[$index];
            foreach (array_keys($val) as $field)
            {
                if ($field !== $index)
                {
                    $final[$field][] = 'WHEN `'
                        . $index
                        . '` = "'
                        . $val[$index]
                        . '" THEN '
                        . (is_null($val[$field]) ? 'NULL' : '"' . self::mysql_escape($val[$field]) . '"')
                        . ' ';
                }
            }
        }

        $cases = '';
        foreach ($final as $k => $v)
        {
            $cases .=  '`'. $k.'` = (CASE '. implode("\n", $v) . "\n"
                . 'ELSE `'.$k.'` END), ';
        }

        return DB::statement(
            "UPDATE `$table` 
                    SET " . substr($cases, 0, -2) . " 
                    WHERE `$index` IN(" . '"' . implode('","', $ids) . '"' . ");"
        );
    }
    /**
     * Insert Multi rows
     * $table String
     * $columns Array
     * $values Array
     * $batchSize Int
     *
     * Example
     *
     * $table = 'users';
     *
     * $columns = [
     *      'firstName',
     *      'lastName',
     *      'email',
     *      'isActive',
     *      'status',
     * ];
     *
     * $values = [
     *      [
     *          'Mohammad',
     *          'Ghanbari',
     *          'emailSample_1@gmail.com',
     *          '1',
     *          '0',
     *      ] ,
     *      [
     *          'Saeed',
     *          'Mohammadi',
     *          'emailSample_2@gmail.com',
     *          '1',
     *          '0',
     *      ] ,
     *      [
     *          'Avin',
     *          'Ghanbari',
     *          'emailSample_3@gmail.com',
     *          '1',
     *          '0',
     *      ] ,
     * ];
     *
     * $batchSize = 500; // insert 500 (default), 100 minimum rows in one query
     *
     */
    public static function insertBatch($table, $columns, $values, $batchSize = 500)
    {
        if ((!isset($table) && empty($table)) ||
            !count($values) ||
            !count($columns) ||
            (count($columns) != count($values[0]))
        ) {
            return false;
        }

        $minChunck          = 100;
        $totalValues        = count($values);
        $batchSizeInsert    = ($totalValues < $batchSize AND $batchSize < $minChunck) ? $minChunck : $batchSize;
        $totalChunk         = ($batchSizeInsert < $minChunck) ? $minChunck : $batchSizeInsert;
        $values             = array_chunk($values, $totalChunk,true);
        foreach ($columns as $key => $column) {
            $columns[$key] = "`" . self::mysql_escape($column) . "`";
        }

        $query = [];
        foreach ($values as $value)
        {
            $valueArray = [];
            foreach ($value as $data)
            {
                foreach ($data as $key => $item)
                {
                    $item = is_null($item) ? 'NULL' : "'" . self::mysql_escape($item) ."'";
                    $data[$key]  = $item;
                }
                $valueArray[] =  '(' . implode(',', $data) . ')';
            }
            $valueString = implode(', ', $valueArray);
            $query []= "INSERT INTO `$table` (".implode(',', $columns).") VALUES $valueString;";
        }

        if(count($query))
        {
            return DB::transaction(function () use ($totalValues, $totalChunk, $query) {
                $totalQuery = 0;
                foreach ($query as $value) {
                    $totalQuery += DB::statement($value) ? 1 : 0;
                }

                return [
                    'totalRows'     =>  $totalValues,
                    'totalBatch'    =>  $totalChunk,
                    'totalQuery'    =>  $totalQuery
                ];
            });
        }

        return false;
    }

    public static function mysql_escape($inp)
    {
        if (is_array($inp)) {
            return array_map(__METHOD__, $inp);
        }

        if (!empty($inp) && is_string($inp)) {
            return str_replace(
                ['\\', "\0", "\n", "\r", "'", '"', "\x1a"],
                ['\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'],
                $inp
            );
        }

        return $inp;
    }
}
