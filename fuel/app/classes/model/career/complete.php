<?php
namespace Model\Career;

use \Util\companydb;
use \Util\entrydb;

class Complete extends \Model
{
	private static $params;

	public static function run() {

		// パラメータ取得
		$request_params = Complete::$params;

		// イメージをS3に保存、ファイル名を決めて会社情報登録メソッドに渡す

		if (empty($request_params['entry_id']) === false && empty($request_params['company_id']) === false) {
			$entry_id = $request_params['entry_id'];
			$company_id = $request_params['company_id'];
			companydb::updateCompanyData($request_params);
			entrydb::updateEntryData($request_params);

		} else {
			// 会社情報登録
			$company_id = companydb::insertCompanyData($request_params);
			// エントリテーブル登録
			$result = entrydb::insertEntryData($request_params, $company_id);
			$entry_id = $result[0];
		}

		if (empty($request_params['c_logo']) === false) {
			list(, $user_id) = \Auth::get_user_id();
			// ロゴ名取得
			$new_logo_name = self::createNewLogoName($request_params['c_logo'], $entry_id);
			// 一時保存からイメージ移動
			self::moveLogoImage($user_id, $request_params['c_logo'], $new_logo_name);
			// イメージ名登録
			companydb::updateCompanyLogoPath($company_id, $new_logo_name);
		}

        return $entry_id;
	}

	/**
	 * イメージ移動
	 */
    private static function moveLogoImage ($user_id, $tmp_image, $new_image_name) {
		$new_path = IMAGE_PATH. $user_id;
		// 該当フォルダが存在しない場合は作成する
		if (file_exists($new_path) === false) {
			mkdir($new_path);
		}
		// ファイル移動
		rename(IMAGE_TEMP_PATH. $tmp_image, $new_path. '/'. $new_image_name);
	
    }

    private static function createNewLogoName ($tmp_name, $entry_id) {
        $img_arr = explode('.', $tmp_name);
        $ext = $img_arr[1];
        $image_file_name = 'c_logo_'. $entry_id. '_'. time(). '.'. $ext;
        return $image_file_name;
    }

    public static function setParams($params) {
        Complete::$params = $params;
    }

}

