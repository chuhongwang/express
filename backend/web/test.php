<?php

$url = "https://mmec.yunsigntest.com/mmecserver3.0/webservice/Common?wsdl";
$appid = "4CU0wvd9GI";
$key = "426WGkG8U3hWb5R5x9VV";
$orderId = "TC00008";
$userId = "yonglibao2";
$time = time()."000";
$signType = "MD5";

$data['appId'] = $appid;
$data['time'] = time()."000";
$data['signType'] = "MD5";
$data['userId'] = $userId;
$data['orderId'] = $orderId;

//校验值拼接转码
$md5str = $appid."&".$orderId."&".$time."&".$userId."&".$key;
$sign = md5($md5str);

$data['sign'] = $sign;
echo $appid;
?>

<form id="form4" name="form4" method="post" action="https://www.yunsigntest.com/mmecserver3.0/httpDownload.do">
    <input type="hidden" name="appId" id="appId" value="<?php echo $appid ?>">
    <input type="hidden" name="time" id="time" value="<?php echo $time ?>">
    <input type="hidden" name="sign" id="sign" value="<?php echo $sign ?>">
    <input type="hidden" name="signType" id="signType" value="<?php echo $signType ?>">
    <input type="hidden" name="userId" id="userId" value="<?php echo $userId ?>">
    <input type="hidden" name="orderId" id="orderId" value="<?php echo $orderId ?>">
    <input type="hidden" name="isPdf" id="isPdf" value="pdf">

    <input type="submit" value="HTTP下载合同">
</form>

