<script type="text/javascript">
	$(document).ready(
		function(){
			$('#InputCompanayName').change(
				function(){
					$.ajax({
						type:"POST",
						url:"/ajax/progressdata",
						dataType:"json",
						data: "entry_id="+ $("#InputCompanayName").val(),
						success: function(progress_info){
                            $('input[name=entry_id]').val(progress_info.entry_id);
							if (typeof progress_info.entry_date != 'undefined') {
								$('input[name=entry_date]').val(progress_info.entry_date);
                            }
                            if (typeof progress_info.e_status != 'undefined') {
                                $('input[name=e_status]').val([progress_info.e_status]);
                            }
                            if (typeof progress_info.interview_date_1 != 'undefined') {
                                $('input[name=interview_date_1]').val(progress_info.interview_date_1);
                            }
                            if (typeof progress_info.interview_date_2 != 'undefined') {
                                $('input[name=interview_date_2]').val(progress_info.interview_date_2);
                            }
                            if (typeof progress_info.interview_date_3 != 'undefined') {
                                $('input[name=interview_date_3]').val(progress_info.interview_date_3);
                            }
                            if (typeof progress_info.interview_date_4 != 'undefined') {
                                $('input[name=interview_date_4]').val(progress_info.interview_date_4);
                            }
                            if (typeof progress_info.result_date != 'undefined') {
                                $('input[name=result_date]').val(progress_info.result_date);
                            }
						}
					})
				}
			);

		}
	);
</script>

<div class="col-md-12">
    <section class="widget">
        <header>
            <h4><i class="fa fa fa-calendar"></i> 進捗管理</h4>
        </header>
        <div class="body">
            <?php if (count($progress_menu) > 0) { ?>
            <form class="form-horizontal label-left" action="/progress/confirm" method="post">
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
                            <label class="control-label" for="InputCompanayName"><strong>企業名</strong> <span class="label label-danger">必須</span></label>
                            <div class="controls form-group">
                                <select class="selectpicker" data-style="btn-default"
                                        tabindex="-1" id="InputCompanayName" name="progress_menu">
                                    <option value="" > -- </option>
                                    <?php foreach($progress_menu as $key => $c_name) { ?>
                                        <option value="<?php echo $c_name['entry_id']; ?>" <?php if (isset($params['progress_menu']) === true && $c_name['entry_id'] == $params['progress_menu']) {?> selected="selected" <?php } ?>><?php echo $c_name['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>進捗状況</strong> <span class="label label-danger">必須</span></label>
                            <div class="controls form-group">
                                <?php foreach($entry_status as $key => $e_status) { ?>
                                    <label class="radio">
                                        <input type="radio" id="radio-4" name="e_status" value="<?php echo $e_status['value']; ?>" <?php if (isset($params['e_status']) === true && $e_status['value'] == $params['e_status']) {?>checked="checked"<?php } ?>><?php echo $e_status['name']; ?>
                                    </label>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="mask-date">
                                <strong>エントリー日</strong>
                            </label>
                            <div class="controls form-group">
                                <input id="mask-date" type="text" class="form-control" name="entry_date" value="<?php if (isset($params['entry_date']) === true && empty($params['entry_date']) === false) echo $params['entry_date']; ?>">
                                <span class="help-block">
                                    進捗状況が「エントリー予定」以外は必須<br>
                                    入力形式「年-月-日」
                                </span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="mask-datetime-1">
                                <strong>1次面接日時</strong>
                            </label>
                            <div class="controls form-group">
                                <input id="mask-datetime-1" type="text" class="form-control" name="interview_date_1" value="<?php if (isset($params['interview_date_1']) === true && empty($params['interview_date_1']) === false) echo $params['interview_date_1']; ?>">
                                <span class="help-block"> 入力形式「年-月-日 時:分」</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="mask-datetime-2">
                                <strong>2次面接日時</strong>
                            </label>
                            <div class="controls form-group">
                                <input id="mask-datetime-2" type="text" class="form-control" name="interview_date_2" value="<?php if (isset($params['interview_date_2']) === true && empty($params['interview_date_2']) === false) echo $params['interview_date_2']; ?>">
                                <span class="help-block"> 入力形式「年-月-日 時:分」</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="mask-datetime-3">
                                <strong>3次面接日時</strong>
                            </label>
                            <div class="controls form-group">
                                <input id="mask-datetime-3" type="text" class="form-control" name="interview_date_3" value="<?php if (isset($params['interview_date_3']) === true && empty($params['interview_date_3']) === false) echo $params['interview_date_3']; ?>">
                                <span class="help-block"> 入力形式「年-月-日 時:分」</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="mask-datetime-4">
                                <strong>最終面接日時</strong>
                            </label>
                            <div class="controls form-group">
                                <input id="mask-datetime-4" type="text" class="form-control" name="interview_date_4" value="<?php if (isset($params['interview_date_4']) === true && empty($params['interview_date_4']) === false) echo $params['interview_date_4']; ?>">
                                <span class="help-block"> 入力形式「年-月-日 時:分」 </span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="mask-date-2">
                                <strong>結果通知日</strong>
                            </label>
                            <div class="controls form-group">
                                <input id="mask-date-2" type="text" class="form-control" name="result_date" value="<?php if (isset($params['result_date']) === true && empty($params['result_date']) === false) echo $params['result_date']; ?>">
                                <span class="help-block"> 入力形式「年-月-日」</span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div>
                                <input type="submit" class="btn btn-primary" name="btn_name" value="確認する">
                                <input type="hidden" name="entry_id" value="<?php if (isset($params['entry_id']) === true) echo $params['entry_id']; ?>">
                            </div>
                        </div>

                    <?php } else { ?>
                        <div class="form-group">
                			<span class="help-block">
                				現在、応募中の企業はありません。<br>
                				エントリー企業登録後、進捗の登録ができます。<br>
                				<a href="/career/add">エントリー企業登録へ</a>
                			</span>
                        </div>
                    <?php } ?>
                </fieldset>
            </form>
        </div>
    </section>
</div>
