<?php
/**
 * Created by PhpStorm.
 * User: carson
 * Date: 16/3/7
 * Time: 上午11:04
 */

namespace common\components;

use yii\base\Component;
use Yii;

/**
 * @package common\components
 * @version 1.0
 */
class StringHelper extends Component
{

    /**
     * 手机号脱敏
     * @version 1.0
     * @param $phone
     * @return mixed
     */
    public static function maskingPhone($phone)
    {
        return substr_replace($phone, '****', 3, strlen($phone) - 7);
    }

    /**
     * 手机号脱敏显示前三后三
     * @version 1.0
     * @param $phone
     * @return mixed
     */
    public static function maskingPhoneT($phone)
    {
        return substr_replace($phone, '****', 3, strlen($phone) - 6);
    }

    /**
     * 身份证脱敏
     * @version 1.0
     * @param $cardno
     * @return mixed
     */
    public static function maskingCardno($cardno)
    {
        return substr_replace($cardno, '****', 4, strlen($cardno) - 8);
    }

    /**
     * 格式化数字
     * @version 1.0
     * @param $num
     */
    public static function formatDecimal($num, $decimals = 2)
    {
        if (is_float($num)) {
            $num = sprintf("%." . ($decimals + 1) . "f", $num);
        }
        return Yii::$app->formatter->asDecimal(floor($num * pow(10, $decimals)) / pow(10, $decimals), $decimals);
    }


    /**
     * 格式化数据数字
     * 四舍五入
     * @version 1.0
     * @param $num
     * @param int $decimals
     * @return string
     */
    public static function asDecimal($num, $decimals = 2)
    {
        return Yii::$app->formatter->asDecimal($num, $decimals);
    }

    /**
     * 获取资金记录日志note
     * @version 1.0
     * @param $note
     * @return string
     */
    public static function formatLogNote($note)
    {
        $pos = strpos($note, "#");
        return substr($note, 0, $pos);
    }

    /**
     * 格式化日期
     * @version 1.0
     * @param $time
     * @return string
     */
    public static function formatDatetime($time)
    {
        return Yii::$app->formatter->asDatetime($time, 'php:Y-m-d H:i:s');
    }

    public static function formatDate($time)
    {
        return Yii::$app->formatter->asDate($time, 'php:Y-m-d');
    }

    /**
     * 将形如20170912113958转化为 时间格式
     * 尹红涛
     * @param $time
     * @return string
     */
    public static function toDate($str)
    {
        return substr($str, 0, 4) . '-' . substr($str, 4, 2) . '-' . substr($str, 6, 2);

    }

    /**
     * 将形如20170912113958转化为 时间格式
     * 尹红涛
     * @param $time
     * @return string
     */
    public static function toDateTime($str)
    {
        $date = substr($str, 0, 4) . '-' . substr($str, 4, 2) . '-' . substr($str, 6, 2);
        return $date .= ' ' . substr($str, 8, 2) . ':' . substr($str, 10, 2) . ':' . substr($str, 12, 2);
    }

    /**
     *数字金额转换成中文大写金额的函数
     *String Int $num 要转换的小写数字或小写字符串
     *return 大写字母
     *小数位为两位
     **/
    public static function numToRmb($num)
    {
        $c1 = "零壹贰叁肆伍陆柒捌玖";
        $c2 = "分角元拾佰仟万拾佰仟亿";
        //精确到分后面就不要了，所以只留两个小数位
        $num = round($num, 2);
        //将数字转化为整数
        $num = $num * 100;
        if (strlen($num) > 10) {
            return "金额太大，请检查";
        }
        $i = 0;
        $c = "";
        while (1) {
            if ($i == 0) {
                //获取最后一位数字
                $n = substr($num, strlen($num) - 1, 1);
            } else {
                $n = $num % 10;
            }
            //每次将最后一位数字转化为中文
            $p1 = substr($c1, 3 * $n, 3);
            $p2 = substr($c2, 3 * $i, 3);
            if ($n != '0' || ($n == '0' && ($p2 == '亿' || $p2 == '万' || $p2 == '元'))) {
                $c = $p1 . $p2 . $c;
            } else {
                $c = $p1 . $c;
            }
            $i = $i + 1;
            //去掉数字最后一位了
            $num = $num / 10;
            $num = (int)$num;
            //结束循环
            if ($num == 0) {
                break;
            }
        }
        $j = 0;
        $slen = strlen($c);
        while ($j < $slen) {
            //utf8一个汉字相当3个字符
            $m = substr($c, $j, 6);
            //处理数字中很多0的情况,每次循环去掉一个汉字“零”
            if ($m == '零元' || $m == '零万' || $m == '零亿' || $m == '零零') {
                $left = substr($c, 0, $j);
                $right = substr($c, $j + 3);
                $c = $left . $right;
                $j = $j - 3;
                $slen = $slen - 3;
            }
            $j = $j + 3;
        }
        //这个是为了去掉类似23.0中最后一个“零”字
        if (substr($c, strlen($c) - 3, 3) == '零') {
            $c = substr($c, 0, strlen($c) - 3);
        }
        //将处理的汉字加上“整”
        if (empty($c)) {
            return "零元整";
        } else {
            return $c . "整";
        }
    }

    /*
     * 计算两个时间戳的月数差额
     * */
    public static function monthDiff($begin_time, $end_time)
    {
        $b_year = date('Y', $begin_time);
        $b_month = date('m', $begin_time);

        $e_year = date('Y', $end_time);
        $e_month = date('m', $end_time);

        return $e_year * 12 + $e_month - $b_year * 12 - $b_month;
    }

    /**
     * 获取N位随机数
     * @param int $count
     * @return string
     */
    public static function getRandomNumString($count)
    {
        $a = range(0, 9);

        for ($i = 0; $i < $count; $i++) {
            $b[] = array_rand($a);
        } // www.yuju100.com
        return join("", $b);
    }

    public static function getShortName($name, $len = 10)
    {
        $len *= 3;
        if (!isset($name{$len})) {
            return $name;
        }
        $frontCast = ['中国','青海','河北','秦皇岛','上海','山东','宁乡','湖南','怀化','省', '市', '县', '区'];
        $endCast = ['有限', '有机'];
        foreach ($frontCast as $cast) {
            $keyArr = explode($cast, $name);
            $name = $keyArr[count($keyArr) - 1];
        }
        foreach ($endCast as $cast) {
            $keyArr = explode($cast, $name);
            $name = $keyArr[0];
        }
        return $name;


    }
}
