<?php
/**
 * Created by PhpStorm.
 * User: nicc
 * Date: 2017/6/27
 * Time: 16:26
 */

namespace common\components;

use yii\base\Component;
use common\components\StringHelper;

class ValidateData extends Component
{
    /**
     * @param $data
     * @param $str
     * @param int $len
     * @return string
     * 要检测的字段和  为空输出内容
     */
    public static function formatDecimal($data, $str = '0.00', $len = 2)
    {
        return !empty($data) ? StringHelper::formatDecimal($data, $len) : $str;
    }


    /**
     * @param $data
     * @param $str
     * @param int $len
     * @return string
     * 要检测的字段和  为空输出内容
     */
    public static function asDecimal($data, $str = '0.00', $len = 2)
    {
        return !empty($data) ? StringHelper::asDecimal($data, $len) : $str;

    }

    /**
     * @param $data
     * @param $str
     * @param int $len
     * @return string
     * 要检测的字段和  为空输出内容
     */

    public static function formatString($data, $str = '----')
    {
        return empty($data) ? $str : $data;
    }

    public static function formatdate($data, $str = '----')
    {
        return empty($data) ? $str : substr($data, 0, 10);
    }

    /**
     * @param $data
     * @param string $str
     * @param int $len
     * @return string
     */
    public static function asDecimals($data, $str = '0', $len = 2)
    {
        return !empty($data) ? $data : $str;

    }

    /**
     * @param $data
     * @param string $str
     * @return float|string
     */
    public static function asFloor($data, $str = '0')
    {
        return !empty($data) ? floor($data * 100) / 100 : $str;
    }

    /**
     * @param $data
     * @param $str
     * @return mixed
     * User: 任亚飞
     */
    public static function asAuth($data, $str = '---')
    {
        $AuthAssignment = \common\models\ultron\AuthAssignment::find()->where(['user_id' => \Yii::$app->user->id, 'item_name' => '管理员'])->one();
        if (empty($data)) {
            return $str;
        }
        if (!$AuthAssignment) {
            return substr_replace($data, '****', 0, strlen($data));
        } else {
            return $data;
        }
    }

    /**
     * @param $data
     * @param $sex
     * @return string
     * User: 任亚飞
     */
    public static function asPic($data, $sex)
    {
        $AuthAssignment = \common\models\ultron\AuthAssignment::find()->where(['user_id' => \Yii::$app->user->id, 'item_name' => '管理员'])->one();
        if (empty($data) || !$AuthAssignment) {
            return $sex == 1 ? '/img/reset_man.png' : '/img/reset_women.png';
        } else {
            return $data;
        }
    }
}