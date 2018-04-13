<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="row">
    <div class="col-lg-12 bodys" style="min-height:900px; position: relative;">

        <?php $this->beginBody() ?>
        <?php $this->beginContent('@app/views/layouts/_nav.php'); ?>
        <?php $this->endContent(); ?>
        <div class="container">
            <div class="wrap">
                <ol class="breadcrumb" sup="anno">
                    <li>您的位置：<a href="<?= Yii::$app->getHomeUrl() ?>">首页</a></li>
                    <li class="active"><a href="<?= Yii::$app->getHomeUrl() ?>">个人中心</a></li>
                </ol>
            </div>
            <?php
            if (Yii::$app->session->get('_id')) {
                ?>
                <div class="row">
                    <div class="col-md-2">
                        <?php $this->beginContent('@app/views/layouts/_navbar.php'); ?>
                        <?php $this->endContent(); ?>
                    </div>
                    <div class="col-md-9" style="background-color: white;margin-left: 50px;min-height: 500px">
                        <?php
                        echo $content;
                        ?>
                    </div>

                </div>
                <?php
            } else {
                echo $content;
            }
            ?>

        </div>
        <?php $this->beginContent('@app/views/layouts/_footer.php'); ?>
        <?php $this->endContent(); ?>
    </div>
</div>
<?php
$js = <<<JS
$(window).ready(function() {
   $('.bodys').css('min-height',$(window).height()+'px');
})
$(window).resize(function(){
   $('.bodys').css('min-height',$(window).height()+'px');
});
    
JS;
$this->registerJs($js);
?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
