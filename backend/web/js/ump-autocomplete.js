/**
 * Created by guoshuai on 05/06/17.
 */
(function($){
    //系统用户自动补全方法
    $.fn.autocompl=function(userid,data){//data是查询的数据源
        var $username = $(this),//用户名
            $userid = $("#"+userid);//用户ID
        $username.autocomplete({
            minLength: 0,
            source: function (request, response) {
                var result = [];
                var limit = 10;
                var term = request.term.toLowerCase();
                $.each(data.users, function () {
                    var user = this;
                    if (term == '' || user.username.toLowerCase().indexOf(term) >= 0) {
                        result.push(user);
                        limit--;
                        if (limit <= 0) {
                            return false;
                        }
                    }
                });
                response(result);
            },
            focus: function (event, ui) {
                $username.val(ui.item.username);
                return false;
            },
            select: function (event, ui) {
                $username.val(ui.item.username);
                $userid.val(ui.item.id);
                return false;
            },
        }).autocomplete().data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li>").append("<a>"+ item.username +"</a>").appendTo(ul);
        };

    };
    //借款用户自动补全方法
    $.fn.borrowerautocompl=function(userid){//data是查询的数据源
        var $username = $(this),//用户名
            $userid = $("#"+userid);//用户ID
        $username.autocomplete({
            minLength: 2,
            source: function (request, response) {
                var result = [];
                var limit = 10;
                var term = request.term.toLowerCase();
                $.ajax({
                    url:'into-entry-auto-borrower-data',
                    type:'post', //GET
                    timeout: 30000,
                    async:true,    //或false,是否异步
                    data:{
                        'term':term,
                    },
                    success:function(data){
                        $.each(data, function () {
                            var user = this;
                            if (term == '' || user.phone.toLowerCase().indexOf(term) >= 0) {
                                result.push(user);
                                limit--;
                                if (limit <= 0) {
                                    return false;
                                }
                            }
                        });
                        response(result);
                    },
                    error:function () {

                    }
                });


            },
            focus: function (event, ui) {
                if(ui.item.name){
                    $username.val(ui.item.name);
                }else {
                    $username.val(ui.item.phone);
                }
                return false;
            },
            select: function (event, ui) {
                if(ui.item.name){
                    $username.val(ui.item.name);
                }else {
                    $username.val(ui.item.phone);
                }
                $userid.val(ui.item.id);
                return false;
            },
        }).autocomplete().data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li>").append("<a>"+ item.name + item.phone +"</a>").appendTo(ul);
        };

    };

})(jQuery);