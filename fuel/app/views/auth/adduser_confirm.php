<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>転職管理ツール (BETA)</title>

    <!-- Bootstrap core CSS -->
	<?php echo Asset::css('application.min.css'); ?>
    <?php echo Asset::js('lib/jquery/jquery-2.0.3.min.js'); ?>
    <?php echo Asset::js('lib/backbone/underscore-min.js'); ?>
    <?php echo Asset::js('settings.js'); ?>

</head>

<body>

<div class="container">
    <br>
    <div class="panel text-center">
        <div class="panel-heading"><strong>転職管理ツールユーザ登録確認 (BETA)</strong></div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="/auth/adduser_complete" method="post">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ユーザ名</label>
                    <p><?php echo $username; ?></p>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <p><?php echo $email; ?></p>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">パスワード</label>
                    <p><?php echo $password; ?></p>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">ユーザ登録</button>
                    </div>
                </div>
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="password" value="<?php echo $password; ?>">
            </form>

        </div>
    </div>


</div>
</body>
</html>

