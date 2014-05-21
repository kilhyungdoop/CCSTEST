<div class="row">
    <div class="col-md-12">
        <section class="widget">

            <header>
                <h4>
                    <i class="fa fa-briefcase"></i>
                    紹介会社情報
                </h4>
                <p class="text-right">
                    <a href="/recruit/rpost/" type="button" class="btn btn-default btn-sm" data-placement="top" data-original-title=".btn .btn-default .btn-sm">
                        紹介会社登録
                    </a>
                </p>
            </header>

            <div class="body">

                <?php if(count($rlist) > 0) {?>
                    <table class="table table-hover">

                        <thead>
                        <tr>
                            <th class="hidden-xs-portrait">#</th>
                            <th>紹介会社名</th>
                            <th class="hidden-xs-portrait">担当者名</th>
                            <th>連絡先</th>
                            <th>更新</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($rlist as $key => $val) { ?>
                            <tr onClick="">
                                <td class="hidden-xs-portrait"><?php echo $key+1; ?></td>
                                <td><strong><?php echo $val['rc_name']; ?></strong></td>
                                <td class="hidden-xs-portrait"><?php echo $val['rc_mng_name']; ?></td>
                                <td>
                                    <?php if ($val['rc_mng_tel'] != 0) { ?><p>Tel:  <?php echo $val['rc_mng_tel']; ?><p><?php } ?>
                                    <p>Mail: <?php echo $val['rc_mng_mail']?><p>
                                </td>
                                <td>
                                    <a href="/recruit/modify/?rc_id=<?php echo $val['rc_id']; ?>">編集</a> /
                                    <a id="delete_btn_<?php echo $key; ?>" href="#" data-toggle="modal" data-target="#myModal_<?php echo $key; ?>">削除</a>
                                    <form action="/recruit/rdelete/" method="post">
                                        <!-- 削除モーダル -->
                                        <div class="modal fade" id="myModal_<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">紹介会社情報削除</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $val['rc_name']; ?>の登録情報を削除します。
                                                        <br>
                                                        ご確認の上、削除ボタンを押してください。
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                                                        <button type="submit" class="btn btn-danger">削除</button>
                                                        <input type="hidden" name="rc_id" value="<?php echo $val['rc_id']; ?>">
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                <?php } else { ?>
                    <div class="form-group">
                			<span class="help-block">
               					 現在、紹介会社を利用していません。<br>
                				<a href="/recruit/rpost">紹介会社登録へ</a>
                			</span>
                    </div>

                <?php } ?>

            </div>
        </section>
    </div>
</div>

