<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
您设置的回访还有15分钟就要开始了，提醒您准时回访，

回访的具体信息如下：

回访人：<?= $model->user->username?>

回访时间：<?= date("Y-m-d H:i", $model->flag_at) ?>

客户姓名：<?= $model->customer->ui_realname ?>

回访原因：<?= $model->flag_content ?>


