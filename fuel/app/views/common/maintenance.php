<!DOCTYPE html>
<html>
<head>
    <title>転職サポート（BETA）</title>
    <?php echo Asset::css('application.min.css'); ?>
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <?php echo Asset::js('lib/jquery/jquery-2.0.3.min.js'); ?>
    <?php echo Asset::js('lib/parsley/parsley.js'); ?>
    <?php echo Asset::js('lib/backbone/underscore-min.js'); ?>
    <?php echo Asset::js('settings.js'); ?>
</head>
<body class="background-dark">
<div class="single-widget-container error-page">
    <section class="widget transparent widget-404">
        <div class="body">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="text-align-center">503</h1>
                </div>
                <div class="col-md-7">
                    <div class="description">
                        <!--<h3>Opps, it seems that this page does not exist here.</h3>-->
                        <h3>現在、メンテナンス中です。</h3>
                        <p>
                            お問い合わせ先：<br>
                            <a href="mailto:hyungdookil@gmail.com?subject=メンテナンスの件について">hyungdookil@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--
    <section class="widget widget-404-search">
        <div class="body no-margin">
            <form class="form-inline form-search no-margin text-align-center" method="get" action="special_search.html"
                  role="form">
                <div class="input-group">
                    <input type="search" class="form-control"
                           placeholder="Pages: Posts, Tags">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            &nbsp; Search &nbsp;
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </section>
    -->
</div>
</body>
</html>