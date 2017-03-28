<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel">
    <div class="panel-heading">
        <p>Lịch sử khám bệnh</p>
    </div>
    <div class="list-group">
        <?php
        foreach ($the_view_content as $key => $val) {
            echo '<div class="list-group-item">' . $val['lskb_id'] . '</div>';
        }
        ?>
    </div>
</div>