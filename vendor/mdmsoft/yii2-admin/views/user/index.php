<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use common\models\ultron\UmpDict;
use mdm\admin\models\UmpDepartment as UmpDepartmentModel;

/* @var $this yii\web\View */
/* @var $searchModel mdm\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">

    <p>
        <?= Html::a('<i class="fa fa-plus-square-o"></i> 添加用户', ['signup'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=> Yii::$app->params['grid.layout'],
        'summary' =>  Yii::$app->params['grid.summary'],
        'tableOptions' => Yii::$app->params['grid.tableOptions'],
        'pager'=> Yii::$app->params['grid.pager'],
        'columns' => [
            'id',
            'username',
            'email:email',
//            [
//                'attribute' => 'platform',
//                'value'=>function($model){
//                    $arr=UmpDict::find()->getPlatformSel();
//                    return empty($arr[$model['platform']])?'---':$arr[$model['platform']];
//                },
//                'filter' => UmpDict::find()->getPlatformSel(),
//            ],
            'created_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['view', 'activate','update', 'delete','reset']),
                'buttons' => [
                    'activate' => function($url, $model) {
                        if ($model->status == 10) {
                            return '';
                        }
                        $options = [
                            'title' => Yii::t('rbac-admin', 'Activate'),
                            'aria-label' => Yii::t('rbac-admin', 'Activate'),
                            'data-confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                    },
                    'reset' =>function($url, $model){
                        $options = [
                            'title' => Yii::t('rbac-admin', '重置'),
                            'aria-label' => Yii::t('rbac-admin', '重置'),
                            'data-confirm' => Yii::t('rbac-admin','您确定重置'.$model['username'].'密码为123456吗?'),
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,$options);
                    }
                    ]
                ],
            ],
        ]);
        ?>
            </div>
        </div>
    </div>
</div>
<?php
$message = \Yii::$app->session['message'];
if(!empty($message)){
    $js = <<<JS
alert("$message");
JS;
    $this->registerJs($js);
}
unset(Yii::$app->session['message']);
?>
