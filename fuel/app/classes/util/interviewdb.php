<?php
namespace Util;

class interviewDb
{
    /**
     * 面接情報を編集する
     */
    public static function updateInterviewData ($entry_id, $db_params) {
        $interview_params = array(
            'introduction' => $db_params['introduction'],
            'motivation_letter' => $db_params['motivation_letter'],
            'other' => $db_params['other']
        );

        return \DB::update('interview')
            ->set($interview_params)
            ->where('entry_id', $entry_id)->execute();
    }

    /**
     * 面接情報を取得する
     * @param $entry_id
     * @return mixed
     */
    public static function selectInterviewData ($entry_id) {
        $result = \DB::select('entry_id', 'introduction', 'motivation_letter', 'other')
            ->from('interview')
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
    public static function insertInterviewData ($db_params) {
        $progress_params = array(
            'entry_id' => intval($db_params['c_menu']),
            'introduction' => $db_params['introduction'],
            'motivation_letter' => $db_params['motivation_letter'],
            'other' => $db_params['other'],
            'created_at' => date('Y-m-d G:i:s'),
        );
        $result = \DB::insert('interview')->set($progress_params)->execute();

        // 多分　0: 主キー 1:登録件数
        return $result[0];
    }
}
?>
