<?php
use common\components\StringHelper;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Html;
use backend\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $user common\models\User */
?>
<!--用户(单位：人)-->
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
                    <h5>用户(单位：人,%)</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>日期</th>
                            <th>新注册</th>
                            <th>首次投资</th>
                            <th>首次充值</th>
                            <th>移动端新用户占比</th>
                            <th>签到</th>
                            <th>在投资金0-2W</th>
                            <th>在投资金2-10W</th>
                            <th>在投资金10-20W</th>
                            <th>在投资金20W以上</th>
                            <th>累计投资人</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        echo ListView::widget([
                            'summary'=>false,
                            'dataProvider' => $usersData,
                            'itemView' => '@common/mail/_user',
                        ]);

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--资金（单位：万元，笔）-->
<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-12">
                    <h5>资金（单位：万元，笔）</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>日期</th>
                            <th>充值</th>
                            <th>首次投资(万)</th>
                            <th>首次充值</th>
                            <th>提现</th>
                            <th>还本</th>
                            <th>派息</th>
                            <th>加入计划笔数</th>
                            <th>债权转让笔数</th>
                            <th>债权转让申请金额</th>
                            <th>投资人余额</th>
                            <th>债转成功金额</th>
                            <th>成本</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        echo ListView::widget([
                            'summary'=>false,
                            'dataProvider' => $fundsData,
                            'itemView' => '@common/mail/_funds',
                        ]);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--项目（单位：笔、万元）-->
<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-12">
                    <h5>项目（单位：笔、万元）</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2">日期</th>
                            <th rowspan="2">新债权数量</th>
                            <th rowspan="2">新债权金额(万)</th>
                            <th colspan="4">每分钟募集金额</th>
                            <th colspan="4">每万元募集时长</th>
                            <th rowspan="2">债权慕满数量</th>
                            <th rowspan="2">债权慕满金额</th>

                        </tr>
                        <tr>
                            <th>月利宝</th>
                            <th>季利宝</th>
                            <th>半年宝</th>
                            <th>年利宝</th>
                            <th>月利宝</th>
                            <th>季利宝</th>
                            <th>半年宝</th>
                            <th>年利宝</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        echo ListView::widget([
                            'summary'=>false,
                            'dataProvider' => $projectData,
                            'itemView' => '@common/mail/_project',
                        ]);

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--综合（单位：万元）-->
<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-12">
                    <h5>综合（单位：万元）</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">


                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>日期</th>
                            <th>在投总金额</th>
                            <th>人均投资金额</th>
                            <th>15天平均充值额</th>
                            <th>15天平均提现额</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        echo ListView::widget([
                            'summary'=>false,
                            'dataProvider' => $integratedData,
                            'itemView' => '@common/mail/_integrated',
                        ]);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

