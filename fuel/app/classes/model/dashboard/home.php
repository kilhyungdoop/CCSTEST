<?php
namespace Model\Dashboard;

use \Util\entrydb;
use \Util\progressDb;
use \Util\recruitdb;

class Home extends \Model
{
    public static $user_id;
    private static $params;
    private static $result;

    public static function run() {

        // パラメータ取得
        $request_params = self::$params;

		// エントリ総件数を取得
		$entry_cnt = entrydb::getEntryDataCnt(self::$user_id);
		$entry_data_cnt = isset($entry_cnt[0]['count']) === false ? 0 : $entry_cnt[0]['count'];
		$data['entry_data_cnt'] = $entry_data_cnt;

		// 進捗比率計算
		$status_gb = entrydb::getProgressStatusGroupByCnt(self::$user_id);
		list($status_gb_cnt, $resume_pass_ratio, $pass_ratio) = self::getEntryStatusDistribution($status_gb);
		$data['status_gb_cnt'] = $status_gb_cnt;

		// 書類審査通過率を取得する
		$data['resume_pass_ratio'] = $resume_pass_ratio;

        // 内定率を取得する
        $data['pass_ratio'] = $pass_ratio;

		// 紹介会社の総件数を取得
		$recruit_company_cnt = recruitdb::getRecruitCompanyCount(self::$user_id);
		$data['recruit_company_cnt'] =
			isset($recruit_company_cnt[0]['count']) === false ? 0 : $recruit_company_cnt[0]['count'];

		// 紹介会社毎の紹介率を取得する。
		$recruit_gb = entrydb::getRecruitCompanyGroupByCnt(self::$user_id);
		$recruit_gb_cnt = self::getRecruitCompanyDistribution($entry_data_cnt, $recruit_gb);
		$data['recruit_gb_cnt'] = $recruit_gb_cnt;

		self::$result = $data;
    }

	/**
	 * 紹介会社ごとの紹介率を取得 
	 */
	private static function getRecruitCompanyDistribution ($entry_data_cnt, $recruit_gb) {
		$recruit_gb_cnt = array();
		foreach ($recruit_gb as $key => $val) {
            if (is_null($val['rc_name']) === true) continue;
			$cnt = intval($val['count']);
            $recruit_gb_cnt[$val['rc_name']] = array(
                $cnt, floor($cnt / $entry_data_cnt * 100), $val['rc_id']
            );
		}
		return $recruit_gb_cnt;
	}

	/**
	 * 進捗ステータスごとの件数を取得する
	 */
	private static function getEntryStatusDistribution ($status_gb) {

		$status_gb_cnt = array(
			'all'       => 0,
			'plan'      => array(0, 0),
			'resume'    => array(0, 0),
			'interview' => array(0, 0),
			'pass'      => array(0, 0),
			'failure'   => array(0, 0),
		);
		foreach ($status_gb as $key=>$val) {

			$entry_status = intval($val['entry_status']);
			$count = intval($val['count']);

			if ($entry_status === 1) {
				$status_gb_cnt['plan'][0] =+ $count;

			} elseif ($entry_status === 2) {
				$status_gb_cnt['resume'][0] =+ $count;

			} elseif ($entry_status > 2 && $entry_status < 7) {
				$status_gb_cnt['interview'][0] =+ $count;

			} elseif ($entry_status === 7) {
				$status_gb_cnt['pass'][0] =+ $count;

			} elseif ($entry_status === 8) {
				$status_gb_cnt['failure'][0] =+ $count;
			}
			$status_gb_cnt['all'] = $status_gb_cnt['all'] + $count;

		}

		// 書類選考通過率
		$resume_pass_ratio = 0;
		$pass_ratio = 0;

		if ($status_gb_cnt['all'] > 0) {

			$status_gb_cnt['plan'][1] = floor($status_gb_cnt['plan'][0] / $status_gb_cnt['all'] * 100);
			$status_gb_cnt['resume'][1] = floor($status_gb_cnt['resume'][0] / $status_gb_cnt['all'] * 100);
			$status_gb_cnt['interview'][1] = floor($status_gb_cnt['interview'][0] / $status_gb_cnt['all'] * 100);
			$status_gb_cnt['pass'][1] = floor($status_gb_cnt['pass'][0] / $status_gb_cnt['all'] * 100);
			$status_gb_cnt['failure'][1] = floor($status_gb_cnt['failure'][0] / $status_gb_cnt['all'] * 100);

			// 書類選考通過率計算
			$bunmo = $status_gb_cnt['all']- $status_gb_cnt['plan'][0];
			if ($bunmo > 0) {
				$resume_pass_ratio =
					floor(($status_gb_cnt['interview'][0] + $status_gb_cnt['pass'][0]) / ($status_gb_cnt['all']- $status_gb_cnt['plan'][0]) * 100);
				$pass_ratio =
					floor($status_gb_cnt['pass'][0] / ($status_gb_cnt['all']- $status_gb_cnt['plan'][0]) * 100);
			}

		}

		return array($status_gb_cnt, $resume_pass_ratio, $pass_ratio);
	}

	public static function getResult() {
		return self::$result;
	}

    public static function setParams($params) {
        self::$params = $params;
    }

    public static function setUserId($user_id) {
        self::$user_id = $user_id;
    }

}
