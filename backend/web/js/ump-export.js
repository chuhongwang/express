/**
 * Created by guoshuai on 11/05/17.
 */
(function ($) {
    //导出方法
    $.fn.export = function (inputname, _export, form_id) {
        var $export = $(this),
            $input = $("input[name='" + inputname + "[]']"),
            $exportflag = $("#" + _export + "-_export"),
            $form_id = $("#" + form_id);
        $export.on('click', function () {
            //注意这里的$("#grid")，要跟我们第一步设定的options id一致
            var keys = $("#grid").yiiGridView("getSelectedRows");
            if ($input.length == 0) {
                layer.alert('没有数据导出!');
                return false;
            }
            if (keys == '') {
                layer.alert("请先进行勾选！");
                return false;
            }
            $('#keys').val(keys);
            $exportflag.val(1);
            if ($exportflag.val() == 1) {
                $form_id.submit();
            }else {
                layer.alert('导出失败，请重试');
            }
            // $input.each(function () {
            //     if ($(this).prop('checked') == true) {
            //
            //     }
            // });
        });
    };

    $.fn.exports = function (inputname, _export, form_id) {
        var $export = $(this),
            $input = $("input[name='" + inputname + "[]']"),
            $exportflag = $("#" + _export + "-_export"),
            $form_id = $("#" + form_id);
        $export.on('click', function () {
            //注意这里的$("#grid")，要跟我们第一步设定的options id一致
            var keys = $("#grid").yiiGridView("getSelectedRows");
            if ($input.length == 0) {
                layer.alert('没有数据提现!');
                return false;
            }
            if (keys == '') {
                layer.alert("请先进行勾选！");
                return false;
            }
            $('#keys').val(keys);
            $exportflag.val(1);
            if ($exportflag.val() == 1) {
                $form_id.find('.dl_id').val(keys);
                $form_id.submit();
            }else {
                layer.alert('批量提现失败，请重试');
            }
            // $input.each(function () {
            //     if ($(this).prop('checked') == true) {
            //
            //     }
            // });
        });
    };
    //默认导出无需条件即导出查询条件所有
    $.fn.exportdefault = function (_export, form_id) {
        var $export = $(this),
            $exportflag = $("#" + _export + "-_export");
            $form_id = $("#" + form_id);

            $export.on('click', function () {
                $exportflag.val(1);
                if ($exportflag.val() == 1) {
                    $form_id.submit();
                }else {
                    layer.alert('导出失败，请重试');
                }

        });
    };
    //导出失效方法
    $.fn.exportlose = function (_export) {
        var $export = $(this),
            $exportflag = $("#" + _export + "-_export");
        $export.on('mouseover', function () {
            $exportflag.val(0);
        });
    };
})(jQuery);

