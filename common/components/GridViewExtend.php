<?php
/**
 * Created by PhpStorm.
 * User: hongtao
 * Date: 2017/7/21
 * Time: 上午10:19
 */

namespace common\components;


use Closure;
use yii\grid\GridView;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


class GridViewExtend extends GridView
{
    /**
     * 处理summary
     */
    function run()
    {
        $this->summary = isset($this->summary) ? $this->summary : GridHelper::setSummary(20);
        parent::run();
    }

    public $layout = "{items}<div class='text-right'>{pager}{summary}</div>";
    public $tableOptions = ['class' => 'table table-striped table-hover'];
    public $pager = [
        'firstPageLabel' => '首页',
        'lastPageLabel' => '末页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'maxButtonCount' => 8,
    ];
    public $filterSelector = 'select[name="per-page"]';
    public $options = ['class' => 'grid-view', 'style' => 'overflow:auto', 'id' => 'grid'];

    /**
     * 是否显示总计 默认不显示
     * @var bool
     */
    public $showTotal = false;
    /**
     * 显示总计的索引 从0起
     * @var array
     */
    public $totalIndex = [];

    /**
     * Renders the table body.
     * @return string the rendering result.
     */
    public function renderTableBody()
    {
        $models = array_values($this->dataProvider->getModels());
        $keys = $this->dataProvider->getKeys();
        $rows = [];
        foreach ($models as $index => $model) {
            $key = $keys[$index];
            if ($this->beforeRow !== null) {
                $row = call_user_func($this->beforeRow, $model, $key, $index, $this);
                if (!empty($row)) {
                    $rows[] = $row;
                }
            }
            $rows[] = $this->renderTableRow($model, $key, $index);

            if ($this->afterRow !== null) {
                $row = call_user_func($this->afterRow, $model, $key, $index, $this);
                if (!empty($row)) {
                    $rows[] = $row;
                }
            }
        }
        if (!empty($rows)&&$this->showTotal) {
            $rows[] = $this->getTotal($rows, $models[0], $keys[0], 0);
        }

        if (empty($rows) && $this->emptyText !== false) {
            $colspan = count($this->columns);

            return "<tbody>\n<tr><td colspan=\"$colspan\">" . $this->renderEmpty() . "</td></tr>\n</tbody>";
        } else {
            return "<tbody>\n" . implode("\n", $rows) . "\n</tbody>";
        }
    }

    public function getTotal($rows, $model, $key, $index)
    {
        $reg = '/>([\s|\S]*?)<\/td>/';

        foreach ($rows as $row) {
            preg_match_all($reg, $row, $arr);
            $data = null;
            foreach ($arr[1] as $kv) {

                $data[] = strip_tags($kv);

            }
            $datas[] = $data;
        }
        $row = null;
        for ($i = 0; $i < sizeof($datas[0]); $i++) {
            $row[$i] = '---';
        }
        $row[0] = '总计';

        foreach ($this->totalIndex as $i) {
            $temp = 0;
            foreach (ArrayHelper::getColumn($datas, $i) as $value) {
                $val = ((float)str_ireplace(',', '', $value));
                $temp += $val;
            }
            $row[$i] = number_format($temp, 2);

        }

        foreach ($this->columns as $k=> $column) {
            if ($column->contentOptions instanceof Closure) {
                $options = call_user_func($column->contentOptions, $model, $key, $index, $this);
            } else {
                $options = $column->contentOptions;
            }
            $rowdata[]=Html::tag('td', $row[$k], $options);
        }
        return implode($rowdata,'');
    }

}