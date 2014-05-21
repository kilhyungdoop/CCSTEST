<?php
namespace Model\Career;

use Auth\Auth;
use \Util\mongo;

class Entrylist extends \Model
{
    public static $params = array();

    /**
     * @return array
     */
    public static function getParams()
    {
        return self::$params;
    }

    /**
     * @param array $params
     */
    public static function setParams($params)
    {
        self::$params = $params;
    }

    /*
     * エントリリストメイン処理
     */
    public static function run () {

        $params = self::getParams();
        $entry_list = Entrylist::getEntryList($params);

        foreach ($entry_list as $key => $val) {
            // mongoから職種の日本語名を取得
            $entry_list[$key]['job_type'] = mongo::searchJobTypeJapanese($val['job_type']);
            $entry_status['name'] = '未登録';
            $entry_status['label_css'] = '';
            if (is_null($val['entry_status']) === false) {
                $entry_status['name'] = mongo::searchEntryStatusJapanese($val['entry_status']);
                // 選考状態のラベルに使用するCSS デフォルトで面接中のCSS
                $label_css = 'badge-info';
                // エントリ予定
                if ($val['entry_status'] === '1') {
                    $label_css = 'badge-default';
                    // 選考中
                } elseif ($val['entry_status'] === '2') {
                    $label_css = 'badge-warning';
                    // 内定
                } elseif ($val['entry_status'] === '7') {
                    $label_css = 'badge-success';
                    // 不採用
                } elseif ($val['entry_status'] === '8') {
                    $label_css = 'badge-danger';
                }
                $entry_status['label_css'] = $label_css;
                $entry_list[$key]['entry_status'] = $entry_status;
            }
            $entry_list[$key]['entry_status'] = $entry_status;

            if (is_null($val['entry_date'])) {
                $entry_list[$key]['entry_date'] = '0000-00-00';
            }

            // 仕事内容の省略
            if (strlen($entry_list[$key]['job_detail']) > 300) {
                $entry_list[$key]['job_detail'] = mb_substr($entry_list[$key]['job_detail'], 0, 150, 'UTF-8'). '...';
            }
        }

        return $entry_list;
    }

    /*
     * エントリリスト取得
     */
    private static function getEntryList ($params) {
        // ユーザID取得
        list(, $user_id) = Auth::get_user_id();

        $base_sql =
            'SELECT '.
                'entry.entry_id, '.
                'company.image_path, '.
                'company.name, '.
                'progress.entry_status, '.
                'entry.job_type, '.
                'entry.job_detail, '.
                'progress.entry_date, '.
                'entry.r_datetime '.
             'FROM '.
                'entry '.
             'LEFT JOIN company '.
             'ON entry.company_id = company.company_id '.
             'LEFT JOIN progress '.
             'ON progress.entry_id = entry.entry_id '.
             'WHERE user_id = :user_id ';

        $db_params = array('user_id' => $user_id);

        // 選考状態(すべて以外)が選択された場合
        if (isset($params['status']) === true && empty($params['status']) === false) {
            if (preg_match('/-/', $params['status']) == true) {
                $range = explode('-', $params['status']);
                $base_sql .= 'AND (entry_status BETWEEN :start_status AND :end_status) ';
                $db_params['start_status'] = intval($range[0]);
                $db_params['end_status'] = intval($range[1]);
            } else {
                $base_sql .= 'AND entry_status = :entry_status ';
                $db_params['entry_status'] = $params['status'];
            }
        }

        // 紹介会社(すべて以外)が選択された場合
        if (isset($params['recruit_company']) === true && empty($params['recruit_company']) === false) {
            $base_sql .= 'AND recruit_company_id = :recruit_company_id ';
            $db_params['recruit_company_id'] = $params['recruit_company'];
        }

        // 検索ボックスのキーワード検索の場合
        if (isset($params['keyword']) === true && empty($params['keyword']) === false) {
            $base_sql .= "AND name LIKE '%". $params['keyword'].  "%' ";
        }

        // 並び順選択
        $order_column = 'r_datetime';
        if (isset($params['order']) === true && $params['order'] === 'entry') {
            $order_column = 'entry_date';
        }
        $base_sql .= 'ORDER BY '. $order_column. ' DESC ';

        $query = \DB::query($base_sql);;
        $query->parameters($db_params);
        $result = $query->execute()->as_array();

        return $result;
    }
}
?>
