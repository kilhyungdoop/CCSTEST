<div class="row">
    <div class="col-md-6">
        <h3 class="page-title"><?php echo $detail['c_name']?> (<?php echo $detail['job_type']; ?>)</h3>
    </div>
</div

<div class="row">
<div class="col-md-8">
    <section class="widget">
        <div class="body">
            <div class="table tabs-left">
                <ul id="myTabLeft" class="nav nav-tabs">
                    <li class="active"><a href="#home-left" data-toggle="tab">詳細</a></li>
                    <li><a href="#profile-left" data-toggle="tab">進捗</a></li>
                    <li><a href="#dropdown3-left" data-toggle="tab">紹介会社</a></li>
                    <li><a href="#interview-left" data-toggle="tab">面接準備</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">各種設定 <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/career/modify/?entry_id=<?php echo $detail['entry_id'];?>&company_id=<?php echo $detail['company_id'];?>"><p class="text-warning">エントリー詳細を編集する</p></a></li>
                            <li><a href="/progress/modify/?entry_id=<?php echo $detail['entry_id'];?>"><p class="text-warning">進捗状況を編集する</p></a></li>
                            <li><a href="/interview/modify/?entry_id=<?php echo $detail['entry_id'];?>"><p class="text-warning">面接準備をする</p></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#myModal" role="button"><p class="text-danger">すべてのエントリ情報を削除する</p></a></li>
                        </ul>
                    </li>
                </ul>
                <div id="myTabContentLeft" class="tab-content" >
                    <div class="tab-pane fade in active" id="home-left">
                        <p><strong>・仕事内容</strong><br>
                            <?php echo nl2br(str_replace('\n',"\n",$detail['job_detail'])); ?>
                        </p>
                        <p><strong>・雇用形態</strong><br>
                            <?php echo $detail['e_status']; ?>
                        </p>

                        <?php if(empty($detail['salary']) === false) { ?>
                            <p><strong>・給与</strong><br>
                                <?php echo $detail['salary']; ?>
                            </p>
                        <?php } ?>

                        <?php if(empty($detail['c_info']) === false) { ?>
                            <p><strong>・企業情報</strong><br>
                                <?php echo nl2br(str_replace('\n',"\n",$detail['c_info'])); ?>
                            </p>
                        <?php } ?>

                        <?php if(empty($detail['c_place']) === false) { ?>
                            <p><strong>・勤務地</strong><br>
                                <a target="_blank" href="https://www.google.co.jp/maps/place/<?php echo $detail['c_place']; ?>/"><?php echo $detail['c_place']; ?></a>
                            </p>
                        <?php } ?>

                        <?php if(empty($detail['reception_name']) === false) { ?>
                            <p><strong>・担当者名</strong><br>
                                <?php echo $detail['reception_name']; ?>
                            </p>
                        <?php } ?>

                        <?php if(empty($detail['reception_tel']) === false) { ?>
                            <p><strong>・担当者連絡先</strong><br>
                                <?php echo $detail['reception_tel']; ?>
                            </p>
                        <?php } ?>

                        <?php if(empty($detail['reception_mail']) === false) { ?>
                            <p><strong>・担当者メールアドレス</strong><br>
                                <a href="mailto:<?php echo $detail['reception_mail']; ?>"><?php echo $detail['reception_mail']; ?></a>
                            </p>
                        <?php } ?>

                        <?php if(empty($detail['home_page']) === false) { ?>
                            <p><strong>・ホームページ</strong><br>
                                <a target="_blank" href="<?php echo $detail['home_page']; ?>"><?php echo $detail['home_page']; ?></a>
                            </p>
                        <?php } ?>

                        </dl>
                    </div>
                    <div class="tab-pane fade" id="profile-left">
                        <?php if (isset($detail['progress_id']) === true && is_null($detail['progress_id']) === false) {?>
                            <p><strong>・進捗状況</strong><br>
                                <?php echo $detail['entry_status']; ?>
                            </p>

                            <p><strong>・エントリー日</strong><br>
                                <?php echo $detail['entry_date']; ?>
                            </p>

                            <?php if(empty($detail['interview_date_1']) === false) { ?>
                                <p><strong>・1次面接日時</strong><br>
                                    <?php echo $detail['interview_date_1']; ?>
                                </p>
                            <?php } ?>

                            <?php if(empty($detail['interview_date_2']) === false) { ?>
                                <p><strong>・2次面接日時</strong><br>
                                    <?php echo $detail['interview_date_2']; ?>
                                </p>
                            <?php } ?>

                            <?php if(empty($detail['interview_date_3']) === false) { ?>
                                <p><strong>・3次面接日時</strong><br>
                                    <?php echo $detail['interview_date_3']; ?>
                                </p>
                            <?php } ?>

                            <?php if(empty($detail['interview_date_4']) === false) { ?>
                                <p><strong>・最終接日時</strong><br>
                                    <?php echo $detail['interview_date_4']; ?>
                                </p>
                            <?php } ?>

                            <?php if(empty($detail['result_date']) === false) { ?>
                                <p><strong>・結果通知日</strong><br>
                                    <?php echo $detail['result_date']; ?>
                                </p>
                            <?php } ?>

                        <?php } else { ?>
                            <p>
                                進捗が登録されていません。<br>
                                各種設定から「進捗情報を編集する」リンクをクリックし、進捗状況を登録してください。<br>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="dropdown3-left">
                        <?php if (isset($detail['rc_id']) === true && is_null($detail['rc_id']) === false) {?>
                            <p><strong>・紹介会社名</strong><br>
                                <?php echo $detail['rc_name']; ?>
                            </p>

                            <?php if(empty($detail['rc_place']) === false) { ?>
                                <p><strong>・紹介会社場所</strong><br>
                                    <a target="_blank" href="https://www.google.co.jp/maps/place/<?php echo $detail['rc_place']; ?>/"><?php echo $detail['rc_place']; ?></a>
                                </p>
                            <?php } ?>

                            <p><strong>・担当者名</strong><br>
                                <?php echo $detail['rc_mng_name']; ?>
                            </p>

                            <?php if(empty($detail['rc_mng_tel']) === false) { ?>
                                <p><strong>・担当者連絡先</strong><br>
                                    <?php echo $detail['rc_mng_tel']; ?>
                                </p>
                            <?php } ?>

                            <?php if(empty($detail['rc_mng_mail']) === false) { ?>
                                <p><strong>・担当者メールアドレス</strong><br>
                                    <a href="mailto:<?php echo $detail['rc_mng_mail']; ?>"><?php echo $detail['rc_mng_mail']; ?></a>
                                </p>
                            <?php } ?>

                        <?php } else { ?>
                            <p>
                                紹介会社が選択されていません。<br>
                                各種設定から「エントリー詳細を編集する」リンクをクリックし、紹介会社を選択してください。<br>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="tab-pane fade" id="interview-left">
                        <?php if (isset($detail['interview_id']) === true && is_null($detail['interview_id']) === false) {?>

                            <?php if(empty($detail['introduction']) === false) { ?>
                                <p><strong>・自己PR</strong><br>
                                    <?php echo $detail['introduction']; ?>
                                </p>
                            <?php } ?>

                            <?php if(empty($detail['motivation_letter']) === false) { ?>
                                <p><strong>・志望動機</strong><br>
                                    <?php echo $detail['motivation_letter']; ?>
                                </p>
                            <?php } ?>

                            <?php if(empty($detail['other']) === false) { ?>
                                <p><strong>・その他</strong><br>
                                    <?php echo $detail['other']; ?>
                                </p>
                            <?php } ?>

                        <?php } else { ?>
                            <p>
                                面接準備が登録されていません。<br>
                                各種設定から「面接準備をする」リンクをクリックし、面接用情報を登録してください。<br>
                            </p>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


<!--
<div class="col-md-4">
    <section class="widget">
        <header>
            <h4><i class="fa fa-cogs"></i> 各種設定</h4>
        </header>
        <div class="body">
            <form method="post">
                <fieldset>
                    <legend class="section">編集</legend>
                    <div class="control-group">
                        <div class="controls form-group">
                            <a href="/career/modify/?entry_id=<?php echo $detail['entry_id'];?>&company_id=<?php echo $detail['company_id'];?>"><p class="text-warning">エントリー詳細を編集する >></p></a>
                            <a href="/progress/modify/?entry_id=<?php echo $detail['entry_id'];?>"><p class="text-warning">進捗状況を編集する >></p></a>
                            <a href="/interview/modify/?entry_id=<?php echo $detail['entry_id'];?>"><p class="text-warning">面接準備をする >></p></a>
                        </div>
                    </div>

                    <legend class="section">削除</legend>
                    <span class="help-block">エントリーに関するすべての情報が削除されます。</span>
                    <div class="well well-sm well-white">
                        <div class="row">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-4">
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal" role="button">削除</a>
                            </div>
                        </div>
                    </div

                </fieldset>
            </form>
        </div>
    </section>
</div>
-->

<div class="col-md-4">
    <section class="widget">
        <header>
            <h4><i class="fa fa-comment"> 付箋 </i></h4>
        </header>
        <div class="body">
            <form method="post" action="/other/commentA">
                <fieldset>
                    <div class="control-group">
                        <div class="controls form-group">
                            <textarea id="description" rows="3" name="comment" class="form-control"></textarea>
                            <span class="help-block">こちらのエントリーに関するメモが記入できます。</span>
                        </div>
                    </div>

                    <div class="well well-sm well-white">
                        <div class="row">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-success"
                                        data-placement="top" data-original-title=".btn .btn-success">
                                    追加
                                </button>
                                <input type="hidden" name="entry_id" value="<?php echo $detail['entry_id']?>">
                            </div>
                        </div>

                    </div>

                    <?php if (count($detail['comment']) > 0) {?>
                    <ul class="list-group">
                        <?php foreach($detail['comment'] as $comment) { ?>
                        <li class="list-group-item">
                            <?php echo nl2br(str_replace('\n',"\n",$comment['comment'])); ?>
                            <a href="/other/commentD/?entry_id=<?php echo $detail['entry_id']; ?>&comment_id=<?php echo $comment['comment_id']; ?>"><i class="fa fa-trash-o"></i></a>
                            <span class="help-block"><?php echo $comment['created_at']; ?></span>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </fieldset>
            </form>
        </div>
    </section>
</div>

</div>


<form action="/career/entrydelete" method="post">
    <!-- 削除モーダル -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">削除</h4>
                </div>
                <div class="modal-body">
                    <?php echo $detail['c_name']?> の登録情報を削除します。
                    <br>
                    ご確認の上、削除ボタンを押してください。
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-danger">削除</button>
                    <input type="hidden" name="entry_id" value="<?php echo $detail['entry_id']?>"/>
                    <input type="hidden" name="company_id" value="<?php echo $detail['company_id']?>"/>
                    <input type="hidden" name="logo_path" value="<?php echo $detail['image_path']?>"/>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
