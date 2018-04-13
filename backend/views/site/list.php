<?php
/**
 * Created by PhpStorm.
 * User: CHW
 * Date: 2018/3/8
 * Time: 14:08
 */

use backend\assets\AppAsset;

$this->title = "会员列表";
$this->params['breadcrumbs'][] = ['label' => $this->title];

$columns = [
    [
        'attribute' => 'ui_id',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'username',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'id_number',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'phone',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
    ],
    [
        'attribute' => 'age',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value' => function ($model) {
            return empty($model['age']) ? "" : $model['age'];
        }
    ],
    [
        'attribute' => 'sex',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value' => function ($model) {
            switch ($model['sex']) {
                case 1:
                    return "男";
                    break;
                case 2:
                    return '女';
                    break;
            }
        }
    ],
    [
        'attribute' => 'height',
        'label'=>'身高(cm)',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value' => function ($model) {
            return empty($model['height']) ? "" : $model['height'];
        }
    ],
    [
        'attribute' => 'weight',
        'label'=>'体重(kg)',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'value' => function ($model) {
            return empty($model['weight']) ? "" : $model['weight'];
        }
    ],
    [
        'class' => \yii\grid\ActionColumn::className(),
        'template' => '{update} {delete}',
        'header' => '操作',
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'text-align:center'],
        'buttons' => [
            'update' => function ($url, $model, $key) {
                $url = \yii\helpers\Url::to([
                    '/site/update',
                    'UserInfoSearch[ui_id]' => $model['ui_id'],
                ]);
                return \yii\helpers\Html::a('编辑', $url);
            },
            'delete' => function ($url, $model, $key) {
                return \yii\helpers\Html::a('删除', 'javascript:void(0):', ['ui_id' => $model['ui_id'], 'delete_flag' => 2, 'title' => 'id', 'rel' => 'delete']);
            },
        ],
    ],

];
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">
            <?php echo $this->render('_list_search', ['model' => $searchModel]); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox-content">
            <?= \common\components\GridViewExtend::widget([
                'dataProvider' => $dataProvider,
                'columns' => $columns
            ]); ?>
        </div>
    </div>
</div>
<?php
AppAsset::addScript($this, '@web/js/plugins/layer/layer.js');
$js=<<<JS

$(function() {
  //删除
  $("a[rel=delete]").click(function() {
    var id=$(this).attr('ui_id');
    var flag=$(this).attr('delete_flag');
    layer.confirm("确认要删除编号为："+id+"的会员吗？",function() {
      if(id){
          $.ajax({
          url:'/site/delete-ajax',
          type:"post",
          dataType:"json",
          data:{
              'ui_id':id,
              'delete_flag':flag
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
          error:function(){
              layer.msg('网络错误');
          }
          });
      }else{
          layer.msg('程序错误');
      }
    })
    
  });
});

JS;
$this->registerJs($js);

?>
