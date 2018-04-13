
/*
表格头部悬停
 */
$(function(){
    var nav=$(".styletab thead"); //得到导航对象
    var win=$(window); //得到窗口对象
    var sc=$(document);//得到document文档对象。
    win.on('resize load',function() {
        $(".styletab tr").eq(1).find('td').each(function(index) {
            var thwidth = $(".styletab tr").eq(0).find('th').eq(index).width();
            var tdwidth =  $(this).width();
            var realwidth = thwidth > tdwidth ? thwidth: tdwidth;
            $(".styletab tr").eq(0).find('th').eq(index).css('width',realwidth+17+'px');
        });
        itemTop = nav.offset().top-sc.scrollTop();
        win.scroll(function(){
            //固定不动
            var sctop = sc.scrollTop();
            nav.css('margin-top',sctop);
            //到固定位置固定表头
            if(sc.scrollTop()>=itemTop){
                $(".styletab tr").eq(0).find('th').each(function(index) {
                    var thwidth = $(this).width();
                    $(".styletab tr").eq(1).find('td').eq(index).css('width',thwidth+'px');
                });
                nav.addClass("fix");
            }else{
                nav.removeClass("fix");
            }
        });
    });
});