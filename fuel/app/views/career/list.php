
        <div class="row">
            <div class="col-md-12">
                <section class="widget">

                    <header>
                        <h4>
                            <i class="fa fa-list-ol"></i>
                            エントリーリスト
                        </h4>
                        <p class="text-right">
                            <a href="/career/add/" type="button" class="btn btn-default btn-sm" data-placement="top" data-original-title=".btn .btn-default .btn-sm">
                                エントリー企業登録
                            </a>
                        </p>
                    </header>

                    <div class="body">

                        <?php if($list_view_flg === true) {?>
                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>企業名</th>
                                <th class="hidden-xs-portrait">職種/仕事内容</th>
                                <th>進捗</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($entry_list as $key => $val) { ?>
                            <tr onClick="window.location.href='/career/entrydetail/?entry_id=<?php echo $val['entry_id']; ?>'">
                                <td><?php echo $key+1; ?></td>
                                <td><strong><?php echo $val['name']; ?></strong></td>
                                <td class="hidden-xs-portrait">
                                    <strong><?php echo $val['job_type']; ?></strong><br>
                                    <?php echo $val['job_detail']; ?><br>
                                    <?php echo 'エントリ日: '. $val['entry_date']?>
                                </td>
                                <td><span class="badge <?php echo $val['entry_status']['label_css']; ?>"><?php echo $val['entry_status']['name']; ?></span></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
            			<?php } else { ?>
                        <div class="form-group">
                			<span class="help-block">
                                <?php if (empty($params['keyword']) === true) { ?>
               					 現在、応募中の企業はありません。<br>
                				<a href="/career/add">エントリー企業登録へ</a>
                                <?php } else { ?>
                                「<?php echo $params['keyword']; ?>」 にマッチするエントリー情報はありません。<br>
                                <?php } ?>
                			</span>
                        </div>

						<?php } ?>

                    </div>
                </section>
            </div>
        </div>
