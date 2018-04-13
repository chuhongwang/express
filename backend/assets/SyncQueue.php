<?php
namespace backend\assets;

/**
 * @desc: 同步调用队列handler
 * ==============================================
 * yonglibao.com Lib
 * 版权所有 @2017 yonglibao.com
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局访问）
 * ==============================================
 * @date    : 2017-08-21 12:35:57
 * @author  : lawson.zhang<zhangzhihong@ylb.net>
 * @version : 1.0.0.0
*/
class SyncQueue
{

    /**
     * @desc    : 执行
     * @date    : 2017-08-21 12:39:09
     * @author  : lawson.zhang<zhangzhihong@ylb.net>
     * @version : 1.0.0.0
     * @param   : json $qMessage 队列消息体
    */
    public function send($qMessage)
    {
        $caller = new \app\call\Index;
        $result = $caller->index($qMessage);
        
        return $result;
    }
}
