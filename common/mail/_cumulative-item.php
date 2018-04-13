<?php
/**
 * Created by PhpStorm.
 * User: wangchunyang
 * Date: 17-6-16
 * Time: 下午1:33
 */
use yii\helpers\Html;
use common\components\StringHelper;
?>

    <tr>
        <td class="text-right">单日变现金额累计>=5万</td>
        <td class="text-right"><?= $model['ui_id'] ?></td>
        <td class="text-right"><?= $model['tt_created_at']?></td>
        <td class="text-right"><?= Html::encode(StringHelper::formatDecimal($model['tt_amount'])) ?></td>
    </tr>

