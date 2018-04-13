<?php
/**
 * Created by PhpStorm.
 * User: nicc
 * Date: 2017/7/8
 * Time: 15:40
 */

namespace common\components;

use linslin\yii2\curl\Curl;
use yii\base\Component;
use yii;

/**
 * Class DbHelper
 * @package common\components
 */
class DbHelper extends Component
{
    const YLB_PLATFORM = 1;
    const HLC_PLATFORM = 2;
    /**
     * 获取永利宝新版数据库
     * @return mixed
     */
    public static function ylbDb()
    {
        return self::getDb();
    }

    /**
     * 获取火理财新版数据库
     * @return mixed
     */
    public static function hlcDb()
    {
        return self::getDb('hlc');
    }

    /**
     * @param string $db
     * @return mixed
     */
    private static function getDb($db = 'ylb')
    {
        switch ($db) {
            case 'ylb':
                return yii::$app->ylb_db;
            case 'hlc':
                return yii::$app->hlc_db;
        }

    }

    /**
     * 用于辅助定时任务设定db为hlc
     */
    public static function setDbHlc()
    {
        Yii::$app->request->setQueryParams(yii\helpers\ArrayHelper::merge( Yii::$app->request->queryParams,['db' => 'hlc']));
    }

    /**
     * 用于辅助定时任务设定db为hlc
     */
    public static function setDb()
    {
        Yii::$app->request->setQueryParams(yii\helpers\ArrayHelper::merge( Yii::$app->request->queryParams,['db' => 'ylb_open']));
    }
}