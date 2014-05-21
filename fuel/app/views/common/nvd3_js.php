<!-- d3, nvd3-->
<?php echo Asset::js('lib/nvd3/lib/d3.v2.js'); ?>
<?php echo Asset::js('lib/nvd3/nv.d3.custom.js'); ?>

<!-- nvd3 models -->
<?php echo Asset::js('lib/nvd3/src/models/scatter.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/axis.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/legend.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/stackedArea.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/stackedAreaChart.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/line.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/pie.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/pieChartTotal.js'); ?>
<?php echo Asset::js('lib/nvd3/stream_layers.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/lineChart.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/multiBar.js'); ?>
<?php echo Asset::js('lib/nvd3/src/models/multiBarChart.js'); ?>

<!-- jquery and friends -->
<?php echo Asset::js('lib/jquery/jquery-2.0.3.min.js'); ?>

<!-- jquery plugins -->
<?php echo Asset::js('lib/jquery-maskedinput/jquery.maskedinput.js'); ?>
<?php echo Asset::js('lib/parsley/parsley.js'); ?>
<?php echo Asset::js('lib/icheck.js/jquery.icheck.js'); ?>
<?php echo Asset::js('lib/select2.js'); ?>
<?php echo Asset::js('lib/jquery.autogrow-textarea.js'); ?>

<!--backbone and friends -->
<?php echo Asset::js('lib/backbone/underscore-min.js'); ?>

<!-- bootstrap default plugins -->
<?php echo Asset::js('lib/bootstrap/transition.js'); ?>
<?php echo Asset::js('lib/bootstrap/collapse.js'); ?>
<?php echo Asset::js('lib/bootstrap/alert.js'); ?>
<?php echo Asset::js('lib/bootstrap/tooltip.js'); ?>
<?php echo Asset::js('lib/bootstrap/popover.js'); ?>
<?php echo Asset::js('lib/bootstrap/button.js'); ?>
<?php echo Asset::js('lib/bootstrap/dropdown.js'); ?>
<?php echo Asset::js('lib/bootstrap/modal.js'); ?>
<?php echo Asset::js('lib/bootstrap/tab.js'); ?>

<!-- bootstrap custom plugins -->
<?php echo Asset::js('lib/bootstrap-datepicker.js'); ?>
<?php echo Asset::js('lib/bootstrap-select/bootstrap-select.js'); ?>
<?php echo Asset::js('lib/wysihtml5/wysihtml5-0.3.0_rc2.js'); ?>
<?php echo Asset::js('lib/bootstrap-wysihtml5/bootstrap-wysihtml5.js'); ?>
<?php echo Asset::js('lib/bootstrap-switch.js'); ?>
<?php echo Asset::js('lib/bootstrap-colorpicker.js'); ?>

<!-- basic application js-->
<?php echo Asset::js('app.js'); ?>
<?php echo Asset::js('settings.js'); ?>

<!-- page specific -->
<?php echo Asset::js('forms-elemets.js'); ?>

<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Background</div>
        <div id="background-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% dark = background == 'dark'; light = background == 'light';%>
            <button type="button" data-value="dark" class="btn btn-sm btn-transparent <%= dark? 'active' : '' %>">Dark</button>
            <button type="button" data-value="light" class="btn btn-sm btn-transparent <%= light? 'active' : '' %>">Light</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-transparent <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-transparent <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-transparent <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-transparent <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>White Version</div>
        <div>
            <a href="white/" class="btn btn-sm btn-transparent">&nbsp; Switch &nbsp;   <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
        <% auto = sidebarState == 'auto'%>
        <% if (auto) {%>
            <button type="button"
                    data-value="icons"
                    class="btn-icons btn btn-transparent btn-sm">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">Auto</button>
        <%} else {%>
            <button type="button"
                    data-value="auto"
                    class="btn btn-transparent btn-sm">Auto</button>
        <% } %>
</script>
