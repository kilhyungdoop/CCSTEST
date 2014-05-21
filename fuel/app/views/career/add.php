<div class="col-md-12">
    <section class="widget">
        <header>
            <h4><i class="fa fa-edit"></i> エントリー情報追加</h4>
        </header>
        <div class="body">

            <form class="form-horizontal label-left" enctype="multipart/form-data" action="/career/confirm" method="post">
                <fieldset>
                    <legend class="section"><strong>登録</strong></legend>
                    <?php if (isset($err_msg) === true && empty($err_msg) === false) {?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-ban"></i> <strong>正しく入力してください。</strong></h4>
                        <p><?php echo $err_msg; ?></p>
                    </div>
                    <?php } ?>
                    <div class="control-group">
                        <label class="control-label" for="InputCompanayName"><strong>紹介会社</strong></label>
                        <div class="controls form-group">
							<?php if (empty($recruit_company) === false) { ?>
                            <select class="form-control" name="recruit_company">
                                <option value="" > -- </option>
                                <?php foreach($recruit_company as $rc) { ?>
                                    <option value="<?php echo $rc['rc_id']. ':'. $rc['rc_name']; ?>" <?php if (isset($val['recruit_company']) === true && $rc['rc_id'] == $val['recruit_company']) echo "selected='selected'"; ?>><?php echo $rc['rc_name']; ?></option>
                                <?php } ?>
                            </select>
							<?php } else { ?>
                            <span class="help-block">
                                 紹介会社を利用していません。<br>
                                <a href="/recruit/rpost">紹介会社登録へ</a>
                            </span>
							<input type="hidden" name="recruit_company" value="">
							<?php } ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="InputCompanayName"><strong>企業名</strong> <span class="label label-danger">必須</span></label>
                        <div class="controls form-group">
                            <input type="text" class="form-control" id="InputCompanayName" name="c_name" value="<?php if(isset($val['c_name']) === true) {echo $val['c_name']; } ?>" placeholder="Enter Company Name">
                        </div>
                    </div>
                    <!--
                    <div class="control-group">
                        <label class="control-label" for="exampleInputFile"><strong>企業ロゴ</strong></label>
                        <div class="controls form-group">
                            <input type="file" id="exampleInputFile" name="c_logo">
                            <span class="help-block">編集時、ロゴを登録する場合、旧ロゴは削除されます。</span>
                        </div>
                    </div>
                    -->
                    <div class="control-group">
                        <label class="control-label" for="InputTypeOfJob"><strong>職種</strong> <span class="label label-danger">必須</span></label>
                        <div class="controls form-group">
                            <select class="form-control" name="job_type">
                                <?php foreach($job_type as $job) { ?>
                                    <option value="<?php echo $job['value']; ?>" <?php if (isset($val['job_type']) === true && $job['value'] == $val['job_type']) echo "selected='selected'"; ?>><?php echo $job['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="EmploymentStatus"><strong>雇用形態</strong> <span class="label label-danger">必須</span></label>
                        <div class="controls form-group">
                            <select class="form-control" name="e_status">
                                <?php foreach($employ_status as $status) { ?>
                                    <option value="<?php echo $status['value']; ?>" <?php if (isset($val['e_status']) === true && $status['value'] == $val['e_status']) echo "selected='selected'"; ?>><?php echo $status['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="Saraly"><strong>給与(年)</strong></label>
                        <div class="controls form-group">
                            <input type="number" class="form-control" id="" name="salary" placeholder="Enter Salary" value="<?php if(isset($val['salary']) === true) echo $val['salary']; ?>">
                            <span class="help-block">半角数字のみ 例> 5000000 </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"><strong>仕事内容</strong> <span class="label label-danger">必須</span></label>
                        <div class="controls form-group">
                            <textarea class="form-control" rows="3" name="job_detail"><?php if(isset($val['job_detail']) === true) echo $val['job_detail']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"><strong>企業情報</strong></label>
                        <div class="controls form-group">
                            <textarea class="form-control" rows="3" name="c_info"><?php if(isset($val['c_info']) === true) echo $val['c_info']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="InputWorkLocation"><strong>勤務地</strong></label>
                        <div class="controls form-group">
                            <input type="text" class="form-control" id="InputWorkLocation" name="c_place" placeholder="Enter Work Location" value="<?php if(isset($val['c_place']) === true) echo $val['c_place']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="PersonIncharge"><strong>担当者</strong></label>
                        <div class="controls form-group">
                            <input type="text" class="form-control" id="PersonIncharge" name="reception_name" placeholder="Enter Manager Name" value="<?php if(isset($val['reception_name']) === true) echo $val['reception_name']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for=""><strong>連絡先</strong></label>
                        <div class="controls form-group">
                            <input id="" type="tel" class="form-control" name="reception_tel" placeholder="Enter Tel Number" value="<?php if (isset($val['reception_tel']) === true && empty($val['reception_tel']) === false) echo $val['reception_tel']; ?>">
                            <span class="help-block">(123) 4567-8901</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="InformationMail"><strong>メールアドレス</strong></label>
                        <div class="controls form-group">
                            <input type="text" class="form-control" id="InformationMail" name="reception_mail" placeholder="Enter Mail Address" value="<?php if(isset($val['reception_mail']) === true) echo $val['reception_mail']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="InputCompanyUrl"><strong>ホームページ</strong></label>
                        <div class="controls form-group">
                            <input type="text" class="form-control" id="InputCompanyUrl" name="home_page" placeholder="Enter Company Url" value="<?php if(isset($val['home_page']) === true) echo $val['home_page']; ?>">
                        </div>
                    </div>
                    <div class="form-actions">
                        <div>
                            <input type="submit" class="btn btn-primary" name="btn_name" value="確認する">
                            <?php if (isset($val['entry_id']) === true) { ?>
                            <input type="hidden" name="entry_id" value="<?php echo $val['entry_id']; ?>">
                            <?php } ?>
                            <?php if (isset($val['company_id']) === true) { ?>
                            <input type="hidden" name="company_id" value="<?php echo $val['company_id']; ?>">
                            <?php } ?>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>
</div>
