<?php
namespace Model\Auth;

use Auth\Auth;
use Fuel\Core\Session;

class Login extends \Model
{
    public static $params = array();

    public static $err_msg = '';

    /**
     * @return array
     */
    public static function getErrMsg()
    {
        return self::$err_msg;
    }

    /**
     * @param array $params
     */
    public static function setParams($params)
    {
        self::$params = $params;
    }

    public static function run () {
        $params = self::$params;

        if (self::loginCheck($params['username'], $params['password']) === false) {
            return false;
        }
        Session::set('is_login', true);
        return true;
    }

    /**
     * @param $username string ユーザ名
     * @param $password string パラメータ
     * @return bool
     */
    private static function loginCheck ($username, $password) {
        $auth = Auth::instance();
        if ($auth->login($username, $password) === false) {
            self::$err_msg = 'ユーザ名または、パスワードが違います。';
            return false;
        }
        return true;
    }
}
?>
