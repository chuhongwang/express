<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animate.css',
        'css/bootstrap.min.css',

        'css/style.css',
        'css/site.css?v=20170622',
        'font-awesome/css/font-awesome.css',

        'css/plugins/morris/morris-0.4.3.min.css',
        "css/plugins/codemirror/codemirror.css",
        "css/plugins/codemirror/ambiance.css",
        "css/plugins/c3/c3.min.css",
        'css/plugins/iCheck/custom.css',
        'css/plugins/steps/jquery.steps.css',
        'css/plugins/sweetalert/sweetalert.css',
        'css/style.css',

        'js/plugins/jquery-ui/jquery-ui.css',
        'js/plugins/jquery-ui-timepicker/jquery-ui-timepicker-addon.css',
    ];
    public $js = [
        'js/PCASClass.js',
//        'js/jquery-2.1.1.js',//会冲突
        'js/bootstrap.min.js',
        # 'js/bootstrap-datetimepicker.min.js',
        'js/inspinia.js',

        'js/plugins/datapicker/bootstrap-datepicker.js',
        'js/plugins/metisMenu/jquery.metisMenu.js',
        'js/plugins/morris/raphael-2.1.0.min.js',
        'js/plugins/morris/morris.js',
        "js/plugins/d3/d3.min.js",
        "js/plugins/c3/c3.min.js",
        'js/plugins/pace/pace.min.js',
        'js/plugins/slimscroll/jquery.slimscroll.min.js',
        'js/plugins/staps/jquery.steps.min.js',
        'js/plugins/sweetalert/sweetalert.min.js',
        'js/plugins/validate/jquery.validate.min.js',

        'js/plugins/jquery-ui/jquery-ui.js',
        'js/plugins/jquery-ui-timepicker/jquery-ui-timepicker-addon.js',

        'js/menu.js',
        'js/bootbox.js',
        'js/global.js?v=20170622',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\captcha\CaptchaAsset'
//        'yii\bootstrap\BootstrapAsset',
    ];

    public static function isActiveAction($action = '') {
        $key = \Yii::$app->controller->action->id;
        $menuMap = [
            'create' => 'app-list',
            'view' => 'app-list',
            'replay'=>'app-replay',
        ];

        $menu = isset($menuMap[$key]) ? $menuMap[$key] : $key;

        return $menu == $action ? 'active' : '';
    }

    public static function isActiveController($controller = '') {
        $key = \Yii::$app->controller->id;
        $menuMap = [
        ];

        $menu = isset($menuMap[$key]) ? $menuMap[$key] : $key;

        return $menu == $controller ? 'active' : '';
    }

    public static function isActiveModule($module = '') {
        $key = \Yii::$app->controller->module->id;
        $menuMap = [
        ];

        $menu = isset($menuMap[$key]) ? $menuMap[$key] : $key;

        return $menu == $module ? 'active' : '';
    }

    //定义按需加载JS方法，注意加载顺序在最后
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }

    //定义按需加载css方法，注意加载顺序在最后
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }

    /**
     *
     * @return string
     */
    public static function footer() {
        return '<div class="text-center"><strong>Copyright</strong> &copy; ' . date("Y") . ' 河北印千山健康管理有限公司 冀ICP备13037734号</div>';
    }
}
