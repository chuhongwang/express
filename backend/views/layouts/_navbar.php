<?php
/**
 * Created by PhpStorm.
 * User: carson
 * Date: 16/2/29
 * Time: 下午5:08
 */
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use \yii\helpers\Url;

?>
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header" > <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>  </div>
            <div class="navbar-header" id="call_nav">   </div>
            <ul class="nav navbar-top-links navbar-right">
<!--                <li class="dropdown">-->
<!--                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">-->
<!--                        <i class="fa fa-question-circle"></i>-->
<!--                        帮助-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu">-->
<!--                        <div class="ibox float-e-margins no-margins">-->
<!--                            <div class="ibox-title">-->
<!--                                <h5>帮助与支持</h5>-->
<!--                            </div>-->
<!--                            <div class="ibox-content" style="white-space:nowrap;">-->
<!--                                <table class="table table-bordered no-margins">-->
<!--                                    <tr>-->
<!--                                        <td class="text-center">-->
<!--                                            <a target="_blank" href="#"-->
<!--                                               class="no-margins no-padding text-muted text-center">-->
<!--                                            <i class="fa fa-phone text-muted" style="font-size:36px"></i>-->
<!--                                            <p class="small">电话: </p>-->
<!--                                            </a>-->
<!--                                        </td>-->
<!--                                        <td class="text-center">-->
<!--                                            <a href="mailto:#"-->
<!--                                               class="no-margins no-padding text-muted text-center">-->
<!--                                                <i class="fa fa-envelope-o text-muted" style="font-size:36px"></i>-->
<!--                                                <p class="text-muted small">Email: </p>-->
<!--                                            </a>-->
<!--                                        </td>-->
<!--                                        <td class="text-center">-->
<!--                                            <a target="_blank"-->
<!--                                               href="#"-->
<!--                                               class="no-margins no-padding text-muted text-center">-->
<!--                                                <i class="fa fa-qq text-muted" style="font-size:36px"></i>-->
<!--                                                <p class="text-muted small">QQ: </p>-->
<!--                                            </a>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </li>-->

                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <?= \Yii::$app->user->identity->username ?><b class="caret"></b>
                    </a>

                    <div class="dropdown-menu text-muted">
                        <ul class="list-group no-margins">
                            <li class="list-group-item fist-item text-muted">
                                <?php echo Html::a('账户管理', '/account/secure', ['class' => 'text-muted']); ?>
                            </li>
                            <?php
                            if (\mdm\admin\components\Helper::checkRoute('svip/ti-net')) {
                                ?>

<!--                                <li class="list-group-item fist-item text-muted">-->
<!--                                    --><?php //echo Html::a('<i class="fa fa-sign-in"></i>天润签入', 'javascript:;', ['class' => 'text-muted tianrun-sign-in']); ?>
<!--                                </li>-->
<!--                                <li class="list-group-item fist-item text-muted">-->
<!--                                    --><?php //echo Html::a('<i class="fa fa-sign-out"></i>天润签出', 'javascript:;', ['class' => 'text-muted tianrun-sign-out']); ?>
<!--                                </li>-->
                                <?php
                            }
                            ?>
                            <li class="list-group-item last-item">
                                <?php echo Html::a('<i class="fa fa-power-off"></i>退出', '/site/logout', ['class' => 'text-muted', 'data' => ['method' => 'post']]); ?>
                            </li>
                        </ul>

                    </div>
                </li>

            </ul>

        </nav>
    </div>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?php echo $this->title ?></h2>
            <ol class="breadcrumb">
                <?= Breadcrumbs::widget([
//            'tag'=>'h2',
                    'homeLink'=>[
                        'label'=>'首页 ', //修改默认的Home
                        'url'=>Url::to(['/']), //修改默认的Home指向的url地址
                    ],
//            'homeLink'=> true, // 若设置false 则 可以隐藏Home按钮
                    'itemTemplate'=>" <li>{link}</li>",
                    'activeItemTemplate'=>'<li class="active"><strong>{link}</strong></li>',
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </ol>
        </div>
    </div>

<?php
$url = Url::to(['/svip/ti-net']);
$js = <<<JS
$(function(){
    function tinet(type) {
           $.ajax({
                url: '{$url}',
                type: "GET",
                dataType: "json",
                success: function(Data) {
                    console.log(Data);
                    alert(Data.msg);
                },
                error: function() {
                    alert('网络错误！');
                }
            }); 
    }
    $(".tianrun-sign-in").click(function() {
           $.ajax({
                url: '/call-api/seat-in',
                type: "GET",
                dataType: "json",
                success: function(Data) {
                    alert('上线成功');
                },
                error: function() {
                    alert('错误操作！');
                }
            });
    });   
    $(".tianrun-sign-out").click(function() {
            $.ajax({
                url: '/call-api/seat-out',
                type: "GET",
                dataType: "json",
                success: function(Data) {
                    alert('下线成功');
                },
                error: function() {
                    alert('错误操作！');
                }
            });
    });   
});
JS;
$this->registerJs($js);
?>