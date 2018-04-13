<?php
/**
 * Created by PhpStorm.
 * User: nicc
 * Date: 2017/7/6
 * Time: 20:06
 */

namespace common\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;

class UploadForm extends Model
{
    public $file;  //用来保存文件

    public function scenarios()
    {
        return [
            'upload' => ['file'], // 添加上传场景
        ];
    }

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, gif,jpeg,pdf', 'mimeTypes' => 'image/jpeg, image/png, image/gif,application/pdf', 'maxSize' => 1024 * 1024 * 10, 'maxFiles' => 1, 'on' => ['upload']],
            //设置图片的验证规则
        ];
    }

    /**
     * 上传单个文件到文件夹
     * @return boolean  上传是否成功
     */
    public function uploadfile()
    {
        $res['error'] = 1;
        if ($this->validate()) {
            $uploadPath = 'uploads/';  // 取得上传路径
            if (!file_exists($uploadPath)) {
                @mkdir($uploadPath, 0777, true);
            }

            $ext = $this->file->getExtension();                // 获取文件的扩展名
            $randnums = $this->getrandnums();                   // 生成一个随机数，为了重命名文件
            $imageName = date("YmdHis") . $randnums . '.' . $ext;     // 重命名文件
            $ossfile = 'file/' . date("Ymd") . '/' . $imageName;      // 这里是保存到阿里云oss的文件名和路径。如果只有文件名，就会放到空间的根目录下。
            $filePath = $uploadPath . $imageName;                 // 生成文件的绝对路径

            if ($this->file->saveAs($filePath)) {
                return $filePath;
            }
        }
        return $res;                                            // 返回上传信息
    }

    /**
     * 生成随机数
     * @return string 随机数
     */
    protected function getrandnums()
    {
        $random_data = range(10, 99);
        $random_keys = array_rand($random_data, 5);
        $randnums = implode('', $random_keys);
        return $randnums;
    }




}