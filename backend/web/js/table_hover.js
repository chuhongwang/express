
/*
表格头部悬停
 */
$(function(){
    var nav=$(".table-hover thead"); //得到导航对象
    var win=$(window); //得到窗口对象
    var sc=$(document);//得到document文档对象。
    win.on('resize load',function() {
        $(".table-hover tr").eq(0).find('th').each(function(index) {
            var thwidth = $(this).width();
            var tdwidth =  $(".table-hover tr").eq(1).find('td').eq(index).width();
            var realwidth = thwidth > tdwidth ? thwidth: tdwidth;
            $(".table-hover tr").eq(0).find('th').eq(index).css('width',realwidth+16+'px');
        });
        var itemTop = nav.offset().top-sc.scrollTop();
        win.scroll(function(){
            //固定不动
            var sctop =sc.scrollTop();
            if(navigator.appName=='Microsoft Internet Explorer'){
                nav.css({'margin-top':"157px"});
            }else{
                if(navigator.appVersion =='5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; rv:11.0) like Gecko'){
                    nav.css({'margin-top':"157px"});
                }else{
                    nav.css({'margin-top':sctop+"px"});
                }
            }
            //到固定位置固定表头
            if(sc.scrollTop()>=itemTop){
                $(".table-hover tr").eq(0).find('th').each(function(index) {
                    var thwidth = $(this).width();
                    $(".table-hover tr").eq(1).find('td').eq(index).css('width',thwidth+17+'px');
                });
                nav.addClass("fix");
            }else{
                nav.removeClass("fix");
            }
        });
    });
});