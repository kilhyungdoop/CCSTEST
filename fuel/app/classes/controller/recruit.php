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

use \Model\Recruit\Rlist;
use \Model\Recruit\Complete;
use \Model\Recruit\Rdelete;
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
class Controller_Recruit extends Controller
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
		$view->set('js', View::forge('common/js'));
		$this->common_view = $view;
    }

     /**
     * 紹介会社管理ページ
     */
    public function action_rpost ($err_msg='')
    {
        $params = input::post();
        $data['params'] = $params;
        if (empty($err_msg) === false) {
            $this->common_view->set_global('err_msg', $err_msg, false);
        }

        $this->common_view->set('content', View::forge('recruit/post', $data));
        return $this->common_view;
    }

    public function action_modify () {
        $request = input::get();
        $data['params'] = recruitdb::getRecruitCompanyInfo($request['rc_id']);
        $this->common_view->set('content', View::forge('recruit/post', $data));
        return $this->common_view;
    }

    /**
     * 確認ページ
     */
    public function action_rconfirm () {
        $params = input::post();
        // check field
        $validation = Validation::forge();
        $validation->add_field('rc_name', '紹介会社名', 'required');
        $validation->add_field('rc_mng_name', '担当者名', 'required');

        if ($validation->run()) {
            $this->common_view->set('content', View::forge('recruit/confirm', $params));
            return $this->common_view;
        } else {
            return $this->action_rpost($validation->show_errors());
        }
    }

    /**
     * 完了ページ
	*/
    public function action_rcomplete () {
        $params = input::post();
        Complete::setParams($params);
        Complete::setUserId($this->user_id);
        Complete::run();
        Response::redirect('http://shokusapo.com/recruit/rlist');
    }

    /**
     * リスト
     */
    public function action_rlist () {
        Rlist::setUserId($this->user_id);
        Rlist::run();
        $recruit_list['rlist'] = Rlist::getResult();
        $this->common_view->set('content', View::forge('recruit/list', $recruit_list));
        return $this->common_view;
    }

    /**
     * 削除
     */
    public function action_rdelete () {
        Rdelete::setParams(input::post());
        Rdelete::run();
        Response::redirect('http://shokusapo.com/recruit/rlist');
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
