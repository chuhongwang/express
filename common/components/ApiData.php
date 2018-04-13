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

class ApiData extends Component
{

    /**
     * @param $id
     * @param $page_size
     * @param $params
     * @return mixed  资金记录
     */
    public function getByData($id)
    {
        $url = yii::$app->params['api']['address'] . yii::$app->params['api']['accountLogQuery'];
        $options['key'] = Yii::$app->params['api_key']['bwaccountlog_key'];
        $options['userId'] = $id;
        $options['page'] = 1;
        $key = 'Authorization';
        $options['page_size'] = 1000;
        $data = $this->getByCurlData($url, $key, $options);
//        echo '<pre>';
//        print_r($data);
//        exit;

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     * 近期回款
     */
    public function getResponse($id)
    {
        $url = yii::$app->params['api']['address'] . yii::$app->params['api']['JxRepayQuery'];
        $options['key'] = yii::$app->params['api_key']['JxRepay_key'];
        $options['uid'] = $id;
        $key ='UMP-KEY';
        $data = $this->getByCurlData($url,$key,$options);
        return $data;

    }

    /**
     * @param $id
     * @return mixed
     * 添加开发者账号
     */
//    public function getUserAgency($data)
//    {
//        $url = yii::$app->params['api']['apiadress'] . yii::$app->params['api']['api'];
//        $options['email'] = $data['email'];
//        $options['password'] = $data['password'];
//        $data = $this->getUserAddAgency($url,$options);
//        return $data;
//
//    }




    /**
     * @param $id
     * @return mixed
     * 添加开发者账号到正式库
     */
    public function getSave($params,$password)
    {
        $url = yii::$app->params['api']['apiadress121'] . yii::$app->params['api']['register'];
        $options['agency_id'] =$params['agency_id'];
        $options['agency_name'] =$params['da_name'];
        $options['email'] =$params['email'];
        $options['password'] =$password;
        $data = $this->getUserAddAgency($url,$options);
        return $data;

    }

    /**
     * @param $id
     * @return mixed
     * 返回开发者账号测试key
     */
    public function getRegister($user_bind,$params,$da_name,$email,$password,$platform,$ui_id)
    {
        $url = yii::$app->params['api']['apiadress121'] . yii::$app->params['api']['generateTestKey'];
        $options['agency_id'] =$params;
        $options['agency_name'] =$da_name;
        $options['email'] =$email;
        $options['password'] =$password;
        $options['uid'] =$user_bind['ui_id'];
        $options['id_no'] =$user_bind['ub_id_card'];
        $options['bank_card'] =$user_bind['ub_bank_card'];
        $options['mobile'] =$user_bind['ub_bank_phone'];
        $options['partner_aka'] ='';
        $options['is_entrust'] =$user_bind['ub_id_card'];
        $options['is_guarantee'] =$user_bind['ub_id_card'];
        $options['platform'] =$platform;
        if(empty($ui_id)){
            $options['is_entrust'] =0;
            $options['is_guarantee'] =0;
        }else{
            if($ui_id[0]==1){
                $options['is_entrust'] =0;
                $options['is_guarantee'] =1;
            }else if(isset($ui_id[1])){
                $options['is_entrust'] =1;
                $options['is_guarantee'] =1;
            }else{
                $options['is_entrust'] =1;
                $options['is_guarantee'] =0;
            }
        }
        $data = $this->getUserAddAgency($url,$options);
        return $data;

    }

    /**
     * @param $id
     * @return mixed
     * 生成生产环境key
     */
    public function getGenerateKey($user_bind,$agency_id,$agency_name,$platform,$ui_id)
    {
        $url = yii::$app->params['api']['apiadress121'] . yii::$app->params['api']['index'];
        $options['agency_id'] =$agency_id;
        $options['agency_name'] =$agency_name;
        $options['uid'] =$user_bind['ui_id'];
        $options['id_no'] =$user_bind['ub_id_card'];
        $options['bank_card'] =$user_bind['ub_bank_card'];
        $options['mobile'] =$user_bind['ub_bank_phone'];
        $options['partner_aka'] ='';
        $options['platform'] =$platform;
        if(empty($ui_id)){
            $options['is_entrust'] =0;
            $options['is_guarantee'] =0;
        }else{
            if($ui_id[0]==1){
                $options['is_entrust'] =0;
                $options['is_guarantee'] =1;
            }else{
                $options['is_entrust'] =1;
                $options['is_guarantee'] =1;
            }
        }
        $data = $this->getUserAddAgency($url,$options);
        return $data;

    }



    /**
     * @param $id
     * @return mixed
     * 判断是否有开发者账号
     */
    public function getPuduan($date)
    {
        $url = yii::$app->params['api']['apiadress121'] . yii::$app->params['api']['apipanduan'];
        $options['agency_id'] =$date;
        $data = $this->getUserAddAgency($url,$options);
        return $data;

    }

    /**
     * @param $id
     * @return mixed
     * 查看开发者账号详情
     */
    public function getAgencyInfo($date)
    {
        $url = yii::$app->params['api']['apiadress121'] . yii::$app->params['api']['agencyInfo'];
        $options['agency_id'] =$date;
        $data = $this->getUserAddAgency($url,$options);
        return $data;

    }

    /**
     * @param $id
     * @return mixed
     * 开发者账号详情生成生产环境
     */
//    public function getUsersNames($date)
//    {
//        $url = yii::$app->params['api']['apiadress'] . yii::$app->params['api']['username'];
//        $options['agency_id'] =$date;
//        $data = $this->getUserAddAgency($url,$options);
//        return $data;
//
//    }

    /**
     * @param $id
     * @return mixed
     * 更新开发者账号
     */
    public function getUserInfoUpdate($params)
    {

        $url = yii::$app->params['api']['apiadress121'] . yii::$app->params['api']['userInfoUpdate'];
        $options['email'] =$params['nowemail'];

        $options['new_email'] =$params['email'];
        $options['password'] =$params['password'];
        $data = $this->getUserAddAgency($url,$options);
        return $data;

    }


    /**
     * @param $id
     * @return mixed
     * 企业用户信息查询
     */
    public function getorpInfoQuery($accountId)
    {
        $url = yii::$app->params['api_corpInfo']['address'] . yii::$app->params['api_corpInfo']['corpInfoQuery'];
        $options['key'] = yii::$app->params['api_key']['corpInfo_key'];
        $options['accountId'] = $accountId;
        $key ='UMP-KEY';
        $data = $this->getByCurlData($url,$key,$options);
        return $data;

    }

    /**
     * 企业用户创建账号
     * @param $accountId
     * @return mixed
     */
    public function getorpInfoCreate($accountId)
    {

        $url = yii::$app->params['api_corpInfo']['address'] . yii::$app->params['api_corpInfo']['corpInfoCreate'];
        $options['key'] = yii::$app->params['api_key']['corpInfo_key'];
        $options['accountId'] = $accountId;
        $key ='UMP-KEY';
        $data = $this->getByCurlData($url,$key,$options);
        return $data;
    }


    /**
     * @param $id
     * @return mixed
     * 回款日历
     */
    public function getMonths($id,$year,$number)
    {
            $url = yii::$app->params['api_corpInfo']['address11528'] . yii::$app->params['api_corpInfo']['paymentDetail'];
            $options['year'] = $year;
            $options['month'] = $number;
            $options['uid'] = $id;
            $data = $this->getByCurlDatas($url,$options);
            return $data;

    }
    public function getMonthss($id,$time)
    {
        $time=explode('-',$time);

        $url = yii::$app->params['api_corpInfo']['address11528'] . yii::$app->params['api_corpInfo']['paymentDetail'];
        $options['year'] = $time[0];
        $options['month'] = $time[1];
        $options['uid'] = $id;
        $data = $this->getByCurlDatas($url,$options);
        return $data;

    }



    /**
     * @param $url
     * @param $key
     * @param $options
     * @return mixed
     * 调用curl 获取数据---http
     */
    public function getByCurlData($url, $key, $options)
    {
        $curl = new Curl();
        $curl->setHeaders([
            $key => $options['key'],
        ]);

        $response = $curl->setPostParams($options)->post($url);
        yii::info($curl);

        return json_decode($response, TRUE);
    }

    /**
     * @param $url
     * @param $key
     * @param $options
     * @return mixed
     * 调用curl 获取数据
     */
    private function getUserAddAgency($url, $options)
    {
        $curl = new Curl();
        $response = $curl->setPostParams($options)->post($url);
        yii::info($curl);
        return json_decode($response, TRUE);
    }

    /**
     * @param $url
     * @param $key
     * @param $options
     * @return mixed
     * 调用curl 获取数据---http
     */
    public function getByHttpsCurlData($url, $key, $options)
    {
        $curl = new Curl();
        $curl->setHeaders([
            $key => $options['key'],
        ]);
        $curl->setOption(CURLOPT_SSL_VERIFYPEER, false);
        $response = $curl->setPostParams($options)->post($url);
        yii::info($curl);
        return json_decode($response, TRUE);
    }

    /*
    *常田飞回款日历专用
    */
    public function getByCurlDatas($url, $options)
    {
        $curl = new Curl();
        $response = $curl->setPostParams($options)->post($url);
        yii::info($curl);
        return json_decode($response, TRUE);
    }
    /**
     * @param $url
     * @param $key
     * @param $options
     * @return mixed
     * 调用curl 获取数据
     */
    public function postCurl($url, $key, $options)
    {
        $curl = new Curl();
        $curl->setHeaders([
            $key => $options['key'],
        ]);
        $curl->setOption(CURLOPT_SSL_VERIFYPEER, false);
        $response = $curl->setPostParams($options)->post($url);
        return [json_decode($response, TRUE),$curl];
    }
    /**
     * @param $url
     * @param $key
     * @param $options
     * @return mixed
     * POST调用curl 获取数据
     */
    public function getByCurlDataPost($url, $key, $options)
    {
        $curl = new Curl();
        $curl->setHeaders([
            $key => $options['key'],
        ]);
        $curl->setOption(CURLOPT_SSL_VERIFYPEER, false);
        $response = $curl->setPostParams($options)->post($url);
        return json_decode($response, TRUE);
    }



}