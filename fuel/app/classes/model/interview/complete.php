<?php
namespace Model\interview;

use \Util\interviewDb;

class Complete extends \Model
{
    public static $params = array();
    public static $response = array();

    /*
     * エントリリストメイン処理
     */
    public static function run () {
        $params = self::$params;
        $interview_data = isset($params['entry_id']) === true && empty($params['entry_id']) === false
            ? interviewDb::selectInterviewData($params['entry_id']) : '';

        // 新規登録
        if (empty($interview_data) === true) {
            interviewDb::insertInterviewData($params);

        // 編集
        } else {
            interviewDb::updateInterviewData($params['entry_id'], $params);
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
