<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title" style="border-width:0">
                <h5><?= "<?= " ?>Html::encode($this->title) ?></h5>
            </div>
            <div class="ibox-content">
                <div id="editable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if(!empty($generator->searchModelClass)): ?>
                                <?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
                            <?php endif; ?>

                            <p>
                                <?= "<?= " ?>Html::a(<?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['create'], ['class' => 'btn btn-success']) ?>
                            </p>

                            <?php if ($generator->indexWidgetType === 'grid'): ?>
                                <?= "<?= " ?>GridView::widget([
                                'dataProvider' => $dataProvider,
                                'layout'=> Yii::$app->params['grid.layout'],
                                'summary' =>  Yii::$app->params['grid.summary'],
                                'tableOptions' => Yii::$app->params['grid.tableOptions'],
                                'pager'=> Yii::$app->params['grid.pager'],

                                <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "                       'columns' => [\n"; ?>
                                //['class' => 'yii\grid\SerialColumn'],
                                <?php
                                $count = 0;
                                if (($tableSchema = $generator->getTableSchema()) === false) {
                                    foreach ($generator->getColumnNames() as $name) {
                                        if (++$count < 6) {
                                            echo "                                        '" . $name . "',\n";
                                        } else {
                                            echo "                                        // '" . $name . "',\n";
                                        }
                                    }
                                } else {
                                    foreach ($tableSchema->columns as $column) {
                                        $format = $generator->generateColumnFormat($column);
                                        if (++$count < 6) {
                                            echo "                                        '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                        } else {
                                            echo "                                        // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                        }
                                    }
                                }
                                ?>
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => '操作',
                                    'template' => ' {update} {delete}',//只需要展示删除和更新
                                    'headerOptions' => ['width' => '125', 'align' => 'center'],
                                    'buttons' => [
                                        'update' => function($url, $model, $key){
                                            return Html::a('<i class="fa fa-pencil-square-o"></i> 修改',
                                                ['update', 'id' => $key],
                                                [
                                                    'class' => 'btn btn-default btn-xs',
                                                ]);
                                            },
                                        'delete' => function($url, $model, $key){
                                            return Html::a('<i class="fa fa-ban"></i> 删除',
                                                ['delete', 'id' => $key],
                                                [
                                                    'class' => 'btn btn-default btn-xs',
                                                    'data' => [
                                                        'confirm' => '你确定要删除该节点吗？',
                                                        'method' => 'post',
                                                    ]
                                                ]);
                                            },
                                    ],
                                ],
                                ],
                                ]); ?>
                            <?php else: ?>
                                <?= "<?= " ?>ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemOptions' => ['class' => 'item'],
                                'itemView' => function ($model, $key, $index, $widget) {
                                return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
                                },
                                ]) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

