
<div class="col-md-12">
    <section class="widget">
        <header>
            <h4><i class="fa fa-briefcase"></i> 紹介会社</h4>
        </header>
        <div class="body">
            <form class="form-horizontal label-left" action="/recruit/rconfirm" method="post">
                <fieldset>
                    <legend class="section">紹介会社情報</legend>
                    <?php if (isset($err_msg) === true && empty($err_msg) === false) {?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-ban"></i> <strong>正しく入力してください。</strong></h4>
                        <p><?php echo $err_msg; ?></p>
                    </div>
                    <?php } ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            会社名
                        </label>
                        <div class="controls form-group">
                            <input id="" type="text" class="form-control" name="rc_name" value="<?php if (isset($params['rc_name']) === true && empty($params['rc_name']) === false) echo $params['rc_name']?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="">
                            場所
                        </label>
                        <div class="controls form-group">
                            <input id="" type="text" class="form-control" name="rc_place" value="<?php if (isset($params['rc_place']) === true && empty($params['rc_place']) === false) echo $params['rc_place']?>">
                        </div>
                    </div>
                    <legend class="section">担当者情報</legend>
                    <div class="control-group">
                        <label class="control-label" for="">
                            名前
                        </label>
                        <div class="controls form-group">
                            <input id="" type="text" class="form-control" name="rc_mng_name" value="<?php if (isset($params['rc_mng_name']) === true && empty($params['rc_mng_name']) === false) echo $params['rc_mng_name']?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">
                            連絡先
                            <span class="help-block">半角数字, ハイフン不要</span>
                        </label>
                        <div class="controls form-group">
                            <input type="text" class="form-control" name="rc_mng_tel" value="<?php if (isset($params['rc_mng_tel']) === true && empty($params['rc_mng_tel']) === false) echo $params['rc_mng_tel']?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="">
                            メールアドレス
                        </label>
                        <div class="controls form-group">
                            <input id="" type="text" class="form-control" name="rc_mng_mail" value="<?php if (isset($params['rc_mng_mail']) === true && empty($params['rc_mng_mail']) === false) echo $params['rc_mng_mail']?>">
                        </div>
                    </div>
                    <div class="form-actions">
                        <div>
                            <input type="hidden" name="rc_id" value="<?php echo $params['rc_id']; ?>">
                            <button type="submit" class="btn btn-primary">確認する</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>

    </section>
</div>
