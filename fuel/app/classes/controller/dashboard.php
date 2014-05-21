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

use \Model\Recruit\Complete;
use \Model\Dashboard\Home;
use \Util\recruitdb;

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */

/*
 * action_listのurl
 */
define('MAIN_URL', 'http://shokusapo.com/career/entrylist');

/*
 * 進捗管理
 */
class Controller_dashboard extends Controller
{

	public $common_view;

	private $user_id;

    public function before() {
        // ログイン状態か確認
        if (Auth::check() === false) {
            Response::redirect('http://shokusapo.com/auth/login');
        }

		list(, $this->user_id) = Auth::get_user_id();

	    // 共通テンプレート設定
		$view = View::forge('common/new_layout');
		$view->set('head', View::forge('common/head'));
		$view->set('header', View::forge('common/header'));
        // 実行中のアクション取得
        $action_name = Request::active()->action;
		$view->set('sidebar', View::forge('common/sidebar', array('action_name' => $action_name)));
		$view->set('js', View::forge('common/nvd3_js'));
		$this->common_view = $view;
    }

     /**
     * ホーム
     */
    public function action_home ()
    {
        $params = input::post();

		Home::setParams($params);
		Home::$user_id = $this->user_id;
		Home::run();
        $data['params'] = Home::getResult();

        $this->common_view->set('content', View::forge('dashboard/home', $data));
        return $this->common_view;
    }

    /**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		//return Response::forge(ViewModel::forge('welcome/404'), 404);
	}

}
