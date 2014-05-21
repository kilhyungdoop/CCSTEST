<?php
namespace Model\Progress;

use \Util\progressdb;

class Complete extends \Model
{
    public static $params = array();
    public static $response = array();

    /*
     * エントリリストメイン処理
     */
    public static function run () {
        $params = self::$params;
        $progress_data = isset($params['entry_id']) === true && empty($params['entry_id']) === false
            ? progressDb::selectProgressData($params['entry_id']) : '';

        // 新規登録
        if (empty($progress_data) === true) {
            progressdb::insertProgressData($params);

        // 編集
        } else {
            progressdb::updateProgressData($params['entry_id'], $params);
        }
    }

    /**
     * @return array
     */
    public static function getResponse()
    {
        return self::$response;
    }

    /**
     * @param array $params
     */
    public static function setParams($params)
    {
        self::$params = $params;
    }
}
?>
