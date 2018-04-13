(function(UMP){

    $(function(){
        if ($('#bootbox-vertical').size() > 0) {
            return;
        };
        $('head').append('<style type="text/css" id="bootbox-vertical">' +
            [
                '.modal {text-align: center;}',
                '.modal:before {display: inline-block;vertical-align: middle;content: " ";height: 100%;}',
                '.modal-dialog {display: inline-block;text-align: left;vertical-align: middle;}'
            ].join('')
            +'</style>');
    });
    bootbox && (
        bootbox.addLocale('zh_CN', {
            "OK"		: '关闭',
            "CANCEL"	: '取消',
            "CONFIRM"	: '确认'
        }),
            bootbox.setDefaults("locale", 'zh_CN')
    );

    UMP.alert = function(msg, callback, opts) {
        if (!msg || $('div.bootbox-alert').size()>0) {
            return false;
        };
        opts = opts || {};
        !callback && (callback = function(){});

        return bootbox.alert(msg, callback);
    };

    UMP.prompt  = function(msg, callback, opts) {
        if (!msg || $('div.bootbox-prompt').size()>0) {
            return false;
        };
        opts = opts || {};
        !callback && (callback = function(){});

        return bootbox.prompt(msg, callback);
    };

    UMP.confirm = function(msg, callback, opts) {
        var defaults;

        if (!msg || $('div.bootbox-confirm').size()>0) {
            return false;
        };
        opts = opts || {};
        !callback && (callback = function(){});

        defaults = {
            title: opts.title || '',
            message: msg,
            callback:callback
        };
        $.extend(defaults, opts);

        console.log(defaults);

        return bootbox.confirm(defaults);
    };

    UMP.dialog = function(msg, callback, opts) {
        var defaults;

        if (!msg) {
            return false;
        };

        opts = opts || {};
        !callback && (callback = function(){});

        defaults = {
            title: opts.title || '',
            message: msg,
            buttons: {
                success: {
                    label: opts.label||'OK',
                    callback: callback
                }
            }
        };
        $.extend(defaults, opts);

        return bootbox.dialog(defaults);
    };

    UMP.closeDialog = function(isBubble) {
        bootbox && bootbox.hideAll();

        if (isBubble) {
            var _parent = parent,
                bubbleClose;

            bubbleClose = function() {
                try {
                    _parent.bootbox.hideAll();
                } catch(err){}

                while (top !== _parent) {
                    _parent = _parent.parent;
                    bubbleClose();
                }
            };
        };
    };
    UMP.bildOpenEvent = function(pattern, title) {
        var sFeatures = "height=600, width=810, scrollbars=yes, resizable=yes,location=no";
        $(pattern).click( function() {
            window.open( $(this).attr('href'), title, sFeatures );
            return false;
        });
    };
    UMP.buildDatepickerOptions = function(defaultDate) {
        var ops = {
            numberOfMonths:1,//显示几个月
            showButtonPanel:true,//是否显示按钮面板
            dateFormat: 'yy-mm-dd',//日期格式
            clearText:"清除",//清除日期的按钮名称
            closeText:"关闭",//关闭选择框的按钮名称
            yearSuffix: '年', //年的后缀
            showMonthAfterYear:true,//是否把月放在年的后面
            defaultDate:defaultDate,//默认日期
            minDate:'2013-03-05',//最小日期
            maxDate:'2030-03-20',//最大日期
            monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
            dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
            dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
            dayNamesMin: ['日','一','二','三','四','五','六'],
        };

        return ops;
    };

    UMP.dialogAjax = function(successMsg, result) {
        var form = $(".modal-dialog").find("form");
        if (result) {
            $.ajax({
                url: form.attr("action"),
                type: "POST",
                dataType: "json",
                data: form.serialize(),
                success: function(Data) {
                    console.log(Data);
                    if(Data.code == 0) {
                        alert(successMsg);
                        location.replace(location.href);
                    } else {
                        alert(Data.message);
                    }
                },
                error: function() {
                    alert('网络错误！');
                }
            });
        } else {
            console.log(33);
        }
    };

    yii.confirm = function (message, okCallback, cancelCallback) {
        UMP.confirm(message, function(result){
            if (result) {
                okCallback.call(null);
            } else {
                cancelCallback && cancelCallback.call(null);
            }
        });
    };
})(window.UMP = window.UMP || {});


/* 初始化 */
(function(UMP){
    function initComponent() {
        if (typeof Dropzone === 'undefined') {
            return;
        }

        $('.dropzone').each(function(i, item){
            var el = $(item),
                id;

            id = el.attr('id');
            Dropzone.options[id] = {
                autoProcessQueue: true,  // 自动上传
                uploadMultiple: false,   // 单张上传
                parallelUploads: 1,
                maxFiles: el.attr('data-max')||1,
                maxFilesize: 5, // 单位MB
                addRemoveLinks: true,

                acceptedFiles: ".jpg,.png",

                // Dropzone settings
                init: function() {
                    this.on("success", function(file, url){
                        var wrap = $(this.element),
                            fieldName = wrap.attr('name');

                        wrap.append('<input type="hidden" name="'+ fieldName +'" value="'+ url +'">');
                    });
                }
            }
        });
    }

    function initImgPreview() {
        $('#page-wrapper img').click(function(){
            UMP.alert('<div class="text-center" style="width:100%"><a href="'+ this.src +'" target="_blank"><img src="'+ this.src +'" style="max-height:400px;max-width:100%"></a></div>');
        });
    }

    UMP.init = function() {
        initComponent();
        initImgPreview();
        $(".grid-view th a").addClass('grid_view_default')
    };
})(UMP);
$(function(){
    UMP.init();
});