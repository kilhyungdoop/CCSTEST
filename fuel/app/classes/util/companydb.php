<?php
namespace Util;

class CompanyDb
{
    /**
     * エントリ企業名取得
     * param user_id int ユーザID
     */
    public static function getCompanyName ($entry_id) {
        return \DB::select('company.name')
            ->from('entry')
            ->join('company', 'LEFT')
            ->on('entry.company_id', '=', 'company.company_id')
            ->where('entry_id', $entry_id)
            ->execute()->as_array();
    }


    /*
     * 会社情報登録
     * @params db_params array リクエストパラメータ
     * @retrun $result[0] string 登録レコードの主キー
     */
    public static function insertCompanyData($db_params) {
        $company_params = array(
            'name' => $db_params['c_name'],
            //'image_path' => $db_params['c_logo'],
            'info' => $db_params['c_info'],
            'place' => $db_params['c_place'],
            'homepage' => $db_params['home_page'],
            'r_datetime' => date('Y-m-d G:i:s'),
        );
        $result = \DB::insert('company')->set($company_params)->execute();
        // 多分　0: 主キー 1:登録件数
        return $result[0];

    }

     public static function updateCompanyData($db_params) {
        $company_params = array(
            'name' => $db_params['c_name'],
            'info' => $db_params['c_info'],
            'place' => $db_params['c_place'],
            'homepage' => $db_params['home_page'],
            'r_datetime' => date('Y-m-d G:i:s'),
        );
        return \DB::update('company')
            ->set($company_params)
            ->where('company_id', $db_params['company_id'])
            ->execute();
    }

     public static function updateCompanyLogoPath($company_id,$logo_name) {
        $company_params = array(
            'image_path' => $logo_name,
        );
        return \DB::update('company')
            ->set($company_params)
            ->where('company_id', $company_id)
            ->execute();
    }
}
?>
