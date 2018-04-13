<?php
namespace backend\assets;


/**
 * @desc: 入队列
 * ==============================================
 * yonglibao.com Lib
 * 版权所有 @2017 yonglibao.com
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局访问）
 * ==============================================
 * @date    : 2017-08-21 11:11:42
 * @author  : lawson.zhang<zhangzhihong@ylb.net>
 * @version : 1.0.0.0
*/
class Queue
{
    private static $_instance = null;
    private $_events = [];
    public $_queueHandler;
    private $_queueType = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @var Queue
     */
    public static function getInstance()
    {

        // if (!(self::$_instance instanceof self))
            // self::$_instance = new self();
        self::$_instance = new self();

        $queueDriver = \Yii::$app->params['QUEUECACHE']['QUEUE_DRIVER'] ?? 'redis';
       // var_dump($queueDriver);die;
        $methodName = '_set' . ucfirst($queueDriver);
        //var_dump($methodName);
        //die();
        if (!method_exists(self::$_instance, $methodName))
            throw new \Exception('队列引擎不存在');

        self::$_instance->_queueType = strtolower($queueDriver);
        //var_dump(self::$_instance->_queueType);die;
        return self::$_instance->$methodName();
    }

    /**
     * @desc    : 使用REDIS作为队列容器
     * @date    : 2017-08-21 11:32:48
     * @author  : lawson.zhang<zhangzhihong@ylb.net>
     * @version : 1.0.0.0
    */
    private function _setRedis()
    {
        $this->_queueHandler = \app\library\Redis::getInstance(config('redis'));

        return $this;
    }

    /**
     * @desc    : 使用RabbotMQ作为队列容器
     * @date    : 2017-08-21 11:32:48
     * @author  : lawson.zhang<zhangzhihong@ylb.net>
     * @version : 1.0.0.0
    */
    private function _setRabbitMQ()
    {

        /*$rabbitmqConf = config('rabbitMQ');
        $configs      = $rabbitmqConf['conf'];
        $exchangeName = $rabbitmqConf['exchange'];
        $queueName    = $rabbitmqConf['queue'];
        $routeKey     = $rabbitmqConf['route'];*/
        $configs      = \Yii::$app->params['QUEUE'];
        $exchangeName = \Yii::$app->params['exchange'];
        $queueName    = \Yii::$app->params['queue'];
        $routeKey     = \Yii::$app->params['route'];
        $this->_queueHandler = new \backend\assets\RabbitMQ($configs, $exchangeName, $queueName, $routeKey);

        return $this;
    }

    /**
     * @desc    : 队列短路 同步执行
     * @date    : 2017-08-21 12:00:29
     * @author  : lawson.zhang<zhangzhihong@ylb.net>
     * @version : 1.0.0.0
    */
    private function _setSync()
    {
        $this->_queueHandler = new \backend\assets\SyncQueue();

        return $this;
    }

    /**
     * @desc    : 添加事件
     * @date    : 2017-08-21 11:26:08
     * @author  : lawson.zhang<zhangzhihong@ylb.net>
     * @version : 1.0.0.0
     * @param   : string $eName 事件名称
     * @param   : array $eBody 事件内容
     * @param   : string $eventId 时间唯一ID
     * @var       Queue
     */
    public function addEvent($eName, array $eBody, $eventId = null)
    {

        $this->_events[] = [
            'ename'  => $eName,
            'eid'    => $eventId ?? 'E_' . \backend\assets\Helpers::serialGen(),
            'status' => 1,
            'data'   => $eBody,
        ];
        echo PHP_EOL.' -------队列添加事件------ '.PHP_EOL;
        var_export($this->_events);

        return $this;
    }

    /**
     * @desc    : 入队列
     * @date    : 2017-08-21 11:29:54
     * @author  : lawson.zhang<zhangzhihong@ylb.net>
     * @version : 1.0.0.0
     * @param   : string $qName 队列名
    */
    public function push($qName)
    {

        $redis=\Yii::$app->redis;
        $message = [
            'qid'    => 'Q_' . \backend\assets\Helpers::serialGen(),
            'qname'  => $qName,
            'date'   => microtime(true),
            'status' => 1,
            'body'   => $this->_events,
            'queueType' => $this->_queueType,
            'requestUuid' => $redis->get('requestUuid'),
        ];
        $ripeMessage = json_encode($message, JSON_UNESCAPED_UNICODE);

        $result = $this->_queueHandler->send($ripeMessage);
        echo PHP_EOL.' -------入队列------ '.PHP_EOL;
        var_dump($result);
        unset($this->_events);

        return $result;
    }
}
