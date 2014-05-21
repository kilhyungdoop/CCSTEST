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

use \Model\Progress\Post;
use \Model\Progress\Confirm;
use \Model\Progress\Complete;
use \Util\mongo;
use \Util\entrydb;
use \Util\progressDb;

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
class Controller_Progress extends Controller
{

	public $common_view;

    public function before() {
        // ログイン状態か確認
        if (Auth::check() === false) {
            Response::redirect('http://shokusapo.com/auth/login');
        }

	    // 共通テンプレート設定
		$view = View::forge('common/new_layout');
		$view->set('head', View::forge('common/head'));
		$view->set('header', View::forge('common/header'));
        // 実行中のアクション取得
		$view->set('sidebar', View::forge('common/sidebar', array('action_name' => 'progress')));
		$view->set('js', View::forge('common/js'));
		$this->common_view = $view;
    }

    /**
	 * 入力画面用データ取得
	 */
	public function addSelectBoxData ()
	{
        list(, $user_id) = Auth::get_user_id();
        // エントリ企業名取得
        $data['progress_menu'] = entrydb::selectProgressMenuVal($user_id);
        $data['entry_status'] = mongo::searchEntryStatus();
		return $data;
	}

    /**
     * 登録ページ
     */
    public function action_post ($err_msg='')
    {
        $params = input::post();
        $data = $this->addSelectBoxData();
        $data['params'] = $params;
        if (empty($err_msg) === false) {
            $this->common_view->set_global('err_msg', $err_msg, false);
        }
        $this->common_view->set('content', View::forge('progress/post', $data));
        return $this->common_view;
    }

    public function action_modify () {
        $request = input::get();
        $data = $this->addSelectBoxData();
        $data['params'] = progressDb::selectProgressData($request['entry_id']);
        $data['params']['progress_menu'] = $request['entry_id'];
        $data['params']['entry_id'] = $request['entry_id'];
        $this->common_view->set('content', View::forge('progress/post', $data));
        return $this->common_view;
    }

    /**
     * 確認ページ
     */
    public function action_confirm () {
        $params = input::post();
        // check field
        $validation = Validation::forge();
        $validation->add_field('progress_menu', '企業名', 'required');
        $validation->add_field('e_status', '進捗状況', 'required');

        if (isset($params['e_status']) === true && intval($params['e_status']) > 1) {
            $validation->add('entry_date', 'エントリ日')->add_rule('required')->add_rule('valid_date', $params['entry_date'], true);
        }

        if ($validation->run()) {
            Confirm::setParams($params);
            Confirm::run();
            $result = Confirm::getResponse();
            $params['company_name_ja'] = $result['company_name_ja'];
            $params['entry_status_ja'] = $result['entry_status_ja'];
            $this->common_view->set('content', View::forge('progress/confirm', $params));
            return $this->common_view;
        } else {
            return $this->action_post($validation->show_errors());
        }
    }

    /**
     * 完了ページ
     */
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
