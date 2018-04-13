<?php

namespace common\components;

use kartik\datetime\DateTimePicker;
use Yii;
use yii\grid\GridView;
use yii\base\Component;
use kartik\date\DatePicker;

/**
* 
*/
class DateSelectHelper extends Component
{
	
	 public static function CheckDateBox($startDate,$endDate,$name,$name2,$text,$text2,$delete_show=false){

         if($delete_show){
             $layout = <<< HTML
       
                            {input1}
                            {separator}
                            {input2}                  
                            <span class="input-group-addon kv-date-remove">
                                <i class="glyphicon glyphicon-remove"></i>
                            </span>                     
HTML;
         }else{
             $layout = <<< HTML
       
                            {input1}
                            {separator}
                            {input2}                                                  
HTML;
         }
                    echo DatePicker::widget([
                        'name' => $name,
                        'value' => $startDate,
                        'type' => DatePicker::TYPE_RANGE,
                        'name2' => $name2,
                        'value2' => $endDate,
                        'options' => ['placeholder' => $text],
                        'options2' => ['placeholder' => $text2],
                        'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
                        'layout' => $layout,
                        'readonly'=>true,
                        'pluginOptions' =>
                            [

                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                            ]
                    ]);

    }

    /**
     * 限定查询时间范围的空间
     * @param $startDate
     * @param $endDate
     * @param $name
     * @param $name2
     * @param $text
     * @param $text2
     * @param string $start 查询时间范围开始
     * @param $end 查询时间范围结束
     */
    public static function CheckDateBoxWithStartAndEnd($startDate,$endDate,$name,$name2,$text,$text2,$start='1970-01-01',$end,$delete_show=false){

        if($delete_show){
            $layout = <<< HTML
       
                            {input1}
                            {separator}
                            {input2}                  
                            <span class="input-group-addon kv-date-remove">
                                <i class="glyphicon glyphicon-remove"></i>
                            </span>                     
HTML;
        }else{
            $layout = <<< HTML
       
                            {input1}
                            {separator}
                            {input2}                                                  
HTML;
        }


        echo DatePicker::widget([
            'name' => $name,
            'value' => $startDate,
            'type' => DatePicker::TYPE_RANGE,
            'name2' => $name2,
            'value2' => $endDate,
            'options' => ['placeholder' => $text],
            'options2' => ['placeholder' => $text2],
            'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
            'layout' => $layout,
            'readonly'=>true,
            'pluginOptions' =>
                [
                    'autoclose' => true,
                    'format' => 'yyyy/mm/dd',
                    'todayHighlight' => true,
                    'endDate'=>isset($end)?$end:$endDate,
                    'startDate'=>$start

                ]
        ]);

    }

    public static function CheckDateTimeBox($startDate,$name,$text,$start='1970-01-01'){
        $layout = <<< HTML
       
                            {picker}
                            {input} 
                            {remove}
HTML;
        echo DateTimePicker::widget([
            'name' => $name,
            'value' => $startDate,
            'layout' => $layout,
            'options' => ['placeholder' => $text,'style'=>'font-size:0.8em'],
            'readonly' => true,
            'pluginOptions' => [
                'autoclose' => true,
                'format'=>'yyyy-mm-dd hh:ii',
                'startDate' =>$start,
                'htmlOptions' => array('readonly' => "readonly"),
            ]
        ]);
    }


    public static function CheckDatesBox($startDate,$name,$text,$start='1970-01-01',$end){
        $layout = <<< HTML
       
                            {picker}
                            {input} 
                            {remove}
HTML;
        echo DatePicker::widget([
            'name' => $name,
            'value' => $startDate,
            'layout' => $layout,
            'options' => ['placeholder' => $text,'style'=>'font-size:0.8em'],
            'readonly' => true,
            'pluginOptions' => [
                'autoclose' => true,
                'format'=>'yyyy-mm-dd',
                'startDate' =>$start,
                'endDate'=>$end,
            ]
        ]);
    }

    public static function CheckDatesBoxs($startDate,$name,$text,$start='1970-01-01'){
        $layout = <<< HTML
       
                            {picker}
                            {input} 
                            {remove}
HTML;
        echo DatePicker::widget([
            'name' => $name,
            'value' => $startDate,
            'layout' => $layout,
            'options' => ['placeholder' => $text,'style'=>'font-size:0.8em'],
            'readonly' => true,
            'pluginOptions' => [
                'autoclose' => true,
                'format'=>'yyyy-mm-dd',
                'startDate' =>$start,
            ]
        ]);
    }




}