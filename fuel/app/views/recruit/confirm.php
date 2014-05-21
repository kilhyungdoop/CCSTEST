
<div class="col-md-12">
    <section class="widget">
        <header>
            <h4><i class="fa fa-briefcase"></i> 紹介会社</h4>
        </header>
        <div class="body">
            <div class="form-horizontal label-left">
                <fieldset>
                    <legend class="section">紹介会社情報</legend>
                    <div class="control-group">
                        <label class="control-label" for="">
                            会社名
                        </label>
                        <div class="controls form-group">
							<p><?php echo $rc_name;?></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="">
                            場所
                        </label>
                        <div class="controls form-group">
							<p><?php echo $rc_place;?></p>
                        </div>
                    </div>
                    <legend class="section">担当者情報</legend>
                    <div class="control-group">
                        <label class="control-label" for="">
                            名前
                        </label>
                        <div class="controls form-group">
							<p><?php echo $rc_mng_name;?></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="mask-phone">
                            連絡先
                        </label>
                        <div class="controls form-group">
							<p><?php echo $rc_mng_tel;?></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="">
                            メールアドレス
                        </label>
                        <div class="controls form-group">
							<p><?php echo $rc_mng_mail;?></p>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div>
            				<form action="/recruit/rpost" method="post">
                            <button type="submit" class="btn btn-default">戻る</button>
							<input type="hidden" name="rc_name" value="<?php echo $rc_name;?>">
							<input type="hidden" name="rc_place" value="<?php echo $rc_place;?>">
							<input type="hidden" name="rc_mng_name" value="<?php echo $rc_mng_name;?>">
							<input type="hidden" name="rc_mng_tel" value="<?php echo $rc_mng_tel;?>">
							<input type="hidden" name="rc_mng_mail" value="<?php echo $rc_mng_mail;?>">
                            <input type="hidden" name="rc_id" value="<?php echo $rc_id;?>">
							</form>
            				<form action="/recruit/rcomplete" method="post">
                            <button type="submit" class="btn btn-primary">登録</button>
							<input type="hidden" name="rc_name" value="<?php echo $rc_name;?>">
							<input type="hidden" name="rc_place" value="<?php echo $rc_place;?>">
							<input type="hidden" name="rc_mng_name" value="<?php echo $rc_mng_name;?>">
							<input type="hidden" name="rc_mng_tel" value="<?php echo $rc_mng_tel;?>">
							<input type="hidden" name="rc_mng_mail" value="<?php echo $rc_mng_mail;?>">
                            <input type="hidden" name="rc_id" value="<?php echo $rc_id;?>">
							</form>
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>

    </section>
</div>
