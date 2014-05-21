<?php

namespace Model\Career;
use \Util\entrydb;
use \Util\progressdb;

class EntryDelete extends \Model
{
	// リクエストパラメータ
    private static $params;

    public static function run() {

        // パラメータ取得
        $request_params = EntryDelete::$params;

		// DB削除
		if (isset($request_params['entry_id']) === true && empty($request_params['entry_id']) === false) {
			$entry_id = intval($request_params['entry_id']);
			// entryテーブル削除
			EntryDb::deleteEntryData($entry_id);
			progressDb::deleteProgressData($entry_id);
		}
		if (isset($request_params['company_id']) === true && empty($request_params['company_id']) === false) {
			$company_id = intval($request_params['company_id']);
			// companyテーブル削除
			EntryDb::deleteCompanyData($company_id);
		}


		// ロゴ削除
		if (isset($request_params['logo_path']) === true && empty($request_params['logo_path']) === false) {
			self::deleteCompanyLogo($request_params['logo_path']);
		}
    }

	/**
	 * 会社ロゴを削除する。
	 */
	private static function deleteCompanyLogo ($logo_name) {
		list(, $user_id) = \Auth::get_user_id();
		$logo_path = IMAGE_PATH. $user_id. '/'. $logo_name;
		if (file_exists($logo_path) === true) {
			unlink($logo_path);
		}
	}

	/**
	 * リクエストパラメータ設定
	 */
    public static function setParams($params) {
        EntryDelete::$params = $params;
    }

}

