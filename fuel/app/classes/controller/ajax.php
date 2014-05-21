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

use \Util\progressDb;
use \Util\interviewDb;

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Ajax extends Controller_Rest
{

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function post_progressdata()
	{
		$progress_info = array(
            'entry_date' => '',
            'e_status' => '',
            'interview_date_1' => '',
            'interview_date_2' => '',
            'interview_date_3' => '',
            'interview_date_4' => '',
            'result_date' => '',
        );

		if (isset($_POST['entry_id']) === true && empty($_POST['entry_id']) === false) {
			$entry_id = $_POST['entry_id'];
			$p_data = progressDb::selectProgressData($entry_id);
            if (is_null($p_data) === false) {
                $progress_info = $p_data;
            }
		}

		return $this->response($progress_info, 200);
	}

    /**
     * 面接情報を取得する
     */
    public function post_interviewdata () {
        $interview_info = array(
            'introduction' => '',
            'motivation_letter' => '',
            'other' => '',
        );

		if (isset($_POST['entry_id']) === true && empty($_POST['entry_id']) === false) {
			$entry_id = $_POST['entry_id'];
			$i_data = interviewDb::selectInterviewData($entry_id);
            if (is_null($i_data) === false) {
                $interview_info = $i_data;
            }
		}

        return $this->response($interview_info, 200);
    }
}
