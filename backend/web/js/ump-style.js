/**
 * Created by nicc on 2017/6/24.
 */
(function($) {
    $.fn.style=function() {
        //html样式微调
        $('table tr th').css('text-align','center');
        $('.input-group.input-daterange .input-group-addon').css('border-left','none');
        if($('#w1 .empty').html()){
            $('#w1').remove();
            $('.col-lg-12 table').append('<div class="empty">没有找到数据</div>');
        }
    }
})(jQuery);
