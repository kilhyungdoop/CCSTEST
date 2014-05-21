<script type="text/javascript">
	$(document).ready(
		function(){
			$('#InputCompanayName').change(
				function(){
					$.ajax({
						type:"POST",
						url:"/ajax/interviewdata",
						dataType:"json",
						data: "entry_id="+ $("#InputCompanayName").val(),
						success: function(interview_info){
                            $('input[name=entry_id]').val(interview_info.entry_id);
							if (typeof interview_info.introduction != 'undefined') {
                                $('#introduction').val(interview_info.introduction);
                            }
                            if (typeof interview_info.motivation_letter != 'undefined') {
                                $('#motivation_letter').val([interview_info.motivation_letter]);
                            }
                            if (typeof interview_info.other != 'undefined') {
                                $('#other').val(interview_info.other);
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
            <h4><i class="fa fa-microphone"></i> 面接準備</h4>
        </header>
        <div class="body">
            <?php if (count($c_menu) > 0) { ?>
            <form class="form-horizontal label-left" action="/interview/confirm" method="post">
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
                                        tabindex="-1" id="InputCompanayName" name="c_menu">
                                    <option value="" > -- </option>
                                    <?php foreach($c_menu as $key => $c_name) { ?>
                                        <option value="<?php echo $c_name['entry_id']; ?>" <?php if (isset($params['c_menu']) === true && $c_name['entry_id'] == $params['c_menu']) {?> selected="selected" <?php } ?>><?php echo $c_name['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="introduction">
                                <strong>自己PR</strong>
                            </label>
                            <div class="controls form-group">
                                <textarea rows="3" class="autogrow form-control" id="introduction" name="introduction"><?php if (isset($params['introduction']) === true && empty($params['introduction']) === false) echo $params['introduction']; ?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="motivation_letter">
                                <strong>志望動機</strong>
                            </label>
                            <div class="controls form-group">
                                <textarea rows="3" class="autogrow form-control" id="motivation_letter" name="motivation_letter"><?php if (isset($params['motivation_letter']) === true && empty($params['motivation_letter']) === false) echo $params['motivation_letter']; ?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="other">
                                <strong>その他</strong>
                            </label>
                            <div class="controls form-group">
                                <textarea rows="3" class="autogrow form-control" id="other" name="other"><?php if (isset($params['other']) === true && empty($params['other']) === false) echo $params['other']; ?></textarea>
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
                				エントリー企業登録後、面接準備機能がご利用できます。<br>
                				<a href="/career/add">エントリー企業登録へ</a>
                			</span>
                        </div>
                    <?php } ?>
                </fieldset>
            </form>
        </div>
    </section>
</div>
