<?php
namespace Model\Career;

use \Util\mongo;
use \Util\entrydb;
use \Util\commentdb;

class EntryDetail extends \Model
{
    // エントリID
    public static $entry_id = 0;

    // エントリ詳細
    public static $entry_detail = array();

    // 会社詳細
    public static $company_detail = array();

    /**
     * @return array
     */
    public static function getCompanyDetail()
    {
        return self::$company_detail;
    }

    /**
     * @return array
     */
    public static function getEntryDetail()
    {
        return self::$entry_detail;
    }

    /**
     * @param int $entry_id
     */
    public static function setEntryId($entry_id)
    {
        self::$entry_id = $entry_id;
    }

    /**
     * @return int
     */
    public static function getEntryId()
    {
        return self::$entry_id;
    }

    /**
     * メイン処理
     */
    public static function run ()
    {
        $entry_id = self::getEntryId();

        // エントリ詳細を取得する
        $entry_detail = entrydb::selectEntryDetail($entry_id);

        // 職種の日本語名取得
        $entry_detail['job_type'] = mongo::searchJobTypeJapanese($entry_detail['job_type']);

        // 雇用形態の日本語名取得
        $entry_detail['e_status'] = mongo::searchEmployeeStatusJapanese($entry_detail['e_status']);

        // 進捗状況の日本語名取得
        if (is_null($entry_detail['entry_status']) === false) {
            $entry_detail['entry_status'] = mongo::searchEntryStatusJapanese($entry_detail['entry_status']);
        }

        // コメントを取得する
        $entry_detail['comment'] = commentdb::selectCommentData($entry_id);

        self::$entry_detail = $entry_detail;

	}

    /**
     * 対象の会社詳細を取得する
     * @param int company_id 会社ID
     * @return array result 会社詳細
     */
    private static function selectConpanyDetail ($company_id)
    {
        $result = \DB::select()->from('company')->where('company_id', $company_id)
            ->execute()->as_array();
        return $result;
    }

}
?>
