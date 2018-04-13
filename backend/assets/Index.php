<?php

/**
 * Handler调度程序
 * @Author: xiaozan
 * @Date: 2017-06-19 11:21:43
 * @Last Modified by:   Dujiangjiang
 * @Last Modified time: 2017-07-20 21:33:17
 */

namespace backend\assets;

use app\exception\BaseException;
use Log as Logger;

class Index {

    /**
     * 处理成功返回代码
     */
    const SUCCESS_CODE = 1000;

    /**
     * 事件处理异常返回代码(系统异常)
     */
    const SYSERR_CODE = 9999;

    /**
     * 入口函数
     * @param string $message 队列消息
     * @return array handle处理结果
     */
    public function index($message){
        
        $msg_arr = json_decode($message, true);
        Logger::recordSystem($msg_arr);
        $events = $msg_arr['body'];
        $results = [];

        if(!isset($msg_arr['queueType']) || !isset($msg_arr['requestUuid']))
            throw new \Exception('请使用Queue::getInstance()->addEvent操作入队');

        \think\Request::instance()->bind('requestUuid', $msg_arr['requestUuid']);
        Logger::write(json_encode($events), 'error');
        try {
            foreach ($events as $key => $event) {
                $event_key = $key;
                Logger::info('事件出队', $event);
                $ename = ucfirst($event['ename']);
                if (!class_exists($ename)){

                    class_alias("app\\handler\\{$ename}Handler", $ename);
                }
                $handle = new $ename($event);
                $handle->init();
                $handle->exec();
                $result = $handle->result();
                $msg_arr['body'][$key]['status'] = 2; //表示正常处理完成
                $msg_arr['status'] = 2;
                Logger::recordSystem($event, $result);
            }
        } catch (BaseException $e) {
            if($msg_arr['queueType'] == 'sync') throw $e;

            $msg_arr['body'][$event_key]['status'] = 3; //业务处理过程中发生了异常
            $code = $e->getCode();
            $message = $e->getMessage();
            $msg_arr['status'] = 3;
            $msg_arr['trace'] = $e->getTraceAsString();
            $results = $this->_generateResult($code, $message, $msg_arr);
        } catch (\Exception $e) {
            if($msg_arr['queueType'] == 'sync') throw $e;

            $message = '事件处理发生异常:'.$e->getMessage();
            $msg_arr['status'] = 4;
            $msg_arr['trace'] = $e->getTraceAsString();
            $results = $this->_generateResult(self::SYSERR_CODE, $message, $msg_arr);
        } catch (\Error $e) {
            if($msg_arr['queueType'] == 'sync') throw $e;

            $message = '未能捕获到的异常:'.$e->getMessage();
            $msg_arr['status'] = 4;
            $msg_arr['trace'] = $e->getTraceAsString();
            $results = $this->_generateResult(self::SYSERR_CODE, $message, $msg_arr);
        }

        if (empty($results)) {
            $msg_arr['status'] = 2;
            $results = $this->_generateResult(self::SUCCESS_CODE, '事件处理正常完成', $msg_arr);
        }
        if(isset($results['trace'])) unset($msg_arr['trace']);
        Logger::recordSystem($msg_arr, $results);
        return $results;
    }

    private function _generateResult($code, $message, $data) {
        return [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
    }
}
