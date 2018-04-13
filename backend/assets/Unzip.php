<?php
/**
 * Created by PhpStorm.
 * User: D104
 * Date: 2017/12/26
 * Time: 22:57
 */
/**
 *  function: 解压zip 格式的文件
 *  author：friker
 *  date:2015-15-14
 *  reference：http://php.net/manual/zh/ref.zip.php
 *  all rights reserved:wujiangwei123@126.com
 */
namespace backend\assets;

class Unzip{

    public function __construct(){
        //init code here...
        header("content-type:text/html;charset=utf8");
    }

    public function downRemoteFile($remote,$path)
    {
        $fp_output = fopen($path, 'w');
        $ch = curl_init($remote);
        curl_setopt($ch, CURLOPT_FILE, $fp_output);
        curl_exec($ch);
        curl_close($ch);
        exec("libreoffice $path", $out, $status);
    }
    /**
     * 解压文件到指定目录
     *
     * @param   string   zip压缩文件的路径
     * @param   string   解压文件的目的路径
     * @param   boolean  是否以压缩文件的名字创建目标文件夹
     * @param   boolean  是否重写已经存在的文件
     *
     * @return  boolean  返回成功 或失败
     */
    public function unzip($src_file, $dest_dir=false, $create_zip_name_dir=true, $overwrite=true){

        if ($zip = zip_open($src_file)){
            if ($zip){
                $splitter = ($create_zip_name_dir === true) ? "." : "/";
                if($dest_dir === false){
                    $dest_dir = substr($src_file, 0, strrpos($src_file, $splitter))."/";
                }

                // 如果不存在 创建目标解压目录
                $this->create_dirs($dest_dir);

                // 对每个文件进行解压
                while ($zip_entry = zip_read($zip)){
                    // 文件不在根目录
                    $pos_last_slash = strrpos(zip_entry_name($zip_entry), "/");
                    if ($pos_last_slash !== false){
                        // 创建目录 在末尾带 /
                        $this->create_dirs($dest_dir.substr(zip_entry_name($zip_entry), 0, $pos_last_slash+1));
                    }

                    // 打开包
                    if (zip_entry_open($zip,$zip_entry,"r")){

                        // 文件名保存在磁盘上
                        $file_name = $dest_dir.zip_entry_name($zip_entry);

                        // 检查文件是否需要重写
                        if ($overwrite === true || $overwrite === false && !is_file($file_name)){
                            // 读取压缩文件的内容
                            $fstream = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

                            @file_put_contents($file_name, $fstream);
                            // 设置权限
                            chmod($file_name, 0777);
                            //echo "save: ".$file_name."<br />";
                        }

                        // 关闭入口
                        zip_entry_close($zip_entry);
                    }
                }
                // 关闭压缩包
                zip_close($zip);
            }
        }else{
            return false;
        }
        return true;
    }

    /**
     * 创建目录
     */
    public function create_dirs($path){
        if (!is_dir($path)){
            $directory_path = "";
            $directories = explode("/",$path);
            array_pop($directories);

            foreach($directories as $directory){
                $directory_path .= $directory."/";
                if (!is_dir($directory_path)){
                    mkdir($directory_path);
                    chmod($directory_path, 0777);
                }
            }
        }
    }
    /**
     * 删除目录
     */
    public function deldir($dir) {
        if(is_dir($dir)){
            //先删除目录下的文件：
            $dh=opendir($dir);
            while ($file=readdir($dh)) {
                if($file!="." && $file!="..") {
                    $fullpath=$dir."/".$file;
                    if(!is_dir($fullpath)) {
                        unlink($fullpath);
                    } else {
                        $this->deldir($fullpath);
                    }
                }
            }
            closedir($dh);
            //删除当前文件夹：
            if(rmdir($dir)) {
                return true;
            } else {
                return false;
            }
        }else{
            return true;
        }
    }
    /**
     * 遍历目录
     */
    function read_all_dir ( $dir )
    {
        $result = array();
        $handle = opendir($dir);
        if ( $handle ){
            while ( ( $file = readdir ( $handle ) ) !== false ){
                if ( $file != '.' && $file != '..'){
                    $cur_path = $dir . DIRECTORY_SEPARATOR . $file;
                    if ( is_dir ( $cur_path ) ){
                        $result[$file] = $this->read_all_dir ( $cur_path );
                    }else{
                        $path = \Yii::$app->urlManager->hostInfo.'\\'.strstr($cur_path,'php');
                        $result['file'][$file] = $path;
                    }
                }
            }
            closedir($handle);
        }
        return $result;
    }
}