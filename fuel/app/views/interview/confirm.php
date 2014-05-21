
<div class="col-md-12">
    <section class="widget">
        <header>
            <h4><i class="fa fa-microphone"></i> 面接準備</h4>
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

                    <?php if (empty($introduction) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            自己PR
                        </label>
                        <div class="controls form-group">
                            <p><?php echo $introduction; ?></p>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if (empty($motivation_letter) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            志望動機
                        </label>
                        <div class="controls form-group">
                            <p><?php echo $motivation_letter; ?></p>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if (empty($other) === false) { ?>
                    <div class="control-group">
                        <label class="control-label" for="">
                            その他
                        </label>
                        <div class="controls form-group">
                            <p><?php echo $other; ?></p>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="form-actions">
                        <div>
                            <form action="/interview/ipost" method="post">
                                <button type="submit" class="btn btn-default">戻る</button>
                                <input type="hidden" name="c_menu" value="<?php echo $c_menu;?>">
                                <input type="hidden" name="introduction" value="<?php echo $introduction;?>">
                                <input type="hidden" name="motivation_letter" value="<?php echo $motivation_letter;?>">
                                <input type="hidden" name="other" value="<?php echo $other;?>">
                                <?php if (isset($entry_id) === true) { ?>
                                <input type="hidden" name="entry_id" value="<?php echo $entry_id;?>">
                                <?php } ?>
                            </form>
                            <form action="/interview/complete" method="post">
                                <button type="submit" class="btn btn-primary">登録</button>
                                <input type="hidden" name="c_menu" value="<?php echo $c_menu;?>">
                                <input type="hidden" name="introduction" value="<?php echo $introduction;?>">
                                <input type="hidden" name="motivation_letter" value="<?php echo $motivation_letter;?>">
                                <input type="hidden" name="other" value="<?php echo $other;?>">
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
