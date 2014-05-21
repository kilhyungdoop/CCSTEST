<form action="" method="post">
    <div class="row">
        <div class="col-md-3">
            <select class="form-control input-small" name="recruit_company" onchange="submit(this.form)">
                <option value="title">紹介会社</option>
                <option value="all" <?php if(isset($params['recruit_company']) === true && $params['recruit_company'] === 'all') {echo 'selected=selected';} ?>>すべて</option>
                <?php foreach($recruit_company as $rc) { ?>
                    <option value="<?php echo $rc['value']; ?>" <?php if(isset($params['recruit_company']) === true && $params['recruit_company'] == $rc['value']) {echo 'selected=selected';} ?>><?php echo $rc['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-control input-small" name="status" onchange="submit(this.form)">
                <option value="title">選考状態選択</option>
                <option value="all" <?php if(isset($params['status']) === true && $params['status'] === 'all') {echo 'selected=selected';} ?>>すべて</option>
                <?php foreach($entry_status as $es) { ?>
                    <option value="<?php echo $es['value']; ?>" <?php if(isset($params['status']) === true && intval($params['status']) == $es['value']) {echo 'selected=selected';} ?>><?php echo $es['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-control input-small" name="order" onchange="submit(this.form)">
                <option>並び順</option>
                <option value="add" <?php if(isset($params['order']) === true && $params['order'] === 'add') {echo 'selected=selected';} ?>>登録日順</option>
                <option value="entry" <?php if(isset($params['order']) === true && $params['order'] === 'entry') {echo 'selected=selected';} ?>>エントリー日順</option>
            </select>
        </div>
    </div>
</form>

