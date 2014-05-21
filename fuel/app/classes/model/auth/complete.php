<?php
namespace Model\Auth;

use Auth\Auth;

class Complete extends \Model
{
    public static $param = array();

    /**
     * @param array $param
     */
    public static function setParam($param)
    {
        self::$param = $param;
    }

    public static function run ()
    {
        $params = self::$param;
        self::insertUsers($params['username'], $params['password'], $params['email']);
    }

    /**
     * usersテーブル登録
     * @param string username ユーザー名
     * @param string password パスワード
     * @param string email メールアドレス
     */
    private static function insertUsers($username, $password, $email)
    {
        $auth = Auth::instance();
        $auth->create_user($username, $password, $email);
    }
}
?>
