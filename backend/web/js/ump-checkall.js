/**
 * Created by guoshuai on 11/05/17.
 */
(function($){
    //全选方法
    $.fn.checkall=function(inputname){
        var  $checkall = $(this),//点击元素
             $inputname = $("input[name='"+inputname+"[]']"),//单个checkbox的name
             $inputallname = $("input[name='"+inputname+"_all']");//全选框checkbox的name
        $checkall.on('click',function(){
            $inputname.prop('checked', true);
            $inputallname.prop('checked', true);
        });
    };
    //反选方法
    $.fn.reverse=function (inputname) {
        var $reverse = $(this),//点击元素
            $inputname = $("input[name='"+inputname+"[]']"),//单个checkbox的name
            $inputallname = $("input[name='"+inputname+"_all']");//全选框checkbox的name
        $reverse.on('click',function(){
            //反选设置
            $inputname.each(function () {
                this.checked = !this.checked;
            });
            //全选框选中的状态
            if($inputallname.prop('checked') == true){
                $inputname.prop('checked', false);
                $inputallname.prop('checked', false);
            //全选框未选中的状态
            }else{
                var totalcount = 0;//checkbox的数量
                var checkcount = 0;//checkbox选中的数量
                $inputname.each(function() {
                    totalcount++;
                });
                $inputname.each(function() {
                    if($(this).prop('checked') == true){
                        checkcount++;
                    }
                });
                if(totalcount==checkcount){
                    $inputallname.prop('checked', true);
                }
            }
        });
    };

})(jQuery);

