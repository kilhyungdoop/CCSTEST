<?php
namespace Model\Recruit;

use \Util\recruitdb;

class Rlist extends \Model
{
    private static $user_id;
    private static $params;
    private static $result;

    public static function run() {

        // パラメータ取得
        //$request_params = self::$params;

        self::$result = recruitdb::getRecruitCompanyList(self::$user_id);

    }

    public static function getResult() {
        return self::$result;
    }

    public static function setParams($params) {
        self::$params = $params;
    }

    public static function setUserId($user_id) {
        self::$user_id = $user_id;
    }

}

