<?php
namespace Util;

class recruitdb
{
    // 削除
    public static function deleteRecruitCompanyInfoa ($recruit_id) {
 		return \DB::delete('recruit_company')
			->where('rc_id', $recruit_id)
			->execute();
    }

    /**
     * 利用紹介会社件数取得
     * param user_id int ユーザID
     */
    public static function getRecruitCompanyCount ($user_id) {
		return \DB::select(\DB::expr('COUNT(*) as count'))
			->from('recruit_company')
			->where('user_id', $user_id)
			->execute()->as_array();
    }

	public static function getRecruitCompanyList ($user_id) {
		$result = \DB::select()
            ->from('recruit_company')
			->where('user_id', $user_id)
			->execute()->as_array();

		return $result;
	}

	public static function getRecruitCompanyInfo ($recruit_id) {
		$result = \DB::select()
            ->from('recruit_company')
			->where('rc_id', $recruit_id)
			->execute()->as_array();

		return $result[0];
	}

    /*
     * 紹介会社情報登録
     * @params user_id string ユーザID
     * @params db_params array リクエストパラメータ
     * @retrun $result[0] string 登録レコードの主キー
     */
    public static function insertRecruitCompanyData($user_id, $db_params) {
        $params = array(
			'user_id' => $user_id,
			'rc_name' => $db_params['rc_name'],
			'rc_place' => $db_params['rc_place'],
			'rc_mng_name' => $db_params['rc_mng_name'],
			'rc_mng_tel' => $db_params['rc_mng_tel'],
			'rc_mng_mail' => $db_params['rc_mng_mail'],
            'create_at' => date('Y-m-d G:i:s')
        );
        $result = \DB::insert('recruit_company')->set($params)->execute();
        // 多分　0: 主キー 1:登録件数
        return $result[0];

    }

    public static function updateRecruitCompanyData($user_id, $db_params) {
         $params = array(
			'user_id' => $user_id,
			'rc_name' => $db_params['rc_name'],
			'rc_place' => $db_params['rc_place'],
			'rc_mng_name' => $db_params['rc_mng_name'],
			'rc_mng_tel' => $db_params['rc_mng_tel'],
			'rc_mng_mail' => $db_params['rc_mng_mail'],
        );
        return \DB::update('recruit_company')
            ->set($params)
            ->where('rc_id', $db_params['rc_id'])
            ->execute();
    }

}
?>
