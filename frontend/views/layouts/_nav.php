<?php
use yii\helpers\Html;

?>
<div class="site-topbar">
    <div class="site-wrap clearfix">
        <div class="col-4 site-topbar-phone">
            <ul>
                <li><i class="yicon yicon-phone c9 fs-18 mr-5"></i> <em>客服电话：400-615-5566</em></li>
            </ul>
        </div>
        <style>
            .nav > li > a {
                padding: 1px 22px;
            }
            .aside dt {
                padding-left: 35px;
            }
        </style>
        <?php
        if (Yii::$app->session->get('_id')) {
            echo '<div class="col-8 site-topbar-nav">
            <ul>
                <li class="item login">
                    <div class="site-topbar-logout" style="display: block;"><em><i class="yicon yicon-user"></i> <a
                                    class="username" rel="nofollow" href="' . Yii::$app->getHomeUrl() . '"
                                    id="ucenterUpdata">' . Yii::$app->session->get('_id') . '</a> <span class="hidden-sm">，欢迎来到永利宝！</span></em>'
            ?>
            <?php echo Html::a('[退出登录]', '/site/logout', ['class' => 'text-muted', 'data' => ['method' => 'post']]); ?>
            <?php
            echo '</div>
                </li>
            </ul>
        </div>';
        }
        ?>
    </div>
</div>
<div class="site-header">
    <div class="site-wrap index-position">
        <div class="col-4 pr-0 pl-0">
            <h1 class="site-header-logo">
                <a class="site-header-logo" href="<?= Yii::$app->getHomeUrl() ?>">永利宝金融P2P投资理财平台</a>
            </h1>
        </div>
    </div>
</div>
/**
 * Created by PhpStorm.
 * User: carson
 * Date: 16/2/29
 * Time: 下午5:04
 */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$uid = Yii::$app->user->identity->getId();
$isManager = ($uid > 1) ? 0 : 1;
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
<!--                    <span> <img alt="image" width="200px" src="https://static.yonglibao.com/global/images/logo-mx-2x.png?v=0e2d802987" /> </span>-->
                    <span> <img alt="image" width="150px" src="/img/logo.png" /> </span>
                </div>
                <div class="logo-element">
                    UMP
                </div>
            </li>


            <?php

            $callback = function($menu){

                $data = json_decode($menu['data'], TRUE);


                return [
                    'label' => $menu['name'],
                    'url' =>  $menu['route'],
                    'options' => $data,
                    'items' => $menu['children']
                ];
            };
            function create_name($item, $flag = FALSE) {
                $name = '';
                if (isset($item['options']) && isset($item['options']['icon'])) {
                    $name .= $item['options']['icon'];
                }

                $name .= '<span class="nav-label">' . $item['label'] . "</span>";
                if ($flag) {
                    $name .= '<span class="fa arrow"></span>';
                }
                return $name;
            }

            $items = \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
            foreach ($items as $item) {

                echo '<li>'; //第一级菜单
                if (empty($item['items'])) {
                    $name = create_name($item);
                    echo Html::a($name, $item['url'], $item['options']);
                }else{

                    $name = create_name($item, TRUE);
                    echo Html::a($name, 'javascript:void()', $item['options']);
                    echo '<ul class="nav nav-second-level">';   //第二级菜单
                    foreach ($item['items'] as $row) {

                        echo '<li>';
                        if (empty($row['items'])) {
                            $second_name = create_name($row);
                            echo Html::a($second_name, $row['url'], $row['options']);
                        }else{
                            $second_name = create_name($row, TRUE);
                            echo Html::a($second_name, 'javascript:void()');
                            echo '<ul class="nav nav-third-level">'; //第三级菜单
                            foreach ($row['items'] as $val) {
                                $third_name = create_name($val);
                                echo '<li>';
                                echo Html::a($third_name, $val['url'], $val['options']);
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';

            }


            
            /*
            $callback = function($menu){
                $data = json_decode($menu['data'], TRUE);

                $route =  !empty($data['route']) ? $data['route'] : $menu['route'];
                $route_arr = explode("/", trim($route, "/"));

                $module = Yii::$app->id;
                $controller = $action = "";
                if (count($route_arr) == 2) {
                    $controller = $route_arr[0];
                    $action = $route_arr[1];
                }else if (count($route_arr) == 3) {
                    $module = $route_arr[0];
                    $controller = $route_arr[1];
                    $action = $route_arr[2];
                }

                return [
                    'label' => $menu['name'],
                    'url' =>  $menu['route'],
                    'module' => $module,
                    'controller' =>  $controller,
                    'action' => $action,
                    'options' => $data,
                    'order' => $menu['order'],
                    'items' => $menu['children']
                ];
            };
            function create_name($item, $flag = FALSE) {
                $name = '';
                if (isset($item['options']) && isset($item['options']['icon'])) {
                    $name .= $item['options']['icon'];
                }
                $name .= $item['label'];
                if ($flag) {
                    $name .= '<span class="fa arrow"></span>';
                }
                return $name;
            }

            function isParentActive($item) {
                $module = \Yii::$app->controller->module->id;
                $controller = \Yii::$app->controller->id;
                $action = \Yii::$app->controller->action->id;

                if ($item['module'] != Yii::$app->id) {
                    return $module == $item['module'];
                }else{
                    return $module == $item['module'] && $controller == $item['controller'];
                }
            }

            function isActive($item) {
                $module = \Yii::$app->controller->module->id;
                $controller = \Yii::$app->controller->id;
                $action = \Yii::$app->controller->action->id;

                if ($item['module'] != Yii::$app->id) {
                    return $module == $item['module'] && $controller == $item['controller'];
                }else{
                    return $module == $item['module'] && $controller == $item['controller'] && $action == $item['action'];
                }
            }

            $items = \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
            ArrayHelper::multisort($items, 'order');

            foreach ($items as $item) {

                echo '<li class="'. (isParentActive($item) ? 'active' : '') .'">'; //第一级菜单
                if (empty($item['items'])) {
                    $name = create_name($item);
                    echo Html::a($name, $item['url']);
                } else {

                    $name = create_name($item, TRUE);
                    echo Html::a($name, 'javascript:void()');
                    echo '<ul class="nav nav-second-level collapse ' . (isActive($item)?'active':'') .  '" >';   //第二级菜单

                    $second_list = $item['items'];
                    ArrayHelper::multisort($second_list, 'order');
                    foreach ($second_list as $row) {

                        echo '<li class="1 ' .  (isActive($row)?'active':'') . '">';
                        if (empty($row['items'])) {
                            $second_name = create_name($row);
                            echo Html::a($second_name, $row['url']);
                        } else {
                            $second_name = create_name($row, TRUE);
                            echo Html::a($second_name, 'javascript:void()');
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }*/
            ?>

        </ul>
    </div>
</nav>




<!--$js = <<<JS-->
<!--//$(function(){-->
<!--//    if (normal_user) {-->
<!--//        $("#side-menu").children().last().empty();-->
<!--//    }-->
<!--//});-->
<!--JS;-->
<!--$this->registerJs($js);-->
<?php
$js = <<<JS
$(function(){
    $("#side-menu .nav-label").css('display','inline-block');   
});
JS;
$this->registerJs($js);
?>
