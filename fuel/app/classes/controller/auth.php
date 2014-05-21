<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.6
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */

use \Model\Auth\Complete;
use \Model\Auth\Login;
/**
 * 認証コントローラー
 */
class Controller_Auth extends Controller
{
    /**
     * ログアウト
     */
    public function action_logout ()
    {
        Auth::logout();
        Response::redirect('http://shokusapo.com/auth/login');
    }

    /**
     * ログインページ
     */
    public function action_login ()
    {
        if (count(input::post()) > 0) {
            Login::setParams(input::post());
            if (Login::run() === false) {
                $data['params'] = input::post();
                $data['err_msg'] = Login::getErrMsg();
                return Response::forge(View::forge('auth/login', $data));
            }
            Response::redirect('http://shokusapo.com/dashboard/home');
        }
        return Response::forge(View::forge('auth/login'));
    }

    /**
     * ユーザ登録
     */
    public function action_adduser ()
    {
        return Response::forge(View::forge('auth/adduser'));
    }

    /**
     * ユーザ登録確認
     */
    public function action_adduser_confirm ()
    {
		$validation = Validation::forge();
		$validation->add_field('username', 'ユーザ名', 'required|max_length[20]');
		$validation->add_field('email', 'メールアドレス', 'required|valid_email|max_length[50]');
		$validation->add_field('password', 'パスワード', 'required|min_length[6]|max_length[50]');
		$err_msg = '';
		if ($validation->run() === false) {
			$err_msg = $validation->show_errors();
		}

		// 相関チェック
		$check_msg = $this->correlationCheck(input::post());
		if (empty($check_msg) === false) {
			$err_msg .= $check_msg;
		}

		// 画面表示
		if (empty($err_msg) === true) {
        	return Response::forge(View::forge('auth/adduser_confirm', input::post()));
		} else {
            $view = View::forge('auth/adduser');
            $view->set('val', input::post());
            $view->set_global('err_msg', $err_msg, false);
            return $view;
		}
    }

	/**
	 * 相関チェック
	 */
	public function correlationCheck ($params)
	{
		$msg = array();

		// すでに存在しているユーザ名またはメールアドレスか確認
		if (empty($params['username']) === false || empty($params['email']) === false) {
			$sql = 'select id from users where username = :username or email = :email';
			$db_params = array('username' => $params['username'], 'email' => $params['email']);
			$query = \DB::query($sql);;
			$query->parameters($db_params);
			$result = $query->execute()->as_array();
			if (isset($result[0]['id']) === true && empty($result[0]['id']) === false) {
				$msg[] = '別のユーザ名または、メールアドレスを入力してください';
			}
		}

		if ($params['password'] !== $params['check_password']) {
			$msg[] = '確認パスワードが違います';
		}

		return count($msg) > 0 ? implode('<br>', $msg) : '';
	}

    /**
     * ユーザ登録確認
     */
    public function action_adduser_complete ()
    {
        Complete::setParam(input::post());
        Complete::run();
        Response::redirect('http://shokusapo.com/auth/login');
    }

    /**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
