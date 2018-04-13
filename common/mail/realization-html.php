<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use backend\assets\AppAsset;
/* @var $this yii\web\View */ /* @var $user common\models\User */
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
                    <h5>今日变现</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>类型</th>
                                <th>用户ID</th>
                                <th>申请变现时间</th>
                                <th>申请变现金额</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($singledata->totalCount<=0):?>
                        <tr>
                            <td colspan="4">暂无数据</td>
                        </tr>
                        <?php endif ?>
                            <?php
                            echo ListView::widget([
                                'dataProvider' => $singledata,
                                'itemView' => '@common/mail/_single-item',
                                'summary' => false,
                                'emptyText'=>' ',
                                'pager' => [
                                    'options' =>
                                        ['class' => 'hidden']//关闭自带分页
                                    ],
                                ]); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>类型</th>
                            <th>用户ID</th>
                            <th>申请变现日</th>
                            <th>单日累计申请变现金额</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($cumulativedata->totalCount<=0):?>
                            <tr>
                                <td colspan="4">暂无数据</td>
                            </tr>
                        <?php endif ?>
                        <?php
                        echo ListView::widget([
                            'dataProvider' => $cumulativedata,
                            'itemView' => '@common/mail/_cumulative-item',
                            'summary' => false,
                            'emptyText'=>' ',
                            'pager' => [
                                'options' =>
                                    ['class' => 'hidden']//关闭自带分页
                            ],
                        ]); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h5><?php echo date('Y年m月d日');?>账户余额大于等于5万的用户</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>类型</th>
                            <th>用户ID</th>
                            <th>当前余额</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($leftmoneydata->totalCount<=0):?>
                            <tr>
                                <td colspan="3">暂无数据</td>
                            </tr>
                        <?php endif ?>
                        <?php
                        echo ListView::widget([
                            'dataProvider' => $leftmoneydata,
                            'itemView' => '@common/mail/_leftmoney-item',
                            'summary' => false,
                            'emptyText'=>' ',
                            'pager' => [
                                'options' =>
                                    ['class' => 'hidden']//关闭自带分页
                            ],
                        ]); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
