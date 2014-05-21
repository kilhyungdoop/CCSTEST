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
        <div class="panel-heading"><strong>転職管理ツールユーザ登録 (BETA)</strong></div>
        <?php if (isset($err_msg) === true && count($err_msg) > 0) { ?>
        <p><font color="#8b0000"><?php echo $err_msg; ?></font></p>
        <?php } ?>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="/auth/adduser_confirm" method="post">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ユーザ名</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail" name="username" value="<?php if(isset($val['username']) === true && empty($val['username']) === false){echo $val['username'];} ?>" placeholder="User Name">
                    </div>
                </div>
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmail" name="email" value="<?php if(isset($val['email']) === true && empty($val['email']) === false){echo $val['email'];} ?>" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">パスワード</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword" name="password" value="<?php if(isset($val['password']) === true && empty($val['password']) === false){echo $val['password'];} ?>" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">パスワード確認</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword" name="check_password" value="<?php if(isset($val['check_password']) === true && empty($val['check_password']) === false){echo $val['check_password'];} ?>" placeholder="Confirm Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">確認</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


</div>
</body>
</html>

