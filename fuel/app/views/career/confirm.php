<div class="col-md-12">
    <section class="widget">
        <header>
            <h4><i class="fa fa-edit"></i> エントリー情報追加</h4>
        </header>
        <div class="body">
            <div class="form-horizontal label-left">
                <fieldset>
                    <legend class="section"><strong>確認</strong></legend>
                    <?php if(empty($disp['recruit_company']) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="InputCompanayName"><strong>紹介会社</strong></label>
                        <div class="controls form-group">
                            <p><?php echo $disp['recruit_company_ja']; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="control-group">
                        <label class="control-label" for="InputCompanayName"><strong>企業名</strong></label>
                        <div class="controls form-group">
                            <p><?php echo $disp['c_name']; ?></p>
                        </div>
                    </div>
                    <?php if(empty($logo_path) === false) { ?>
                        <div class="control-group">
                            <label class="control-label" for="InputCompanayName"><strong>企業ロゴ</strong></label>
                            <div class="controls form-group">
                                <p><?php echo Asset::img('tmp/'. $logo_path, array('class' => 'thumbnail', 'width' => 160)); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="control-group">
                        <label class="control-label" for="InputCompanayName"><strong>職種</strong></label>
                        <div class="controls form-group">
                            <p><?php echo $disp['job_type']; ?></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="InputCompanayName"><strong>雇用形態</strong></label>
                        <div class="controls form-group">
                            <p><?php echo $disp['e_status']; ?></p>
                        </div>
                    </div>
                    <?php if(empty($disp['salary']) === false) { ?>
                        <div class="control-group">
                            <label class="control-label" for="InputCompanayName"><strong>給与(年)</strong></label>
                            <div class="controls form-group">
                                <p><?php echo $disp['salary']; ?></p></p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="control-group">
                        <label class="control-label" for="InputCompanayName"><strong>仕事内容</strong></label>
                        <div class="controls form-group">
                            <p><?php echo $disp['job_detail']; ?></p>
                        </div>
                    </div>
                    <?php if(empty($disp['c_info']) === false) { ?>
                        <div class="control-group">
                            <label class="control-label" for="InputCompanayName"><strong>企業情報</strong></label>
                            <div class="controls form-group">
                                <p><?php echo $disp['c_info']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(empty($disp['c_place']) === false) { ?>
                        <div class="control-group">
                            <label class="control-label" for="InputCompanayName"><strong>勤務地</strong></label>
                            <div class="controls form-group">
                                <p><?php echo $disp['c_place']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(empty($disp['reception_name']) === false) { ?>
                        <div class="control-group">
                            <label class="control-label" for="InputCompanayName"><strong>担当者</strong></label>
                            <div class="controls form-group">
                                <p><?php echo $disp['reception_name']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(empty($disp['reception_tel']) === false) { ?>
                        <div class="control-group">
                            <label class="control-label" for="InputCompanayName"><strong>連絡先</strong></label>
                            <div class="controls form-group">
                                <p><?php echo $disp['reception_tel']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(empty($disp['reception_mail']) === false) { ?>
                        <div class="control-group">
                            <label class="control-label" for="InputCompanayName"><strong>メールアドレス</strong></label>
                            <div class="controls form-group">
                                <p><?php echo $disp['reception_mail']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(empty($disp['home_page']) === false) { ?>
                        <div class="control-group">
                            <label class="control-label" for="InputCompanayName"><strong>ホームページ</strong></label>
                            <div class="controls form-group">
                                <p><?php echo $disp['home_page']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-actions">
                        <div>
                            <form action="/career/add" method="post">
                                <button type="submit" class="btn btn-default">戻る</button>
                                <input type='hidden'  name="c_name" value="<?php echo $val['c_name']; ?>">
                                <input type='hidden'  name="c_logo" value="<?php echo $logo_path; ?>">
                                <input type='hidden'  name="job_type" value="<?php echo $val['job_type']; ?>">
                                <input type='hidden'  name="e_status" value="<?php echo $val['e_status']; ?>">
                                <input type='hidden'  name="recruit_company" value="<?php echo $disp['recruit_company']; ?>">
                                <input type='hidden'  name="salary" value="<?php echo $val['salary']; ?>">
                                <input type='hidden'  name="job_detail" value="<?php echo $val['job_detail']; ?>">
                                <input type='hidden'  name="c_info" value="<?php echo $val['c_info']; ?>">
                                <input type='hidden'  name="c_place" value="<?php echo $val['c_place']; ?>">
                                <input type='hidden'  name="reception_name" value="<?php echo $val['reception_name']; ?>">
                                <input type='hidden'  name="reception_tel" value="<?php echo $val['reception_tel']; ?>">
                                <input type='hidden'  name="reception_mail" value="<?php echo $val['reception_mail']; ?>">
                                <input type='hidden'  name="home_page" value="<?php echo $val['home_page']; ?>">
                                <?php if (isset($val['entry_id']) === true) { ?>
                                <input type='hidden'  name="entry_id" value="<?php echo $val['entry_id']; ?>">
                                <?php } ?>
                                <?php if (isset($val['company_id']) === true) { ?>
                                <input type="hidden" name="company_id" value="<?php echo $val['company_id']; ?>">
                                <?php } ?>
                            </form>
                            <form action="/career/complete" method="post">
                                <button type="submit" class="btn btn-primary">登録</button>
                                <input type='hidden'  name="c_name" value="<?php echo $val['c_name']; ?>">
                                <input type='hidden'  name="c_logo" value="<?php echo $logo_path; ?>">
                                <input type='hidden'  name="job_type" value="<?php echo $val['job_type']; ?>">
                                <input type='hidden'  name="e_status" value="<?php echo $val['e_status']; ?>">
                                <input type='hidden'  name="recruit_company" value="<?php echo $disp['recruit_company']; ?>">
                                <input type='hidden'  name="salary" value="<?php echo $val['salary']; ?>">
                                <input type='hidden'  name="job_detail" value="<?php echo $val['job_detail']; ?>">
                                <input type='hidden'  name="c_info" value="<?php echo $val['c_info']; ?>">
                                <input type='hidden'  name="c_place" value="<?php echo $val['c_place']; ?>">
                                <input type='hidden'  name="reception_name" value="<?php echo $val['reception_name']; ?>">
                                <input type='hidden'  name="reception_tel" value="<?php echo $val['reception_tel']; ?>">
                                <input type='hidden'  name="reception_mail" value="<?php echo $val['reception_mail']; ?>">
                                <input type='hidden'  name="home_page" value="<?php echo $val['home_page']; ?>">
                                <?php if (isset($val['entry_id']) === true) { ?>
                                <input type='hidden'  name="entry_id" value="<?php echo $val['entry_id']; ?>">
                                <?php } ?>
                                <?php if (isset($val['company_id']) === true) { ?>
                                <input type="hidden" name="company_id" value="<?php echo $val['company_id']; ?>">
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </section>
</div>
