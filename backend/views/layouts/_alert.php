<?php
/**
 * Created by PhpStorm.
 * User: carson
 * Date: 16/2/29
 * Time: 下午5:11
 */
use backend\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;
?>
<div class="row">
    <div class="col-lg-12">
        <?php

        if( Yii::$app->getSession()->hasFlash('success') ) {

            echo Alert::widget([
                'options' => [
                    'class' => 'alert-success', //这里是提示框的class
                ],
            ]);
        }
        if( Yii::$app->getSession()->hasFlash('error') ) {
            echo  Alert::widget([
                'options' => [
                    'class' => 'alert-error',
                ],
            ]);
        }
        ?>
    </div>
</div>
