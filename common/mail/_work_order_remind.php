<?php
/**
 * Created by PhpStorm.
 * User: wangchunyang
 * Date: 17-6-16
 * Time: 下午1:33
 */
use yii\helpers\Html;
use common\components\StringHelper;
?>
<style>
    .table {
        border-collapse: collapse;
    }
    .table td, .table th {
        background-color: #fff;
        width:200px;
    }
    .table-bordered td, .table-bordered th {
        border: 1px solid #ddd;
    }
    .text-right{
        text-align: right;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-12">
                    <h3><?=$title ?><a href="http://<?= $_SERVER['SERVER_NAME'].$url ?>" style="color: #00a0e9">查看详情</a></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                <tr><?=$problem_description ?></tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>



