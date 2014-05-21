<div class="col-md-12">
    <h2 class="page-title" style="margin: 1px 0 20px -10px;">My Home <small>dashboard</small></h2>
</div>

<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="box">
            <div class="big-text">
                <?php echo $params['entry_data_cnt'];?>
            </div>
            <div class="description">
                <p>登録企業数 </p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="box">
            <div class="big-text">
                <?php echo $params['resume_pass_ratio']; ?>%
            </div>
            <div class="description">
                <i class="fa fa-user"></i>
                書類審査通過率
            </div>
        </div>
    </div>

    <!--
    <div class="col-md-2 col-sm-4 col-xs-6">
        <div class="box">
            <div class="icon">
                <i class="fa fa-briefcase"></i>
            </div>
            <div class="description">
                <p><?php echo $params['recruit_company_cnt'];?> 紹介会社数</p>
            </div>
        </div>
    </div>
    -->

    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="box">
            <div class="big-text">
                +0
            </div>
            <div class="description">
                <i class="fa fa-comments"></i>
                Comments
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="box">
            <div class="big-text">
                <?php echo $params['pass_ratio']; ?>%
            </div>
            <div class="description">
                <i class="fa fa-arrow-right"></i>
                内定率
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <section class="widget">
            <header>
                <h4> <i class="fa fa-caret-right"></i> 進捗状況 </h4>
            </header>
            <div class="body">
                <?php if ($params['status_gb_cnt']['all'] > 0) {?>

                    <?php if ($params['status_gb_cnt']['plan'][0] == '0') { ?>
                    <h6 class="no-margin weight-normal">エントリー予定 (<?php echo $params['status_gb_cnt']['plan'][0]; ?>)</h6>
                    <?php } else { ?>
                    <a href="/career/entrylist/?status=1">
                        <h6 class="no-margin weight-normal">エントリー予定 (<?php echo $params['status_gb_cnt']['plan'][0]; ?>)</h6>
                    </a>
                    <?php } ?>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-default" style="width: <?php echo $params['status_gb_cnt']['plan'][1]; ?>%;"><?php echo $params['status_gb_cnt']['plan'][1]; ?>%</div>
                    </div>

                    <?php if ($params['status_gb_cnt']['resume'][0] == '0') { ?>
                    <h6 class="no-margin weight-normal">書類選考中 (<?php echo $params['status_gb_cnt']['resume'][0]; ?>)</h6>
                    <?php } else { ?>
                    <a href="/career/entrylist/?status=2">
                        <h6 class="no-margin weight-normal">書類選考中 (<?php echo $params['status_gb_cnt']['resume'][0]; ?>)</h6>
                    </a>
                    <?php } ?>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-warning" style="width: <?php echo $params['status_gb_cnt']['resume'][1]; ?>%;"><?php echo $params['status_gb_cnt']['resume'][1]; ?>%</div>
                    </div>

                    <?php if ($params['status_gb_cnt']['interview'][0] == '0') { ?>
                    <h6 class="no-margin weight-normal">面接待ち (<?php echo $params['status_gb_cnt']['interview'][0]; ?>)</h6>
                    <?php } else { ?>
                    <a href="/career/entrylist/?status=3-6">
                        <h6 class="no-margin weight-normal">面接待ち (<?php echo $params['status_gb_cnt']['interview'][0]; ?>)</h6>
                    </a>
                    <?php } ?>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info" style="width: <?php echo $params['status_gb_cnt']['interview'][1]; ?>%;"><?php echo $params['status_gb_cnt']['interview'][1]; ?>%</div>
                    </div>

                    <?php if ($params['status_gb_cnt']['pass'][0] == '0') { ?>
                    <h6 class="no-margin weight-normal">内定 (<?php echo $params['status_gb_cnt']['pass'][0]; ?>)</h6>
                    <?php } else { ?>
                    <a href="/career/entrylist/?status=7">
                        <h6 class="no-margin weight-normal">内定 (<?php echo $params['status_gb_cnt']['pass'][0]; ?>)</h6>
                    </a>
                    <?php } ?>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: <?php echo $params['status_gb_cnt']['pass'][1]; ?>%;"><?php echo $params['status_gb_cnt']['pass'][1]; ?>%</div>
                    </div>

                    <?php if ($params['status_gb_cnt']['failure'][0] == '0') { ?>
                    <h6 class="no-margin weight-normal">不採用 (<?php echo $params['status_gb_cnt']['failure'][0]; ?>)</h6>
                    <?php } else { ?>
                    <a href="/career/entrylist/?status=8">
                        <h6 class="no-margin weight-normal">不採用 (<?php echo $params['status_gb_cnt']['failure'][0]; ?>)</h6>
                    </a>
                    <?php } ?>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: <?php echo $params['status_gb_cnt']['failure'][1]; ?>%;"><?php echo $params['status_gb_cnt']['failure'][1]; ?>%</div>
                    </div>

                <?php } else { ?>
                    <span class="help-block">
                            進捗を登録していません。<br>
                            <a href="/progress/post">進捗登録へ</a>
                        </span>
                <?php } ?>
            </div>
        </section>
    </div>

    <div class="col-md-4">
        <section class="widget">
            <header>
                <h4> <i class="fa fa-caret-right"></i> 紹介会社実績 </h4>
            </header>
            <div class="body">
                <?php if (count($params['recruit_gb_cnt']) > 0) { ?>
                    <?php foreach ($params['recruit_gb_cnt'] as $key => $val) { ?>
                        <a href="/career/entrylist/?recruit_company=<?php echo $val[2]; ?>">
                        <h6 class="no-margin weight-normal"><?php echo $key. ' ('. $val[0]. ') '; ?></h6>
                        </a>
                        <div class="progress progress-small">
                            <div class="progress-bar progress-bar-warning" style="width: <?php echo $val[1]; ?>%;"></div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <span class="help-block">
                            紹介会社を利用していません。<br>
                            <a href="/recruit/rpost">紹介会社登録へ</a>
                        </span>
                <?php } ?>
            </div>
        </section>
    </div>
</div>
