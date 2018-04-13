<?php
/**
 * Created by PhpStorm.
 * User: gufeng
 * Date: 2017/7/28
 * Time: 19:31
 */

namespace common\components;


use backend\models\ultron\RiskReportQuery;

class Api
{
    public function getHlcCurl($tid, $status)
    {
        //$url = "http://newhuo.yonglibao.com/V2/transfer/upaudit";
        $url = \Yii::$app->params['HLC_API'] . '/debt/audit';
        $params = [
            'debt_id' => $tid,
            'audit_status' => $status,
        ];
        $auth = \Yii::$app->params['HLC_AUTH'];
        $header = 'Authorization: ' . $auth;
        $p2pkey_headers = [$header];
        //post请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $p2pkey_headers);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


    public function getYlbCurl($loan_order_id, $audit_status)
    {
        //$url = "https://gapi.yonglibao.com/Agency/Partner/loanAudit";
        $url = \Yii::$app->params['YLB_API'] . '/debt/audit';
        $params = [
            'debt_id' => $loan_order_id,
            'audit_status' => $audit_status,
        ];
        $auth = \Yii::$app->params['YLB_AUTH'];
        $header = 'Authorization: ' . $auth;
        $p2pkey_headers = [$header];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $p2pkey_headers);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }


    public function getHlcUser($user_id)
    {
        $url = \Yii::$app->params['HLC_API'] . '/account/queryUser';
        $params = [
            'uid' => $user_id,
        ];
        $auth = \Yii::$app->params['HLC_AUTH'];
        $header = 'Authorization: ' . $auth;
        $p2pkey_headers = [$header];
        //post请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $p2pkey_headers);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


    public function getYlbUser($user_id)
    {
        $url = \Yii::$app->params['YLB_API'] . '/account/queryUser';
        $params = [
            'uid' => $user_id,
        ];
        $auth = \Yii::$app->params['YLB_AUTH'];
        $header = 'Authorization: ' . $auth;
        $p2pkey_headers = [$header];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $p2pkey_headers);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


    //永利宝拒单回调
    public function ylbRejectNotify($debt_id, $status)
    {
        $url = \Yii::$app->params['P2PAPI_API'] . '/loan/callbackStatus';
        $params = [
            'debt_id' => $debt_id,
            'status' => 9,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $p2pkey_headers);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


    //火理财拒单回调
    public function hlcRejectNotify($debt_id, $status)
    {
        $url = \Yii::$app->params['P2PAPI_API'] . '/loan/callbackStatus';
        $params = [
            'debt_id' => $debt_id,
            'status' => 9,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


    //ylb债权上线
    public function ylbDebtPublish($debts, $product)
    {
        $url = \Yii::$app->params['YLB_PUBLISH'] . '/debt/publish';
        $params = [
            'debt_id' => $debts,
            'product_id' => $product,
        ];
        $token = ['authorization:' . \Yii::$app->params['YLB_PUBLISH_TOKEN']];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $token);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


    //ylb创建债权
    public function createDebt($data)
    {
        $url = \Yii::$app->params['YLB_PUBLISH'] . '/debt/submit';
        $params = [
            'uid' => $data['db_id'],
            'agency_id' => $data['da_id'],
            'trustee_id' => $data['ui_trustee_id'],
            'guarantee_id' => $data['ui_guarantee_id'],
            'name' => $data['d_name'],
            'contract_number' => $data['d_contract_number'],
            'type' => $data['d_type'],
            'amount' => $data['d_amount'],
            'payback_method' => $data['d_payback_method'],
            'loan_days' => $data['d_loan_days'],
            'fee' => $data['d_fee'],
            'service_charge' => $data['d_service_charge'],
            'interest_rate' => $data['d_interest_rate'],
            'audit_status' => $data['d_audit_status'],
            'loan_usage' => $data['d_loan_usage'],
            'asset_info' => $data['d_asset_info'],
            'other_loan_info' => $data['d_other_loan_info'],
            'other_type_info' => $data['d_other_type_info'],
            'fund_from' => $data['d_fund_from'],
            'guarantee_info' => $data['d_guarantee_info'],
            'payback_com_period' => isset($data['d_payback_com_period']) ? $data['d_payback_com_period'] : null,
            'one_service_rate' => $data['d_one_time_fee_rate'],
            'month_service_rate' => $data['d_month_fee_rate'],
            'basic_rate' => isset($data['d_basic_rate']) ? $data['d_basic_rate'] : 0.06,
            'introduction' => $data['d_introduction'],
            'safeguard' => $data['d_safeguard'],
            'risk_assessment' => $data['d_risk_assessment'],
            'raise_term' => $data['d_raise_term'] ?: 20,
            'source' => 4,
        ];

        $token = ['authorization:' . \Yii::$app->params['YLB_PUBLISH_TOKEN']];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $token);
        $output = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($output);
        return $result;
    }


    /**
     * 风控回调接口，插入风控报告
     * @return mixed
     *
     */
    public function notify()
    {
        $d_id = $_REQUEST['loan_id'];
        $risk_status = $_REQUEST['risk_status'];
        $risk_report = $_REQUEST['risk_report'];
        $risk_reason = $_REQUEST['risk_reason'];

        $resultSuccess = [
            'err_code' => 1000,
            'err_msg' => 'success',
        ];

        $resultError = [
            'err_code' => 999,
            'err_msg' => 'error',
        ];
        $risk = new RiskReportQuery();
        $status = $risk->insertRiskReport($d_id, $risk_status, $risk_report, $risk_reason);
        \Yii::info('-------p2papi回调接口调用: ' . '插入id=' . $d_id . ', risk_status=' . $risk_status . ', risk_report=' . $risk_report . ' 拒单原因：' . $risk_reason . '影响行数：' . $status, $category = 'application');
        if ($status != 1) {
            return json_encode($resultError);
        }
        return json_encode($resultSuccess);

    }


    //调用风控接口

    /**
     * 尹红涛
     * @param $debt_id
     * @param $realname
     * @param $phone
     * @param $idnum
     * @return mixed
     */
    public function callRisk($debt_id, $realname, $phone, $idnum)
    {
        $url = \Yii::$app->params['RISK_URL'] . '/v2/risk/add';
        $params = [
            'notify_url' => \Yii::$app->params['RISK_NOTIFY_URL'],
            'loan_id' => $debt_id,
            'name' => $realname,
            'phone' => $phone,
            'idNumber' => $idnum,
        ];
        \Yii::info('风控接口地址:' . $url);
        \Yii::info('风控接口参数:' . json_encode($params, JSON_UNESCAPED_UNICODE));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $output = curl_exec($ch);
        curl_close($ch);
        \Yii::info('风控接口返回参数:' . json_encode($output, JSON_UNESCAPED_UNICODE));
        return $output;
    }

    //调用inside接口
    public function callInside($url, $params)
    {
        $url = strpos($url, \Yii::$app->params['YLB_PUBLISH']) === false ? \Yii::$app->params['YLB_PUBLISH'] . $url : $url;
        \Yii::warning('inside接口地址:' . $url);
        \Yii::warning('inside接口参数:' . json_encode($params));
        $result = $this->_curl($url, $params);
        \Yii::warning('inside接口返回:' . json_encode($result));
        return $result;

    }

    // curl封装
    protected function _curl($url, $params)
    {
        $token = ['authorization:' . \Yii::$app->params['YLB_PUBLISH_TOKEN']];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $token);
        $output = curl_exec($ch);
        curl_close($ch);
        return $result = json_decode($output, true);
    }

    /**
     * 格式化json返回
     * @version 1.0
     * @param $phone
     * @return mixed
     */
    public static function returnJson($code = 0, $msg = '', $data = [])
    {
        $json_result['code'] = $code;
        $json_result['msg']  = $msg;
        $json_result['data'] = $data;

        return json_encode($json_result, JSON_UNESCAPED_UNICODE);
    }

}
