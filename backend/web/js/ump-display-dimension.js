$(function(){

    $("#radioflag").on('change',function() {
        $("#form_id").attr('action','display-dimension');
        $("#couponscostsearch-_export").val(0);
        $("#form_id").submit();

    })
})