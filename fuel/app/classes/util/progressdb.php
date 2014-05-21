<?php
namespace Util;

class progressDb
{
    public static function selectProgressData ($entry_id) {
        $result = \DB::select('entry_id', array('entry_status', 'e_status'), 'entry_date',
            'interview_date_1', 'interview_date_2', 'interview_date_3', 'interview_date_4', 'result_date')
            ->from('progress')
            ->where('entry_id', $entry_id)
            ->execute()->as_array();
        if (empty($result) === false)  {
            return $result[0];
        } else {
            return;

        }
    }

    /**
     * 進捗管理登録
     */
    public static function insertProgressData ($db_params) {
        $progress_params = array(
            'entry_id' => $db_params['progress_menu'],
            'entry_status' => $db_params['e_status'],
            'entry_date' => $db_params['entry_date'],
        );

        if (empty($db_params['interview_date_1']) === false) {
            $progress_params['interview_date_1'] = $db_params['interview_date_1'];
        }

        if (empty($db_params['interview_date_2']) === false) {
            $progress_params['interview_date_2'] = $db_params['interview_date_2'];
        }

        if (empty($db_params['interview_date_3']) === false) {
            $progress_params['interview_date_3'] = $db_params['interview_date_3'];
        }

        if (empty($db_params['interview_date_4']) === false) {
            $progress_params['interview_date_4'] = $db_params['interview_date_4'];
        }

        if (empty($db_params['result_date']) === false) {
            $progress_params['result_date'] = $db_params['result_date'];
        }

        $result = \DB::insert('progress')->set($progress_params)->execute();

        // 多分　0: 主キー 1:登録件数
        return $result[0];
    }

    public static function updateProgressData ($entry_id, $db_params) {
        $progress_params = array(
            'entry_id' => $db_params['progress_menu'],
            'entry_status' => $db_params['e_status'],
            'entry_date' => $db_params['entry_date'],
        );

        if (empty($db_params['interview_date_1']) === false) {
            $progress_params['interview_date_1'] = $db_params['interview_date_1'];
        }

        if (empty($db_params['interview_date_2']) === false) {
            $progress_params['interview_date_2'] = $db_params['interview_date_2'];
        }

        if (empty($db_params['interview_date_3']) === false) {
            $progress_params['interview_date_3'] = $db_params['interview_date_3'];
        }

        if (empty($db_params['interview_date_4']) === false) {
            $progress_params['interview_date_4'] = $db_params['interview_date_4'];
        }

        if (empty($db_params['result_date']) === false) {
            $progress_params['result_date'] = $db_params['result_date'];
        }

        return \DB::update('progress')
            ->set($progress_params)
            ->where('entry_id', $entry_id)->execute();
    }


	/**
	 * Progressレコード削除
	 * param entry_id int エントリID
	 */
	public static function deleteProgressData ($entry_id) {
		return \DB::delete('progress')
			->where('entry_id',$entry_id)
			->execute();
	}
}
?>
