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

use \Util\entryDb;
use \Util\interviewDb;
use \Model\interview\Confirm;
use \Model\interview\Complete;

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
class Controller_Interview extends Controller
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
        //$action_name = Request::active()->action;
		$view->set('sidebar', View::forge('common/sidebar', array('action_name' => 'interview')));
		$view->set('js', View::forge('common/js'));
		$this->common_view = $view;
    }

    /**
     * 編集
     * @return mixed
     */
    public function action_modify () {
        $request = input::get();
        $data['c_menu'] = entrydb::selectProgressMenuVal($this->user_id);
        $data['params'] = interviewDb::selectInterviewData($request['entry_id']);
        $data['params']['c_menu'] = $request['entry_id'];
        $data['params']['entry_id'] = $request['entry_id'];
        $this->common_view->set('content', View::forge('interview/post', $data));
        return $this->common_view;
    }

     /**
     * 紹介会社管理ページ
     */
    public function action_ipost ($err_msg='')
    {
        $params = input::post();
        $data['params'] = $params;
        if (empty($err_msg) === false) {
            $this->common_view->set_global('err_msg', $err_msg, false);
        }
        $data['c_menu'] = entrydb::selectProgressMenuVal($this->user_id);
        //var_dump($data);
        $this->common_view->set('content', View::forge('interview/post', $data));
        return $this->common_view;
    }

    /**
     * 確認ページ
     */
    public function action_confirm () {
        $params = input::post();
        // check field
        $validation = Validation::forge();
        $validation->add_field('c_menu', '企業名', 'required');

        if ($validation->run()) {
            Confirm::setParams($params);
            Confirm::run();
            $result = Confirm::getResponse();
            $params['company_name_ja'] = $result['company_name_ja'];
            $this->common_view->set('content', View::forge('interview/confirm', $params));
            return $this->common_view;

        } else {
            return $this->action_ipost($validation->show_errors());
        }
    }

    public function action_complete () {
        $params = input::post();
        Complete::setParams($params);
        Complete::run();
        Response::redirect('http://shokusapo.com/career/entrylist');
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
