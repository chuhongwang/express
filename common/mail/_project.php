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
        <td><?= Html::encode($model['debt_count']) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['debt_amount']/10000)) ?></td>

        <td><?= Html::encode($model['raise_1_time']==0?0:StringHelper::formatDecimal($model['raise_1_amount']/$model['raise_1_time']/10000)) ?></td>
        <td><?= Html::encode($model['raise_2_time']==0?0:StringHelper::formatDecimal($model['raise_2_amount']/$model['raise_2_time']/10000)) ?></td>
        <td><?= Html::encode($model['raise_3_time']==0?0:StringHelper::formatDecimal($model['raise_3_amount']/$model['raise_3_time']/10000)) ?></td>
        <td><?= Html::encode($model['raise_4_time']==0?0:StringHelper::formatDecimal($model['raise_4_amount']/$model['raise_4_time']/10000)) ?></td>
        <td><?= Html::encode($model['raise_1_amount']==0?0:StringHelper::formatDecimal($model['raise_1_time']/($model['raise_1_amount']/10000))) ?></td>
        <td><?= Html::encode($model['raise_2_amount']==0?0:StringHelper::formatDecimal($model['raise_2_time']/($model['raise_2_amount']/10000))) ?></td>
        <td><?= Html::encode($model['raise_3_amount']==0?0:StringHelper::formatDecimal($model['raise_3_time']/($model['raise_3_amount']/10000))) ?></td>
        <td><?= Html::encode($model['raise_4_amount']==0?0:StringHelper::formatDecimal($model['raise_4_time']/($model['raise_4_amount']/10000))) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['raise_count'])) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['raise_amount']/10000)) ?></td>
       </tr>

</div>
