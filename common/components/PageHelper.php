<?php

namespace common\components;

use Yii;
use yii\grid\GridView;
use yii\base\Component;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use kartik\date\DatePicker;
use yii\helpers\html;

/**
 *
 */
class PageHelper extends Component
{

    const PAGE_SIZE_5=5;
    const PAGE_SIZE_10=10;
    const PAGE_SIZE_20=20;
    const PAGE_SIZE_50=50;
    const PAGE_SIZE_100=100;


    public static function pages()
    {
        $url = Yii::$app->request->url;
        $strs = preg_replace("/[?]per-page=\d{1,3}/", '?', $url);
        $str = preg_replace("/&per-page=\d{1,3}/", '', $strs);
        if (preg_match('/[?]/', $str)) {
            if (substr($str, -1) !='?') {
                $str = $str . '&';
            }
        } else {
            $str = $str . '?';
        }

        return $str;

    }


    public static function Page($searchModel, $dataProvider, $view, $model, $page_size, $param = [])
    {
        echo '<div class="btn-group" style="position:relative;bottom:8px;">';
        if ($searchModel->page_size == 10) {

            echo Html::a('10',
                [$view, $model => $searchModel, $model . $page_size => 10] + $param,
                ['class' => 'btn btn-default btn-sm', 'style' => 'background-color:#f4f4f4']);
        } else {
            echo Html::a('10',
                [$view, $model => $searchModel, $model . $page_size => 10] + $param,

                ['class' => 'btn btn-default btn-sm']);
        }
        if ($searchModel->page_size == 20) {
            echo Html::a('20',
                [$view, $model => $searchModel, $model . $page_size => 20] + $param,
                ['class' => 'btn btn-default btn-sm', 'style' => 'background-color:#f4f4f4']);
        } else {
            echo Html::a('20',
                [$view, $model => $searchModel, $model . $page_size => 20] + $param,
                ['class' => 'btn btn-default btn-sm']);
        }
        if ($searchModel->page_size == 50) {
            echo Html::a('50',
                [$view, $model => $searchModel, $model . $page_size => 50] + $param,
                ['class' => 'btn btn-default btn-sm', 'style' => 'background-color:#f4f4f4']);
        } else {
            echo Html::a('50',
                [$view, $model => $searchModel, $model . $page_size => 50] + $param,
                ['class' => 'btn btn-default btn-sm']);
        }

        if ($searchModel->page_size == 100) {
            echo Html::a('100',
                [$view, $model => $searchModel, $model . $page_size => 100] + $param,
                ['class' => 'btn btn-default btn-sm', 'style' => 'background-color:#f4f4f4']);
        } else {
            echo Html::a('100',
                [$view, $model => $searchModel, $model . $page_size => 100] + $param,
                ['class' => 'btn btn-default btn-sm']);
        }

        echo '</div>';
        echo LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'firstPageLabel' => "首页",
            'lastPageLabel' => "末页",
            'hideOnSinglePage' => false
        ]);
    }


    /**
     * @param $params
     * @param int $defaultPageSize 20
     * @return int
     */
    public static function getPageSize($params, $defaultPageSize = 20)
    {
        $pagination = [
            'pageSize' => empty($params['per-page']) ? $defaultPageSize : $params['per-page']
        ];
        return $pagination;
    }

}

?>