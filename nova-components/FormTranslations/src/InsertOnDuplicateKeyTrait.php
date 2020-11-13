<?php
namespace CustomComponent\FormTranslations;

use Illuminate\Support\Facades\DB;

trait InsertOnDuplicateKeyTrait
{
    /**
     * Insert using mysql ON DUPLICATE KEY UPDATE.
     * @link http://dev.mysql.com/doc/refman/5.7/en/insert-on-duplicate.html
     *
     * Example:  $data = [
     *     ['id' => 1, 'name' => 'John'],
     *     ['id' => 2, 'name' => 'Mike'],
     * ];
     *
     * @param array $data is an array of array.
     * @param array $updateColumns NULL or [] means update all columns
     *
     * @return int 0 if row is not changed, 1 if row is inserted, 2 if row is updated
     */
    public static function insertOnDuplicateKey($table, array $data, array $updateColumns = null, $def = [])
    {
        if (empty($data)) {
            return false;
        }
        // Case where $data is not an array of arrays.
        if (!isset($data[0])) {
            $data = [$data];
        }

        return DB::statement(
            static::buildInsertOnDuplicateSql($table, $data, $updateColumns, $def),
            static::inLineArray($data)
        );
    }
    /**
     * Insert using mysql INSERT IGNORE INTO.
     *
     * @param array $data
     *
     * @return int 0 if row is ignored, 1 if row is inserted
     */
    public static function insertIgnore(array $data, $def = [])
    {
        if (empty($data)) {
            return false;
        }
        // Case where $data is not an array of arrays.
        if (!isset($data[0])) {
            $data = [$data];
        }

        return DB::statement(static::buildInsertIgnoreSql($data, $def), static::inLineArray($data));
    }
    /**
     * Insert using mysql REPLACE INTO.
     *
     * @param array $data
     * @param array $def
     *
     * @return int 1 if row is inserted without replacements, greater than 1 if rows were replaced
     */
    public static function replace($data = [], $def = [])
    {
        if (empty($data)) {
            return false;
        }
        // Case where $data is not an array of arrays.
        if (!isset($data[0])) {
            $data = [$data];
        }

        return DB::statement(static::buildReplaceSql($data, $def), static::inLineArray($data));
    }
    /**
     * Static function for getting table name.
     *
     * @return string
     */
    public static function getTableName()
    {
        $class = get_called_class();
        dd($class);
        return (new $class())->getTable();
    }
    /**
     * Build the question mark placeholder.  Helper function for insertOnDuplicateKeyUpdate().
     * Helper function for insertOnDuplicateKeyUpdate().
     *
     * @param $data
     *
     * @return string
     */
    protected static function buildQuestionMarks($data, $def)
    {
        $values = '';
        foreach ($data as $key => $row) {
            $new = '';
            foreach ($row as $ck => $column) {
                $new .= isset($def[$ck]) ? $def[$ck] : '?';
                $new .= ',';
            }

            end($data);
            $coma = $key !== key($data) ? ',' : '';

            $values .= '('.trim($new, ',').')'.$coma;
        }

        return $values;
    }
    /**
     * Get the first row of the $data array.
     *
     * @param array $data
     *
     * @return mixed
     */
    protected static function getFirstRow(array $data)
    {
        if (empty($data)) {
            throw new \InvalidArgumentException('Empty data.');
        }
        list($first) = $data;
        if (!is_array($first)) {
            throw new \InvalidArgumentException('$data is not an array of array.');
        }
        return $first;
    }
    /**
     * Build a value list.
     *
     * @param array $first
     *
     * @return string
     */
    protected static function getColumnList(array $first)
    {
        if (empty($first)) {
            throw new \InvalidArgumentException('Empty array.');
        }
        return implode(', ', array_keys($first));
    }
    /**
     * Build a value list.
     *
     * @param array $first
     *
     * @return string
     */
    protected static function buildValuesList(array $first)
    {
        $out = [];
        foreach (array_keys($first) as $key) {
            $out[] = sprintf('`%s` = VALUES(`%s`)', $key, $key);
        }
        return implode(', ', $out);
    }
    /**
     * Inline a multiple dimensions array.
     *
     * @param $data
     *
     * @return array
     */
    protected static function inLineArray(array $data)
    {
        return call_user_func_array('array_merge', array_map('array_values', $data));
    }
    /**
     * Build the INSERT ON DUPLICATE KEY sql statement.
     *
     * @param array $data
     * @param array $updateColumns
     *
     * @return string
     */
    protected static function buildInsertOnDuplicateSql($table, array $data, array $updateColumns = null, $def = [])
    {
        $first = static::getFirstRow($data);
        $sql  = 'INSERT INTO '.$table
            .'(' . static::getColumnList($first).') VALUES'.PHP_EOL
            .static::buildQuestionMarks($data, $def).PHP_EOL
            .'ON DUPLICATE KEY UPDATE ';

        if (empty($updateColumns)) {
            $sql .= static::buildValuesList($first);
        } else {
            $sql .= static::buildValuesList(array_combine($updateColumns, $updateColumns));
        }

        return $sql;
    }
    /**
     * Build the INSERT IGNORE sql statement.
     *
     * @param array $data
     *
     * @return string
     */
    protected static function buildInsertIgnoreSql(array $data, $def)
    {
        return 'INSERT IGNORE INTO '.static::getTableName()
            .'('.static::getColumnList(static::getFirstRow($data)).') VALUES' . PHP_EOL
            .static::buildQuestionMarks($data, $def);
    }
    /**
     * Build REPLACE sql statement.
     *
     * @param array $data
     *
     * @return string
     */
    protected static function buildReplaceSql(array $data, $def)
    {
        return 'REPLACE INTO '.static::getTableName()
            .'('.static::getColumnList(static::getFirstRow($data)).') VALUES'.PHP_EOL
            .static::buildQuestionMarks($data, $def);
    }
}
