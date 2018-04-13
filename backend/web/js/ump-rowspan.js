(function ($) {
    //相同日期跨行
    $.fn.rowspan = function(firstTd,netxId){
        //绑定元素为表格的第一个td  也就是日期
        var all = firstTd;
        var a=[0];//定义一个第一个索引为0 的数组
        all.each(function(i){
            if(all.eq(i).text() != all.eq(i+1).text()){
                // var content = '<tr class="before"><th class="text-center" "="">日期</th><th class="text-center" "="">合作商名称</th><th class="text-center" "="">应收总计（元）</th><th class="text-center" "="">应收本金（元）</th><th class="text-center" "="">应收利息（元）（元）</th><th class="text-center" "="">应收服务费（元）</th><th class="text-center" "="">操作</th></tr>';
                // all.eq(i+1).parents('tr').before(content);
                // $('.before').css('background','#f4f4f4');
                a.push(i+1);//用于跨行
            }else{
                all.eq(i+1).remove(); //如果下一个等于  删掉
                if(netxId){
                    netxId.eq(i+1).remove(); //如果下一个等于  删掉
                }
            }
        })
            //合并
            $.each(a,function(i,v){
                all.eq(v).attr('rowspan',a[i+1]-a[i]); //在第v个向下跨a[i+1]-a[i]行
                if(netxId){
                    netxId.eq(v).attr('rowspan',a[i+1]-a[i]); //在第v个向下跨a[i+1]-a[i]行
                }
                all.eq(v).css('vertical-align','middle');
                if(netxId){
                    netxId.eq(v).css('vertical-align','middle');
                }
                all.eq(v).css('text-align','center');
                if(netxId){
                    netxId.eq(v).css('text-align','center');
                }
            })


    };
})(jQuery);
