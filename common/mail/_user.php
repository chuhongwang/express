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
        <td><?= Html::encode($model['new_register_user_count']) ?></td>
        <td><?= Html::encode($model['new_first_invest_count']) ?></td>
        <td><?= Html::encode($model['new_first_recharge_count']) ?></td>
        <td><?= Html::encode($model['new_register_user_count']==0?'0%':\common\components\ValidateData::formatDecimal($model['new_mobile_user_count'] * 100 / $model['new_register_user_count'], '0', 0) . '%') ?></td>
        <td><?= Html::encode(\common\components\ValidateData::formatDecimal($model['sign_in_count'],'0',0)) ?></td>
        <td><?= Html::encode(\common\components\ValidateData::formatDecimal($model['invest_0_2'],'0',0)) ?></td>
        <td><?= Html::encode(\common\components\ValidateData::formatDecimal($model['invest_2_10'],'0',0)) ?></td>
        <td><?= Html::encode(\common\components\ValidateData::formatDecimal($model['invest_10_20'],'0',0)) ?></td>
        <td><?= Html::encode(\common\components\ValidateData::formatDecimal($model['invest_20_'],'0',0)) ?></td>
        <td><?= Html::encode(\common\components\ValidateData::formatDecimal($model['total_invest_count'],'0',0)) ?></td>
    </tr>

</div>
