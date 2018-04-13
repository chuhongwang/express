<?php
return [
    'pagination' => [
       'pageSize' =>  10
    ],
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'grid.layout' => '{items}<div class="text-right">{pager}{summary}</div>',

    'list.layout' => '{items}</tbody></table><div class="text-right">{pager}{summary}</div>',
    'grid.summary' => ' 第{begin} 到 {end} 项 , 总共 {totalCount} 条记录, {pageCount} 页',

    'grid.tableOptions' => ['class' => 'table table-striped table-hover'],
    'grid.filterSelector' => 'select[name="per-page"]',
    'grid.pager' => [
        'firstPageLabel' => '首页',
        'lastPageLabel' => '末页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'maxButtonCount' => 8,
    ],
    'form.fieldConfig' => [
        'template' => "<div class='col-xs-3 col-sm-3 text-right'>{label}</div><div class='col-xs-9 col-sm-7'>{input}</div><div class='col-xs-12 col-xs-offset-3 col-sm-3 col-sm-offset-0'>{error}</div>",
    ],
   
];

