<?php
namespace Model\interview;

use \Util\companydb;

class Confirm extends \Model
{
    public static $params = array();
    public static $response = array();

    /*
     * エントリリストメイン処理
     */
    public static function run () {
        $params = self::$params;

        $company_name = companydb::getCompanyName($params['c_menu']);
        self::$response['company_name_ja'] = $company_name[0]['name'];

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
