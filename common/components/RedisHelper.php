<?php
/**
 * Created by PhpStorm.
 * User: hongtao
 * Date: 2017/8/12
 * Time: 上午9:47
 */

namespace common\components;

use Yii;
use yii\base\Component;

class RedisHelper extends Component
{

    public static function getrRedis($name='redis')
    {
        switch ($name) {
            case 'redis':
                $redis = Yii::$app->redis;
                break;
            default:
                $redis = Yii::$app->redis;
                break;
        }
        return $redis;
    }

    /**
     * 存入redis
     * @param $key 会自动+UMP.
     * @param $value 要存储的值
     * @param $expiration 过期时间
     */
    public static function setAndEncodeJsonWithPre($key, $value, $expiration,$redisName='redis')
    {
        $redis = self::getrRedis($redisName);
        $ump = Yii::$app->params['redis-pre-key'];
        $key = $ump . $key;
        $redis->set($key, json_encode($value));
        $redis->expire($key, $expiration);
    }

    /**
     * @param $key 会自动+UMP.
     * @return mixed 存储的值
     */
    public static function getAndDecodeJsonWithPre($key,$redisName='redis')
    {
        $redis = self::getrRedis($redisName);
        $ump = Yii::$app->params['redis-pre-key'];
        $key = $ump . $key;
        return json_decode($redis->get($key), true);
    }
    /**
     * 存入redis
     * @param $key 不会自动+UMP.
     * @param $value 要存储的值
     * @param $expiration 过期时间
     */
    public static function setAndEncodeJson($key, $value, $expiration,$redisName='redis')
    {
        $redis = self::getrRedis($redisName);
        $redis->set($key, json_encode($value));
        $redis->expire($key, $expiration);
    }

    /**
     * @param $key 不会自动+UMP.
     * @return mixed 存储的值
     */
    public static function getAndDecodeJson($key,$redisName='redis')
    {
        $redis = self::getrRedis($redisName);
        return json_decode($redis->get($key), true);
    }
}