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

use \Util\commentdb;

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
 * 専用コントローラ以外の小機能群制御用
 */
class Controller_Other extends Controller
{
	private $user_id;

    public function before() {
        // ログイン状態か確認
        if (Auth::check() === false) {
            Response::redirect('http://shokusapo.com/auth/login');
        }
		list(, $this->user_id) = Auth::get_user_id();
    }

     /**
     * エントリー詳細ページからコメントを追加した場合呼ばれるメソッド
     */
    public function action_commentA ()
    {
        $params = input::post();
        if (empty($params['comment']) === false) {
            commentdb::insertCommentData(intval($params['entry_id']), $params['comment']);
        }

        Response::redirect('career/entrydetail/?entry_id='. $params['entry_id']);
    }

    /**
     * コメントを削除する
     */
    public function action_commentD ()
    {
        $params = input::get();
        if (empty($params['comment_id']) === false) {
            commentdb::deleteCommentData($params['comment_id']);
        }
        Response::redirect('career/entrydetail/?entry_id='. $params['entry_id']);
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
