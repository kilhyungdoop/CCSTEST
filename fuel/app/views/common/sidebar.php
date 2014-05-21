<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">
        <li <?php if ($action_name === 'home') { ?> class="active" <?php } ?>>
            <a href="/dashboard/home"><span class="name"><p><i class="fa fa-home"></i>ホーム</p></span></a>
        </li>
        <li <?php if ($action_name === 'entrylist') { ?> class="active" <?php } ?>>
            <a href="/career/entrylist"><span class="name"><p><i class="fa fa-list-ol"></i> エントリー情報</p></span></a>
        </li>
        <li <?php if ($action_name === 'rlist') { ?> class="active" <?php } ?>>
            <a href="/recruit/rlist"><span class="name"><p><i class="fa fa-briefcase"></i>紹介会社情報</p></span></a>
        </li>
        <li <?php if ($action_name === 'progress') { ?> class="active" <?php } ?>>
            <a href="/progress/post"><span class="name"><p><i class="fa fa-calendar"></i>進捗管理</p></span></a>
        </li>
        <li <?php if ($action_name === 'interview') { ?> class="active" <?php } ?>>
            <a href="/interview/ipost"><span class="name"><p><i class="fa fa-microphone"></i>面接準備</p></span></a>
        </li>
        <li>
            <a href="mailto:hyungdookil@gmail.com?subject=エラー報告"><span class="name"><p class="text-danger"><i class="fa fa-bug"></i>改善点などを<br>管理者に連絡</p></span></a>
        </li>

        <!--
        <li class="panel">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#stats-collapse"><i class="fa fa-bar-chart-o"></i> <span class="name">メニュー1</span></a>
            <ul id="stats-collapse" class="panel-collapse collapse">
                <li><a href="stat_statistics.html">Stats</a></li>
                <li><a href="stat_charts.html">Charts</a></li>
                <li><a href="stat_realtime.html">Realtime</a></li>
            </ul>
        </li>
        <li class="panel">
            <a class="accordion-toggle collapsed" data-toggle="collapse"
               data-parent="#side-nav" href="#ui-collapse"><i class="fa fa-magic"></i> <span class="name">メニュー2</span></a>
            <ul id="ui-collapse" class="panel-collapse collapse">
                <li><a href="ui_buttons.html">Buttons</a></li>
                <li><a href="ui_dialogs.html">Dialogs</a></li>
                <li><a href="ui_icons.html">Icons</a></li>
                <li><a href="ui_tabs.html">Tabs</a></li>
                <li><a href="ui_accordion.html">Accordion</a></li>
            </ul>
        </li>
        -->
        <li class="visible-xs">
            <a href="/auth/logout"><i class="fa fa-sign-out"></i> <span class="name">Sign Out</span></a>
        </li>
    </ul>

    <div id="sidebar-settings" class="settings">
        <button type="button"
                data-value="icons"
                class="btn-icons btn btn-transparent btn-sm">Icons</button>
        <button type="button"
                data-value="auto"
                class="btn-auto btn btn-transparent btn-sm">Auto</button>
    </div>
</nav>

