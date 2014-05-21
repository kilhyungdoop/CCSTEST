<?php
namespace Model\Career;
use Auth\Auth;
use \Util\mongo;

class Confirm extends \Model
{
    public static $image_path = '';
    public static $request = array();

    /**
     * @return array
     */
    public static function getRequest()
    {
        return self::$request;
    }

    /**
     * @param array $request
     */
    public static function setRequest($request)
    {
        self::$request = $request;
    }

    public static function run () {
        $logo_info = $_FILES['c_logo']['name'];
        if (empty($logo_info) === FALSE) {
            // ファイル名
            $image_name = Confirm::createLogoName($_FILES['c_logo']['name']);
            move_uploaded_file($_FILES['c_logo']['tmp_name'], IMAGE_TEMP_PATH. $image_name);

			// イメージリサイズ
			//\Image::load(IMAGE_PATH. $image_name)->resize(120);

            Confirm::$image_path  = $image_name;
        }

        // 各種日本語名設定
        self::$request['job_type'] = mongo::searchJobTypeJapanese(self::$request['job_type']);
        self::$request['e_status'] = mongo::searchEmployeeStatusJapanese(self::$request['e_status']);

        $rc_info = explode(':', self::$request['recruit_company']);
        self::$request['recruit_company'] = $rc_info[0];
        self::$request['recruit_company_ja'] = $rc_info[1];
    }

    public static function createConfirmValue ($post_val) {
		foreach ($post_val as $key => $val) {
			if (empty($post_val[$key]) === true) {
				$post_val[$key] = 'not input field.';
			}
		}
		return $post_val;
	}

    public static function createLogoName ($tmp_name) {
        $img_arr = explode('.', $tmp_name);
        $ext = $img_arr[1];
        list(, $user_id) = Auth::get_user_id();
        $image_file_name = $user_id. '_'. time(). '.'. $ext;
        return $image_file_name;
    }
}
?>
