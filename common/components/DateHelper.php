<?php
/**
 * Created by PhpStorm.
 * User: guoshuai
 * Date: 06/07/17
 * Time: 下午 07:16
 */

namespace common\components;

use yii\base\Component;

class DateHelper extends Component
{
    /**
     * 获取当前日期，没有横杠
     * @return false|string
     */
    public static function getDateNoLine()
    {
        return date('Ymd');
    }

    /**
     * 获取当前日期
     * @return false|string
     */
    public static function getDate()
    {
        return date('Y-m-d');
    }

    /**
     * 获取当前时间
     * @return false|string
     */
    public static function getDateTime()
    {
        return date('Y-m-d H:i:s');
    }

    /**
     * 返回第一天
     * @return false|string
     */
    public static function getDateFirst($date)
    {
        return date('Y-m-01 00:00:00', strtotime($date));
    }

    /**
     * 返回第一天（没有时分秒）
     * @return false|string
     */
    public static function getBeginDate($date)
    {
        return date('Y-m-01', strtotime($date));
    }

    /**
     * 返回最后一天
     * @return false|string
     */
    public static function getDateLast($date)
    {
        return date('Y-m-t 23:59:59', strtotime($date));
    }

    /**
     * 返回最后一天（没有时分秒）
     * @return false|string
     */
    public static function getEndDate($date)
    {
        return date('Y-m-t', strtotime($date));
    }

    /**
     * 获取形如 2017-01-01 00:00:00的数据
     * @param $date 传入的日期 2017-01-01
     * @return string 返回的对应日期 2017-01-01 00:00:00
     */
    public static function getDateWithStartTime($date)
    {
        return date('Y-m-d', strtotime($date)) . ' 00:00:00';
    }

    /**
     * 获取形如 2017-01-01 23:59:59的数据
     * @param $date
     * 传入的日期 如：2017-01-01
     * @return string
     * 返回的对应日期 如2017-01-01 23:59:59
     */
    public static function getDateWithEndTime($date)
    {
        return date('Y-m-d', strtotime($date)) . ' 23:59:59';
    }

    /**
     * 获取形如 2017-01-01 00:00:00的时间戳
     * @param $date 传入的日期 2017-01-01
     * @return string 返回的对应日期 2017-01-01 00:00:00的时间戳
     */
    public static function getTimeWithStartTime($date)
    {
        return strtotime($date . ' 00:00:00');
    }

    /**
     * 获取形如 2017-01-01 23:59:59的时间戳
     * @param $date 传入的日期 如：2017-01-01
     * @return string 返回的对应日期 如2017-01-01 23:59:59的时间戳
     */
    public static function getTimeWithEndTime($date)
    {
        return strtotime($date . ' 23:59:59');
    }

    /**
     * 获取形如 2017-01-01 23:59:59的时间戳
     * @param $date 传入的日期 如：2017-01-01
     * @return string 返回的对应日期 如2017-01-01 23:59:59
     */
    public static function getTimeWithEndTimes($date)
    {
        return $date . ' 23:59:59';
    }

    /**
     * 获取传入月份的最后一天
     * @param $date 传入的值 如：2017-05
     * @return string 返回的对应日期 如：2017-05-31
     */
    public static function getDateWithLastDay($date)
    {
        return date('Y-m-t', strtotime($date));
    }

    /**
     * 计算天数 返回相加以后的天数
     * @param $date
     * @param $days
     * @return false|string
     */
    public static function getDateStartTime($date, $days)
    {
        $datas = date('Ymd', strtotime($date));
        return date("Y-m-d", strtotime("+$days days", strtotime($datas)));
    }

    /**
     * 计算过期时间精确到秒
     * @param $time
     * @param $days
     */
    public static function getValidTime($time, $days)
    {
        $day = (int)$days * 86400;
        return date("Y-m-d H:i:s", $time + $day);
    }

    /**
     * 计算天数 返回相减以后的天数
     * @param $date
     * @param $days
     * @return false|string
     */
    public static function getDateStartTimes($date, $days)
    {
        $datas = date('Ymd', strtotime($date));
        return date("Y-m-d", strtotime("-$days days", strtotime($datas)));
    }

    /**
     * 计算天数 返回相减以后的天数 加时分秒'23:59:59'
     * @param $date
     * @param $days
     * @return false|string
     */
    public static function getDateStartTimeSecond($date, $days)
    {
        $datas = date('Ymd', strtotime($date));
        return date("Y-m-d H:i:s", strtotime("-$days days", strtotime($datas . ' 23:59:59')));
    }

    /**
     * 获取传入日期N月后的日期
     * 尹红涛
     * @param $date
     * @param $month_ago
     * @return false|string
     */
    public static function getMonthAgoDate($date = null, $month_ago)
    {
        if (empty($date)) {
            $datas = date('Ymd');
        } else {
            $datas = date('Ymd', strtotime($date));
        }
        return date("Y/m/d", strtotime("+$month_ago months", strtotime($datas)));
    }


    /**
     * 获取传入日期N月前的日期
     * 尹红涛
     * @param $date
     * @param $month_ago
     * @return false|string
     */
    public static function getMonthBeforeDate($date = null, $month_before)
    {
        if (empty($date)) {
            $datas = date('Ymd');
        } else {
            $datas = date('Ymd', strtotime($date));
        }
        return date("Y-m-d", strtotime("-$month_before months", strtotime($datas)));
    }

    /**
     * 获取传入日期N月前的日期
     * 尹红涛
     * @param $date
     * @param $month_ago
     * @return false|string
     */
    public static function getMonthAfterDate($date = null, $month_before)
    {
        if (empty($date)) {
            $datas = date('Ymd');
        } else {
            $datas = date('Ymd', strtotime($date));
        }
        return date("Y-m-d", strtotime("+$month_before months", strtotime($datas)));
    }

    /**
     * 秒数转时间
     * 高帅
     * @param $sec
     * @return $result string|'---'
     */
    public static function getSecToHours($sec)
    {

        if (empty($sec)) {
            return '0:0:0';
        }
        $sec = round($sec);
        $result = '0:0:0';
        if ($sec > 0) {
            $hour = floor($sec / 3600);
            $minute = floor(($sec - 3600 * $hour) / 60);
            $second = floor((($sec - 3600 * $hour) - 60 * $minute) % 60);
            $result = $hour . ':' . $minute . ':' . $second;
        }
        return $result;
    }

    /**
     * 尹红涛
     * @param $start
     * @param $end
     * @return array
     */
    public static function getMonthFirstDay($start, $end)
    {
        $i = 0;
        while ($start <= $end) {
            $result[] = [
                'start' => date('Y-m-01', strtotime($start)),

                'end' => date('Y-m-t 23:59:59', strtotime($start))

            ];
            $i++;
            $start = date("Y-m-01", strtotime(" +" . $i . " month"));

        }

        return $result;
    }

    /**
     * 尹红涛
     * @param $start
     * @param $end
     * @return string 返回相差小时：分钟 字符传
     */
    public static function dateDiff($start, $end)
    {

        $minute = floor((strtotime($end) - strtotime($start)) / 60);
        $hour = floor($minute / 60);
        if ($hour < 10) {
            $hour = '0' . $hour;
        }
        $minute = $minute % 60;
        if ($minute < 10)
            $minute = '0' . $minute;
        return $hour . ':' . $minute;
    }

    /**
     * 返回给定日期与今天相差天数
     * @param $give_date
     * @return string
     */
    public static function getTwoDateDays($give_date)
    {
        $Date_1 = self::getDateTime();
        $Date_2 = $give_date;
        $d1 = strtotime($Date_1);
        $d2 = strtotime($Date_2);
        $Days = round(($d1 - $d2) / 3600 / 24);
        return $Days;
    }

    /**
     * 返回给定日期与今天相差天数
     * @param $give_date
     * @return string
     */
    public static function getTwoDays($give_date, $two_date)
    {
        $Date_1 = $two_date;
        $Date_2 = $give_date;
        $d1 = strtotime($Date_1);
        $d2 = strtotime($Date_2);
        $Days = round(($d1 - $d2) / 3600 / 24);
        return $Days;
    }

    public static function getPaiList($date)
    {
        $list = [];
        $day = date('d', strtotime($date));
        $last_date = date("Y-m-" . $day, strtotime('-1months', strtotime($date)));
        $day_time = ceil((strtotime($date) - strtotime($last_date)) / (3600 * 24));
        if (date('Y-m-d', strtotime($date)) == date('Y-m-t')) {//如果是最后一天
            switch ($day) {
                case 31:
                    $list = ['31' => '31'];

                    break;
                case 30:
                    $list = ['31' => $day_time - 1,
                        '30' => $day_time];
                    break;
                case 29:
                    $list = [
                        '31' => $day_time - 2,
                        '30' => $day_time - 1,
                        '29' => $day_time
                    ];
                    break;
                case 28:
                    $list = [
                        '31' => $day_time - 3,
                        '30' => $day_time - 2,
                        '29' => $day_time - 1,
                        '28' => $day_time
                    ];
                    break;
                default:
                    break;

            }
        } else {
            $list = [$day => $day_time];
        }
        return $list;
    }


    /**
     * 尹红涛
     * @param $Date_1当前时间
     * @param $month n个月
     */
    public static function count_days($Date_1, $month)
    {
        $arr_date = getdate(strtotime($Date_1));
        $new_month = $arr_date['mon'] + $month;
        $num = $new_month / 12;
        if ($num > 1) {//如果大于1
            $new_month = $new_month - 12;//月份减去12
            $new_year = $arr_date['year'] + round($num);//月份减去12
        } else {
            $new_year = $arr_date['year'];
        }
        $firstday = date('Y-m-01', strtotime($Date_1));
        $lastday = date('d', strtotime("$firstday +1 month -1 day"));

        if ($arr_date['mday'] == $lastday || $arr_date['mday'] > $lastday) {
            $firstday = date('Y-m-01', strtotime($new_year . '-' . $new_month));
            $Date_2 = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
        } else {
            $Date_2 = $new_year . '-' . $new_month . '-' . $arr_date['mday'];
        }


        $d1 = strtotime($Date_1);
        $d2 = strtotime($Date_2);
        $Days = round(($d2 - $d1) / 3600 / 24);
        return $Days;
    }





}
