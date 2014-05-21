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

use \Model\Career\EntryDetail;
use \Model\Career\Entrylist;
use \Model\Career\Add;
use \Model\Career\Complete;
use \Model\Career\Confirm;
use \Model\Career\EntryDelete;
use \Model\Career\Progress;
use \Util\mongo;
use \Util\entrydb;
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
 * 一時保存場所
 */
define('IMAGE_TEMP_PATH', '/var/www/html/img/tmp/');

define('IMAGE_PATH', '/var/www/html/img/career/');

/*
 * エントリ登録、リストのコントローラー
 */
class Controller_Career extends Controller
{

	public $common_view;

	private $user_id;

    public function before() {
        // ログイン状態か確認
        if (Auth::check() === false) {
            Response::redirect('http://shokusapo.com/auth/login');
        }

		list(, $user_id) = Auth::get_user_id();
		$this->user_id = $user_id;

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
     * 詳細ページ
     */
    public function action_entrydetail ()
    {
        // エントリIDを渡す
        $entry_id = input::get('entry_id');
        EntryDetail::setEntryId(intval($entry_id));
        Entrydetail::run();
        $data['detail'] = EntryDetail::getEntryDetail();
        $data['disp_mode'] = input::get('disp_mode');

		$this->common_view->set('content', View::forge('career/entrydetail', $data));
		return $this->common_view;

    }

    /**
	 * The basic welcome message
	 * @access  public
	 * @return  Response
	 */
	public function action_entrylist()
	{
        // mysqlからエントリデータを取得
        Entrylist::setParams(input::all());
        $data['user_id'] = $this->user_id;
        $data['params'] = input::all();
        $data['entry_list'] = Entrylist::run();
        $data['entry_status'] = mongo::searchEntryStatus();
        $data['recruit_company'] = mongo::searchRecruitCompany();

        // テンプレート設定
        $data['list_view_flg'] = count($data['entry_list']) > 0 ? true : false;
		$this->common_view->set('content', View::forge('career/list', $data));
		return $this->common_view;
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_add()
	{
        $data = $this->addSelectBoxMongoData();
		if (count(input::post()) > 0) {
			$params = input::post();
			$data['val'] = $params;
			if (empty($params['c_logo']) === false) {
				unlink(IMAGE_TEMP_PATH. $params['c_logo']);
			}
		}
		$this->common_view->set('content', View::forge('career/add', $data));
		return $this->common_view;
	}

    public function action_modify () {
        $data = $this->addSelectBoxMongoData();
        $request = input::get();
        $data['val'] = entrydb::selectEntryDetail($request['entry_id']);
        $data['val']['entry_id'] = $request['entry_id'];
        $data['val']['company_id'] = $request['company_id'];
        $this->common_view->set('content', View::forge('career/add', $data));
        return $this->common_view;
    }

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_confirm()
	{
        $params = input::post();

		// check field
		$validation = Validation::forge();
		$validation->add_field('c_name', '企業名', 'required');
		$validation->add_field('job_detail', '仕事内容', 'required');
        if (empty($params['salary']) === false) {
            //$validation->add_field('valid_string', '給与', array('numeric'));
            $validation->add_field('salary', '給与', 'valid_string[numeric]');
        }
        if (empty($params['reception_mail']) === false) {
            $validation->add_field('reception_mail', 'メールアドレス', 'valid_emails');
        }
        if (empty($params['home_page']) === false) {
            $validation->add_field('home_page', 'ホームページ', 'valid_url');
        }

		if ($validation->run()) {
            Confirm::setRequest($params);
            Confirm::run($params);
            $data['disp'] = Confirm::getRequest();
			$data['val'] = $params;
            $data['logo_path'] = Confirm::$image_path;
			$this->common_view->set('content', View::forge('career/confirm', $data));
			return $this->common_view;
		} else {
            $this->common_view->set_global('err_msg', $validation->show_errors(), false);
            return $this->action_add();
		}
		
	}

    public function action_complete()
    {
        $params = input::post();
        Complete::setParams($params);
        $entry_id = Complete::run();
        Response::redirect('http://shokusapo.com/career/entrydetail/?entry_id='. $entry_id);
    }

    public function action_entrydelete()
    {
        $params = input::post();
        EntryDelete::setParams($params);
        EntryDelete::run();
		Response::redirect(MAIN_URL);
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

	/**
	 * 入力画面用データ取得
	 */
	public function addSelectBoxMongoData ()
	{
		$data['job_type'] = mongo::searchJobType();
		$data['employ_status'] = mongo::searchEmployStatus();
        $data['recruit_company'] =
			intval(RecruitDb::getRecruitCompanyCount($this->user_id)) === 0
			? '' : RecruitDb::getRecruitCompanyList($this->user_id);
		return $data;
	}

}
