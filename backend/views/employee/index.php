<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '员工信息';
$this->params['breadcrumbs'][] = $this->title;
$column = [
    [
        'attribute' => 'id',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center']
    ],
    [
        'attribute' => 'name',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center']
    ],
    [
        'attribute' => 'gender',
        'label' => '性别',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value' => function ($model) {
            return $model['gender'] == 1 ? '男' : '女';
        }
    ],
    [
        'attribute' => 'phone',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center']
    ],
    [
        'attribute' => 'email',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center']
    ],
    [
        'attribute' => 'birthday',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center']
    ],
    [
        'attribute' => 'address',
        'label' => '居住地址',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center']
    ],
    [
        'attribute' => 'pointId',
        'label' => '所在网点',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value' => function ($model) {
            return $model['point']['name'];
        }
    ],
    [
        'class' => yii\grid\ActionColumn::className(),
        'header' => '操作',
        'template' => '{update} {delete}',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'buttons' => [
            'update' => function ($url, $model, $key) {
                $url = Url::to([
                    '/employee/data',
                    'EmployeeSearch[id]' => $model['id']
                ]);
                return Html::a('编辑', $url);
            },
            'delete' => function ($url, $model, $key) {
                return Html::a('删除', 'javascript:void(0)', ['id' => $model['id'], 'delete_flag' => 2, 'title' => 'id', 'rel' => 'delete']);
            }
        ]
    ]
];
?>
<div class="employee-index">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-content">
                <?= Html::a('添加员工', ['/employee/create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-content">
                <?= \common\components\GridViewExtend::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => $column
                ]); ?>
            </div>
        </div>
    </div>
    <?php
    AppAsset::addScript($this, '@web/js/jquery-ui.min.js');
    AppAsset::addScript($this, '@web/js/plugins/layer/layer.js');
    $js = <<<JS
 //删除邮箱地址
$(function() {
  $('a[rel="delete"]').click(function(){
     Delete($(this).attr('id'),$(this).attr('delete_flag'));
  });
  function Delete(id,delete_flag){
      if(id){
          $.ajax({
          url:'/employee/delete-ajax',
          type:"POST",
          dataType:"json",
          data:{
              'id':id,
              'delete_flag':delete_flag
          },
          success:function(data) {
            console.log(data.code);
            if(data.code==0){
                layer.msg('删除成功');
                location.replace(location.href);
            }else{
                layer.alert(data.message);
            }
          },
          error:function() {
            layer.msg('网络错误');
          }
        });
      }else{
          console.log('程序错误');
      }
  }
});
JS;
    $this->registerJs($js);
    ?>
