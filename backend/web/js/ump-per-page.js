/**
 * Created by nicc on 2017/6/24.
 */
(function($) {
    $.fn.pre_page=function(url) {
        $(".footer").hide();
        $("select[name='per-page']").on('change',function() {
            window.location.href = url+'per-page='+$(this).val();
        })
    }
})(jQuery);
