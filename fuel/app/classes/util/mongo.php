<?php
/**
 * Created by PhpStorm.
 * User: 亨斗
 * Date: 13/12/22
 * Time: 14:02
 */
namespace Util;

class mongo
{
    // 紹介会社
    protected static $_recruit_company_table_name = 'recruit_company';
    // 選考状況
    protected static $_entry_status_table_name = 'entry_status';
	// 職種
	protected static $_job_type_table_name = 'job_type';
    // 雇用形態
    protected static $_emp_status_table_name = 'employ_status';

    /*
     * 紹介会社
     */
    public static function searchRecruitCompanyJapanese ($recruit_company) {
        $table = self::$_recruit_company_table_name;
        $mongodb = \Mongo_Db::instance('mongo_con_1');
        $mongodb->select(array('name'));
        $where = array('value' => $recruit_company);
        $result = $mongodb->get_where($table, $where);
        return $result[0]['name'];
    }

    public static function searchRecruitCompany () {
        $table = self::$_recruit_company_table_name;

		// Get the default group
		$mongodb = \Mongo_Db::instance('mongo_con_1');
		$result = $mongodb->get($table);

		return $result;
	}

    /*
     * 選考状況の日本語名を取得
     */
    public static function searchEntryStatusJapanese ($entry_status) {
        $table = self::$_entry_status_table_name;
        $mongodb = \Mongo_Db::instance('mongo_con_1');
        $mongodb->select(array('name'));
        $where = array('value' => intval($entry_status));
		$result = $mongodb->get_where($table, $where);
		return $result[0]['name'];
    }

   	public static function searchEntryStatus () {
        $table = self::$_entry_status_table_name;

		// Get the default group
		$mongodb = \Mongo_Db::instance('mongo_con_1');
		$result = $mongodb->get($table);

		return $result;
	}

    /*
     * 職種の日本語名を取得
     */
	public static function searchJobTypeJapanese ($type) {
		$table = self::$_job_type_table_name;

		// Get the default group
		$mongodb = \Mongo_Db::instance('mongo_con_1');
        $mongodb->select(array('name'));
        $where = array('value' => $type);
		$result = $mongodb->get_where($table, $where);

		return $result[0]['name'];
	}

  	public static function searchJobType () {
		$table = self::$_job_type_table_name;

		// Get the default group
		$mongodb = \Mongo_Db::instance('mongo_con_1');
		$result = $mongodb->get($table);

		return $result;
	}

    /*
     * 雇用形態の日本語名を取得
     */
    public static function searchEmployeeStatusJapanese ($emp_status) {
        $table = self::$_emp_status_table_name;
        $mongodb = \Mongo_Db::instance('mongo_con_1');
        $mongodb->select(array('name'));
        $where = array('value' => $emp_status);
		$result = $mongodb->get_where($table, $where);
		return $result[0]['name'];
    }

    public static function searchEmployStatus () {
        $table = self::$_emp_status_table_name;

		// Get the default group
		$mongodb = \Mongo_Db::instance('mongo_con_1');
		$result = $mongodb->get($table);

		return $result;
	}

}