<?php
namespace Model\Recruit;

use \Util\recruitdb;

class Rdelete extends \Model
{
    private static $user_id;
    private static $params;

    public static function run() {

        // パラメータ取得
        $request_params = self::$params;
        if (empty($request_params['rc_id']) === false) {
            recruitdb::deleteRecruitCompanyInfoa($request_params['rc_id']);
        }

    }

    public static function setParams($params) {
        self::$params = $params;
    }

    public static function setUserId($user_id) {
        self::$user_id = $user_id;
    }

}

