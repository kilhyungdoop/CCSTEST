<?php
namespace Util;
use Auth\Auth;

class EntryDb
{
	/**
	 * 紹介された件数を紹介会社毎に取得する
	 */
    public static function getRecruitCompanyGroupByCnt ($user_id) {
		return \DB::select('recruit_company.rc_name', 'recruit_company.rc_id', \DB::expr('COUNT(*) as count'))
			->from('entry')
			->join('recruit_company', 'LEFT')
			->on('entry.recruit_company_id', '=', 'recruit_company.rc_id')
			->where('entry.user_id', $user_id)
			->group_by('entry.recruit_company_id')
			->execute()->as_array();
	}

    /**
     * 進捗ステータス毎に件数を取得
     */
    public static function getProgressStatusGroupByCnt ($user_id) {
		return \DB::select('progress.entry_status', \DB::expr('COUNT(*) as count'))
			->from('entry')
			->join('progress', 'INNER')
			->on('entry.entry_id', '=', 'progress.entry_id')
			->group_by('progress.entry_status')
			->where('entry.user_id', $user_id)
			->execute()->as_array();
	}

	/**
	 * エントリ総件数を取得する
	 */
	public static function getEntryDataCnt ($user_id) {
		return \DB::select(\DB::expr('COUNT(*) as count'))
			->from('entry')
			->where('user_id', $user_id)
			->execute()->as_array();
	}

	/**
	 * 対象のエントリ詳細を取得する
	 * @param int entry_id エントリID
	 * @return array result エントリ詳細
	 */
	public static function selectEntryDetail ($entry_id)
	{
		$result = \DB::select(
				'entry.entry_id',
				array('company.name', 'c_name'),
				'entry.job_detail',
				array('entry.emp_status', 'e_status'),
				'entry.salary',
				'entry.job_type',
				'entry.reception_name',
				'entry.reception_tel',
				'entry.reception_mail',
				'company.company_id',
				'company.image_path',
				array('company.info', 'c_info'),
				array('company.place', 'c_place'),
				array('company.homepage', 'home_page'),
				'progress_id',
				'entry_status',
				'interview_date_1',
				'interview_date_2',
				'interview_date_3',	
				'interview_date_4',
				'result_date',
				'progress.entry_date',
				'recruit_company.rc_id',
				'recruit_company.rc_name',
				'recruit_company.rc_place',
				'recruit_company.rc_mng_name',
				'recruit_company.rc_mng_tel',
				'recruit_company.rc_mng_mail',
                'interview.interview_id',
                'interview.introduction',
                'interview.motivation_letter',
                'interview.other'
                )
					->from('entry')
					->join('company', 'LEFT')
					->on('entry.company_id', '=', 'company.company_id')
					->join('progress', 'LEFT')
					->on('entry.entry_id', '=', 'progress.entry_id')
                    ->join('interview', 'LEFT')
                    ->on('entry.entry_id', '=', 'interview.entry_id')
					->join('recruit_company', 'LEFT')
					->on('entry.recruit_company_id', '=', 'recruit_company.rc_id')
					->where('entry.entry_id', $entry_id)
					->order_by('entry.r_datetime', 'desc')
					->execute()->as_array();

		return $result[0];
	}

	/**
	 * エントリ企業名取得
	 * param user_id int ユーザID
	 */
	public static function selectProgressMenuVal ($user_id) {
		return \DB::select('entry_id', 'company.name')
			->from('entry')
			->join('company', 'LEFT')
			->on('entry.company_id', '=', 'company.company_id')
			->where('user_id', $user_id)
			->order_by('entry.r_datetime', 'desc')
			->execute()->as_array();
	}

	/**
	 * ENTRYレコード削除
	 * param entry_id int エントリID
	 */
	public static function deleteEntryData ($entry_id) {
		return \DB::delete('entry')
			->where('entry_id',$entry_id)
			->execute();
	}

	/**
	 * COMPANYレコード削除
	 * param company_id int 会社ID
	 */
	public static function deleteCompanyData ($company_id) {
		return \DB::delete('company')
			->where('company_id',$company_id)
			->execute();
	}

	/**
	 * entryテーブル登録
	 * @params db_params array リクエストパラメータ
	 * @params c_id string 登録会社ID
	 */
	public static function insertEntryData ($db_params, $c_id) {
		list(, $user_id) = Auth::get_user_id();
		$entry_params = array(
				'user_id' => $user_id,
				'company_id' => $c_id,
				'emp_status' => $db_params['e_status'],
				'recruit_company_id' => $db_params['recruit_company'],
				'job_type' => $db_params['job_type'],
				'job_detail' => $db_params['job_detail'],
				'salary' => $db_params['salary'],
				'reception_name' => $db_params['reception_name'],
				'reception_tel' => $db_params['reception_tel'],
				'reception_mail' => $db_params['reception_mail'],
				'r_datetime' => date('Y-m-d G:i:s'),
				);
		return \DB::insert('entry')->set($entry_params)->execute();
	}

	public static function updateEntryData ($db_params) {
		$entry_params = array(
				'emp_status' => $db_params['e_status'],
				'recruit_company_id' => $db_params['recruit_company'],
				'job_type' => $db_params['job_type'],
				'job_detail' => $db_params['job_detail'],
				'salary' => $db_params['salary'],
				'reception_name' => $db_params['reception_name'],
				'reception_tel' => $db_params['reception_tel'],
				'reception_mail' => $db_params['reception_mail'],
				'u_datetime' => date('Y-m-d G:i:s'),
				);
		return \DB::update('entry')
			->set($entry_params)
			->where('entry_id', $db_params['entry_id'])
			->execute();
	}
}
?>
