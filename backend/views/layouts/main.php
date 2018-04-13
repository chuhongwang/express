<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
$session = \Yii::$app->session;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" href="<?= Yii::$app->request->hostInfo?>/logo.ico" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
$singleActions = ['login'];
if (in_array(Yii::$app->controller->action->id, $singleActions)) {
    $this->beginContent('@app/views/layouts/single.php');
    echo $content;
    $this->endContent();
}else{
    ?>
    <div id="wrapper">
<!--        <span style="float: left;margin-left: 50px;margin-top: 20px;"> <img alt="image" width="100px" src="/img/logo.png" /></span>-->
<!--        <div style="text-align: left;height: 100px;"><h1 style="font-size: 400%;margin-left: 300px;">印千山会员健康档案管理系统</h1></div>-->
        <?php $this->beginContent('@app/views/layouts/_nav.php'); ?>
        <?php $this->endContent(); ?>

        <div id="page-wrapper" class="gray-bg">

            <?php $this->beginContent('@app/views/layouts/_navbar.php'); ?>
            <?php $this->endContent(); ?>

            <div class="wrapper wrapper-content animated fadeInRight gray-bg">

                <?php $this->beginContent('@app/views/layouts/_alert.php'); ?>
                <?php $this->endContent(); ?>

                <?=$content?>
            </div>


            <?php $this->beginContent('@app/views/layouts/_footer.php'); ?>
            <?php $this->endContent(); ?>

        </div>
    </div>
    <?php
}
?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
    $("#call_nav").empty().append('<?php echo $session->get('alertText'); ?>');
</script>

