
<div class="col-md-12">
    <section class="widget">
        <header>
            <h4><i class="fa fa fa-calendar"></i> 進捗管理</h4>
        </header>
        <div class="body">
            <div class="form-horizontal label-left">
                <fieldset>
                    <legend class="section"><strong>確認</strong></legend>
                    <div class="control-group">
                        <label class="control-label" for="InputCompanayName">企業名</label>
                        <div class="controls form-group">
                            <p><?php echo $company_name_ja; ?></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">進捗状況</label>
                        <div class="controls form-group">
                            <p><?php echo $entry_status_ja; ?></p>
                        </div>
                    </div>

                    <?php if (empty($entry_date) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            エントリー日
                        </label>
                        <div class="controls form-group">
                            <p><?php echo $entry_date; ?></p>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if (empty($interview_date_1) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            1次面接日時
                        </label>
                        <div class="controls form-group">
                            <p><?php echo $interview_date_1; ?></p>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if (empty($interview_date_2) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            2次面接日時
                        </label>
                        <div class="controls form-group">
                            <p><?php echo $interview_date_2; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (empty($interview_date_3) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            3次面接日時
                        </label>
                        <div class="controls form-group">
                            <p><?php echo $interview_date_3; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (empty($interview_date_4) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            最終面接日時
                        </label>
                        <div class="controls form-group">
                            <p><?php echo $interview_date_4; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (empty($result_date) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            結果通知日
                        </label>
                        <div class="controls form-group">
                            <p><?php echo $result_date; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-actions">
                        <div>
                            <form action="/progress/post" method="post">
                                <button type="submit" class="btn btn-default">戻る</button>
                                <input type="hidden" name="progress_menu" value="<?php echo $progress_menu;?>">
                                <input type="hidden" name="e_status" value="<?php echo $e_status;?>">
                                <input type="hidden" name="entry_date" value="<?php echo $entry_date;?>">
                                <input type="hidden" name="interview_date_1" value="<?php echo $interview_date_1;?>">
                                <input type="hidden" name="interview_date_2" value="<?php echo $interview_date_2;?>">
                                <input type="hidden" name="interview_date_3" value="<?php echo $interview_date_3;?>">
                                <input type="hidden" name="interview_date_4" value="<?php echo $interview_date_4;?>">
                                <input type="hidden" name="result_date" value="<?php echo $result_date;?>">
                                <?php if (isset($entry_id) === true) { ?>
                                <input type="hidden" name="entry_id" value="<?php echo $entry_id;?>">
                                <?php } ?>
                            </form>
                            <form action="/progress/complete" method="post">
                                <button type="submit" class="btn btn-primary">登録</button>
                                <input type="hidden" name="progress_menu" value="<?php echo $progress_menu;?>">
                                <input type="hidden" name="e_status" value="<?php echo $e_status;?>">
                                <input type="hidden" name="entry_date" value="<?php echo $entry_date;?>">
                                <input type="hidden" name="interview_date_1" value="<?php echo $interview_date_1;?>">
                                <input type="hidden" name="interview_date_2" value="<?php echo $interview_date_2;?>">
                                <input type="hidden" name="interview_date_3" value="<?php echo $interview_date_3;?>">
                                <input type="hidden" name="interview_date_4" value="<?php echo $interview_date_4;?>">
                                <input type="hidden" name="result_date" value="<?php echo $result_date;?>">
                                <?php if (isset($entry_id) === true) { ?>
                                <input type="hidden" name="entry_id" value="<?php echo $entry_id;?>">
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </section>
</div>
