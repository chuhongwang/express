<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\components\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExpressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '快递信息';
$this->params['breadcrumbs'][] = $this->title;
$column = [
    [
        'attribute' => 'id',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'express_number',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'state',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value'=>function($model){
        return Yii::$app->params['status'][$model['state']];
        }
    ],
    [
        'attribute' => 'post_address',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'receive_address',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'post_name',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'receive_name',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'price',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value'=>function($model){
            return StringHelper::formatDecimal($model['price']);
        }
    ],
    [
        'attribute' => 'post_phone',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'receive_phone',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'point_id',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value'=>function($model){
            return $model['point']['name'];
        }
    ],
    [
        'attribute' => 'next_point_id',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value'=>function($model){
            return $model['nextPoint']['name'];
        }
    ],
    [
            'class'=>yii\grid\ActionColumn::className(),
        'header'=>'操作',
        'headerOptions'=>['style'=>'text-align:center'],
        'contentOptions'=>['style'=>'text-align:center'],
        'template'=>'{update} {delete}',
        'buttons'=>[
          'update'=>function($url,$model,$key){
                $url=Url::to([
                        'express/data',
                    'ExpressSearch[id]'=>$model['id'],
                ]);
                return Html::a('编辑',$url);
          },
            'delete'=>function($url,$model,$key){
                return Html::a('删除','javascript:void(0)',['id'=>$model['id'],'delete_flag'=>2,'title'=>'id','rel'=>'delete']);
            }
        ],
    ]
];
?>
<div class="express-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加快递', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $column,
    ]); ?>
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
          url:'/express/delete-ajax',
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
