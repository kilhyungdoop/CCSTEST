<?php
namespace Model\Progress;

use Auth\Auth;
use \Util\entrydb;

class Post extends \Model
{
    public static $params = array();
    public static $progress_menu = array();
    public static $response = array();

    /*
     * エントリリストメイン処理
     */
    public static function run () {
        // ユーザID取得
        list(, $user_id) = Auth::get_user_id();

        // エントリ企業名取得
        self::$progress_menu = entrydb::selectProgressMenuVal($user_id);

        $params = self::getParams();
		if (isset($params['progress_menu']) === true) {
			//EntryDb::selectEntryDetail();
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
     * @return array
     */
    public static function getCompanyName()
    {
        return self::$progress_menu;
    }

    /**
     * @return array
     */
    public static function getParams()
    {
        return self::$params;
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
