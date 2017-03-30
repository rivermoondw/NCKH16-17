<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Lịch sử khám bệnh</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 10px">STT</th>
                <th>Tiêu đề</th>
                <th>Ngày khám</th>
                <th>Ngày nhập</th>
            </tr>
            <?php
            $i = 0;
            foreach ($the_view_content as $key => $val) {
                $i++;
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $val['tieude'] . '</td>';
                /*echo '<td>' . $val['ngaykham'] . '</td>';
                echo '<td>' . $val['ngaynhap'] . '</td>';*/
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
</div>
<!-- /.box -->