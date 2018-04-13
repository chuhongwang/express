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
        <td><?= Html::encode(StringHelper::formatDecimal($model['recharge_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['first_recharge_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['withdraw_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['invest_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['payout_principal_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['interest_amount']/10000)) ?></td>
        <td><?= Html::encode($model['online_debt_amount']) ?></td>
        <td><?= Html::encode($model['transfers_count']) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['transfers_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['balance_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['transferred_amount']/10000)) ?></td>
        <td><?= Html::encode(StringHelper::formatDecimal($model['actual_cost']/10000)) ?></td>
       </tr>

</div>
