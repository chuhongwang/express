(function ($) {
    //图片放大且可上一张,下一张(特殊处理)
    $.fn.specialphotos = function(content_box){
        var cont_box = $('#'+content_box);
        var html = $(this).val();
        cont_box.append(html);
        cont_box.find('img').css({'width':'100px','height':'100px'})
        layer.photos({
            photos: '#'+content_box,
            anim: 0 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
        });
    };

    //图片放大且可上一张,下一张
    $.fn.photos = function(){

        $(this).find('img').css({'width':'100px','height':'100px'});
        layer.photos({
            photos: this,
            anim: 0 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
        });
    };

    //清除原带模态框modal-dialog
    function fadedialog(){
        $('.modal-backdrop').hide();
        $('.bootbox-alert').modal('hide');
        setTimeout(fadedialog,1000);
    }
    fadedialog();
})(jQuery);
