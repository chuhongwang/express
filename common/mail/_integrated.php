<?php

use common\components\StringHelper;
use yii\helpers\Html;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <tr>
        <td><?= Html::encode($model['statistics_at']) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['total_investing_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['total_avg_invest_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['avg_15_recharge_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['avg_15_withdraw_amount']/10000)) ?></td>


       </tr>

</div>
