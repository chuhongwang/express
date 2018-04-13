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
        <td class="text-right">余额>=5万</td>
        <td class="text-right"><?= $model['accountId'] ?></td>
        <td class="text-right"><?= Html::encode(StringHelper::formatDecimal($model['left_money'])) ?></td>
    </tr>

