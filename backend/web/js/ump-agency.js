/**
 * Created by guoshuai on 11/05/17.
 */
(function($){
    //机构选择下拉菜单打开
    $.fn.selectopen=function(box){
        var $select = $(this),//点击的select元素
            $box = $("#"+box);//select展开的内容框元素
        $select.on('click',function(e) {
            e.stopPropagation();//防止冒泡
            var flag= $box.css('display');
            if(flag=="none"){
                $box.css('display','block');
                $select.find('i').addClass('glyphicon-chevron-up');
                $select.find('i').removeClass('glyphicon-chevron-down');
            }
            else{
                $box.css('display','none');
                $select.find('i').addClass('glyphicon-chevron-down');
                $select.find('i').removeClass('glyphicon-chevron-up');}
        });
    };
    //机构选择下拉菜单关闭
    $.fn.selectclose=function(select,box){
        var $elem = $(this),
            $select =$("#"+select),
            $box = $("#"+box);
        $elem.on('click',function(e) {
            //防止check-boxs元素触发点击事件
            var e = e || window.event; //浏览器兼容性
            var elem = e.target || e.srcElement;
            while (elem) { //循环判断至跟节点，防止点击的是div子元素
                if (elem.id && elem.id == box) {
                    return;
                }
                elem = elem.parentNode;
            }
            $box.css('display','none');
            $select.find('i').addClass('glyphicon-chevron-down');
            $select.find('i').removeClass('glyphicon-chevron-up');
        });
    };
    //选中机构显示数量
    $.fn.agencycheckedcount=function(display_count){
            var $elem=$(this),//点击的元素
                item_count=0,//总共的机构数量
                item_totalcount=0,//选中的机构数量
                $display_count=$("#"+display_count);//显示选中的机构数量
            //计算机构总数量
            $elem.find('input').each(function(){
                if($(this).val() !=0){
                    item_totalcount++;
                }
            });
            //默认显示选中机构的总数量
            $elem.find('input').each(function(){
                if($(this).prop('checked')==true && $(this).val() !=0){
                    item_count++;
                }
            });
            $display_count.text(item_count);
            //全选设置显示选中机构的数量
            $elem.find('input').first().change(function() {
                if ($(this).prop('checked') == true) {
                    $elem.find('input').each(function(){
                        if($(this).prop('checked')==false && $(this).val() !=0){
                            item_count++;
                            $(this).prop('checked', true);
                        }
                    })
                }else{
                    $elem.find('input').prop('checked', false);
                    item_count=0;
                }
                $display_count.text(item_count);
            });
            //如果单个选框都没有全部选中,把全选选框去掉
            $(window).ready(function() {
                if(item_count != item_totalcount){
                    $elem.find('input').first().prop('checked', false);
                }
            });
            //单个选择设置显示选中机构的总数量
                $elem.find('input').change(function() {
                if ($(this).prop('checked') == false && $(this).val() != 0) {
                    $elem.find('input').first().prop('checked', false);
                    item_count--;
                }
                if ($(this).prop('checked') == true && $(this).val() != 0) {
                    item_count++;
                }
                $display_count.text(item_count);
                //如果单个选框都选中,把全选选框选中
                if(item_count == item_totalcount){
                    $elem.find('input').first().prop('checked', true);
                }


            });
    };


})(jQuery);

