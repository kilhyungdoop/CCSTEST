<?php
namespace Model\Progress;

use \Util\companydb;
use \Util\mongo;

class Confirm extends \Model
{
    public static $params = array();
    public static $response = array();

    /*
     * エントリリストメイン処理
     */
    public static function run () {
        $params = self::$params;

        $company_name = companydb::getCompanyName($params['progress_menu']);
        self::$response['company_name_ja'] = $company_name[0]['name'];
        self::$response['entry_status_ja'] = mongo::searchEntryStatusJapanese($params['e_status']);

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
