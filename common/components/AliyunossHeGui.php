<?php
/**
 * Created by PhpStorm.
 * User: guoshuai
 * Date: 06/07/17
 * Time: 下午 07:16
 */

namespace common\components;

use Yii;
use yii\base\Component;
use OSS\OssClient;

class AliyunossHeGui extends Component
{
    public static $oss;
    public static $fileInfo = ''; //最后一次上传成功的文件返回信息

    public function __construct($pigeonhole = false)
    {
        parent::__construct();
        $accessKeyId = Yii::$app->params['oss-pigeonhole']['accessKeyId'];                 //获取阿里云oss的accessKeyId
        $accessKeySecret = Yii::$app->params['oss-pigeonhole']['accessKeySecret'];         //获取阿里云oss的accessKeySecret
        $endpoint = Yii::$app->params['oss-pigeonhole']['endPoint'];                       //获取阿里云oss的endPoint
        self::$oss = new OssClient($accessKeyId, $accessKeySecret, $endpoint);  //实例化OssClient对象
    }

    /**
     * 返回刚上传文件的信息
     * @return type
     */
    public function getFileInfo()
    {
        return self::$fileInfo;
    }

    /**
     * 返回刚上传文件的文件名
     */
    public function getFileUrl()
    {
        return self::$fileInfo['url'] ?? '';
    }

    /**
     * 使用阿里云oss上传文件（文件内容方式）
     * @param $object   保存到阿里云oss的文件名
     * @param $content 文件内容
     * @param $bucket 文件命名空间
     * @return bool     上传是否成功
     */
    public function putObject($object, $content)
    {
        $res = false;
        $bucket = Yii::$app->params['oss-pigeonhole']['bucket'];               //获取阿里云oss的bucket
        $do = self::$oss->putObject($bucket, $object, $content);

        if ($do) {  //调用uploadFile方法把服务器文件上传到阿里云oss
            self::$fileInfo = $do['info'];
            $res = true;
        }

        return $res;
    }

    /**
     * 使用阿里云oss上传文件
     * @param $object   保存到阿里云oss的文件名
     * @param $filepath 文件在本地的绝对路径
     * @return bool     上传是否成功
     */
    public function upload($object, $filepath)
    {
        $res = false;
        $bucket = Yii::$app->params['oss-pigeonhole']['bucket'];               //获取阿里云oss的bucket
        if (self::$oss->uploadFile($bucket, $object, $filepath)) {  //调用uploadFile方法把服务器文件上传到阿里云oss
            $res = true;
        }

        return $res;
    }

    /**
     * 删除指定文件
     * @param $object 被删除的文件名
     * @return bool   删除是否成功
     */
    public function delete($object)
    {
        $res = false;
        $bucket = Yii::$app->params['oss-pigeonhole']['bucket'];    //获取阿里云oss的bucket
        if (self::$oss->deleteObject($bucket, $object)) { //调用deleteObject方法把服务器文件上传到阿里云oss
            $res = true;
        }

        return $res;
    }

    public function test()
    {
        echo 123;
        echo "success";
    }
}