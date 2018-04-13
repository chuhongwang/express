<?php
/*==================================
*   Copyright (C) 2016 slightech.com, Inc. All rights reserved.
*
*   filename	:	SHttp.php
*   author		:	zhouping
*   create_time	:	2016-10-18
*   desc		:
*
===================================*/

namespace backend\tools;
class SHttp{

	/**
     * 判断请求类型是否为POST
     *
     * @return bool
     */
    public static function isPost() {
		return strtolower($_SERVER['REQUEST_METHOD']) === 'post';
	}

	/**
	 * 判断请求类型是否为GET
	 *
	 * @return bool
	 */
	public static function  isGet() {
		return strtolower($_SERVER['REQUEST_METHOD']) === 'get';
	}

	public static function httpGet($url, $http_header = array()) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$ret = curl_exec($ch);
		curl_close($ch);
		return $ret;
	}

	public static function httpPost($url, $post_data, $http_header = array()) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$ret = curl_exec($ch);
		curl_close($ch);
		return $ret;

	}



	public static function httpMethod($method, $url, $data, $http_header = array()) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$ret = curl_exec($ch);
		$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);

		if ($httpCode < 300) {
			return array('httpCode' => $httpCode, 'xml_data' => $ret);
		} else {
			return array('httpCode' => $httpCode, 'msg' => $ret);
		}
	}


}











/* vim: set tabstop=4 shiftwidth=4 expandtab: */
