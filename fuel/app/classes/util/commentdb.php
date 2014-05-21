<?php
namespace Util;

class commentdb
{
    /**
     * コメントを追加する
     * @params entry_id string エントリーID
     * @params comment  string コメント
     * @retrun $result[0] string 登録レコードの主キー
     */
    public static function insertCommentData($entry_id, $comment) {
        $params = array(
			'entry_id' => $entry_id,
			'comment' => $comment,
            'created_at' => date('Y-m-d G:i:s')
        );
        $result = \DB::insert('comment')->set($params)->execute();
        return $result[0];

    }

    /**
     * コメント情報を取得する
     */
    public static function selectCommentData ($entry_id) {
        return \DB::select()
            ->from('comment')
            ->where('entry_id', $entry_id)
            ->order_by('created_at', 'desc')
            ->execute()->as_array();
    }

   	/**
	 * コメント削除
	 * param comment_id int コメントID
	 */
	public static function deleteCommentData ($comment_id) {
		return \DB::delete('comment')
			->where('comment_id',$comment_id)
			->execute();
	}
}
?>
