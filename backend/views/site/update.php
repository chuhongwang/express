<?php
use yii\helpers\Url;

$this->title = Yii::t('app', '会员编辑');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox-title">
            <?php echo $this->render('_update_search', ['model' => $searchModel]); ?>
        </div>
    </div>
</div>