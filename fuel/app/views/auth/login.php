<!DOCTYPE html>
<html>
<head>
    <title>転職管理ツール (BETA)</title>
    <?php echo Asset::css('application.min.css'); ?>
    <?php echo html_tag('link', array( 'rel' => 'shortcut icon', 'href' => Asset::get_file('favicon.png', 'img'))); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="就職,転職,エントリー,リクルート,進捗管理,管理ツール">
    <meta name="description" content="就職・転職時にエントリー企業管理や進捗管理をウェブから行います。リクルート会社毎の紹介成績、書類選考通過率、内定率をダッシュボードから把握できます。PCで情報を登録してスマートフォンからみるのも簡単。あらゆる場面であなたの就活をサポートします。">
    <meta name="author" content="">
    <meta charset="utf-8">
    <?php echo Asset::js('lib/jquery/jquery-2.0.3.min.js'); ?>
    <?php echo Asset::js('lib/backbone/underscore-min.js'); ?>
    <?php echo Asset::js('settings.js'); ?>
</head>
<body>
<div class="single-widget-container">
    <section class="widget login-widget">
        <header class="text-align-center">
            <h4>職サポ(BETA) ログイン</h4>
        </header>
        <?php if (isset($err_msg) === true && count($err_msg) > 0) { ?>
            <p class="text-center text-danger"><small><?php echo $err_msg; ?></small></p>
        <?php } ?>
        <div class="body">
            <form class="no-margin"
                  action="" method="post">
                <fieldset>
                    <div class="form-group no-margin">
                        <label for="user_name" >ユーザ名</label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="eicon-user"></i>
                                </span>
                            <input id="user_name" class="form-control input-lg"
                                   placeholder="Your User Name" name="username">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="password" >パスワード</label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                            <input id="password" type="password" class="form-control input-lg"
                                   placeholder="Your Password" name="password">
                        </div>

                    </div>
                </fieldset>
                <div class="form-actions">
                    <button type="submit" class="btn btn-block btn-lg btn-danger">
                        <span class="small-circle"><i class="fa fa-caret-right"></i></span>
                        <small>Sign In</small>
                    </button>
                    <!--<div class="forgot"><a class="forgot" href="">新規会員登録（無料）はこちら。</a></div>-->
                    <span class="help-block"><p align="center">
						現在、ユーザ登録を制限しています。<br>登録を希望する方は以下のメール宛に問い合わせをお願いいたします
                        <a href="mailto:hyungdookil@gmail.com?subject=会員登録の件について">hyungdookil@gmail.com</a>
						</p></span>
                </div>
            </form>
        </div>
		<!--
        <footer>
            <div class="facebook-login">
                <a href="index.html"><span><i class="fa fa-facebook-square fa-lg"></i> LogIn with Facebook</span></a>
            </div>
        </footer>
		-->
    </section>
</div>
</body>
</html>
