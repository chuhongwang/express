<?php
/**
 * Created by PhpStorm.
 * User: carson
 * Date: 16/3/7
 * Time: 上午11:04
 */

namespace common\components;

use yii\base\Component;
use Yii;

/**
 * @package common\components
 * @version 1.0
 */
class GridHelper extends Component
{

    /**
     * 设置默认排序
     * @version 1.0
     * @param string $sort
     */
    public function setDefaultOrder($sort = '-id')
    {
        if (!isset($_GET['sort'])) {
            $_GET['sort'] = $sort;
        }
    }

    /**
     * @param int $pageSize 默认页面大小
     * @return string
     */
    public static function setSummary($pageSize = 20)
    {
        return \nterms\pagesize\PageSize::widget(['defaultPageSize' => $pageSize, 'label' => false]) . Yii::$app->params['grid.summary'];
    }
}
