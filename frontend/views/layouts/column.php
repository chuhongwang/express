<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

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
<body class="fixed-sidebar no-skin-config full-height-layout">
<?php $this->beginBody() ?>

<div id="wrapper">

    <?php $this->beginContent('@app/views/layouts/_nav.php'); ?>
    <?php $this->endContent(); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php $this->beginContent('@app/views/layouts/_navbar.php'); ?>
        <?php $this->endContent(); ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="fh-breadcrumb">

            <?= $content ?>

        </div>

        <?php $this->beginContent('@app/views/layouts/_footer.php'); ?>
        <?php $this->endContent(); ?>
    </div>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
