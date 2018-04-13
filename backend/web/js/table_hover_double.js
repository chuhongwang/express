
/*
表格头部悬停
 */
$(function(){
    var nav=$(".table-hover thead"); //得到导航对象
    var win=$(window); //得到窗口对象
    var sc=$(document);//得到document文档对象。
    win.on('resize load',function() {
        $(".table-hover tr").eq(1).find('th').each(function(index) {
            var thwidth = $(this).width();
            var tdwidth = $(".table-hover tr").eq(2).find('td').eq(index).width();
            var realwidth = thwidth > tdwidth ? thwidth: tdwidth;
            $(".table-hover tr").eq(1).find('th').eq(index).css('width',realwidth+16+'px');
        });
        itemTop = nav.offset().top-sc.scrollTop();
        win.scroll(function(){
            //固定不动
            var sctop = sc.scrollTop();
            nav.css('margin-top',sctop);
            //到固定位置固定表头
            if(sc.scrollTop()>=itemTop){
                $(".table-hover tr").eq(1).find('th').each(function(index) {
                    var thwidth = $(this).width();
                    $(".table-hover tr").eq(2).find('td').eq(index).css('width',thwidth+17+'px');
                });
                nav.addClass("fix");
            }else{
                nav.removeClass("fix");
            }
        });
    });
});