/**
 * Created by guoshuai on 11/05/17.
 */
(function($){
    //单选框选择总计本页的放款金额,服务费,利息总计.
    $.fn.itemcheckboxtotal=function(){
        $("input[name='id[]']").each(function(){
            $(this).on('click',function(){
                var keys = $("#grid").yiiGridView("getSelectedRows");
                var flag = 0;
                //加载层
                layer.load(0,{shade: [0.1, '#000']});
                $.ajax({
                    url:'loan-project-detail-debt-amount',
                    type:'post', //GET
                    timeout: 30000,
                    async:true,    //或false,是否异步
                    data:{
                        'keys':keys,
                        'flag':flag,
                    },
                    success:function(data){
                        //取消加载层
                        layer.closeAll('loading');
                        $("#debt_amount").text(data[0].debt_amount);
                        $("#service_interest").text(data[0].service_interest);
                        $("#repayment_interest").text(data[1].repayment_interest);
                    },
                    error:function () {
                        //取消加载层
                        layer.closeAll('loading');
                    }
                });
            });
        });
    };
    //全选框选择总计本页的放款金额,服务费,利息总计.
    $.fn.allcheckboxtotal=function(){
        $("input[name='id_all']").on('change',function(){
            if($('input[name="id_all"]').prop('checked') == true){
                //var keys = $("#grid").yiiGridView("getSelectedRows");
                var flag = 0;
                var keys = $("#grid").yiiGridView("getSelectedRows");
                //加载层
                layer.load(0,{shade: [0.1, '#000']});
                $.ajax({
                    url:'loan-project-detail-debt-amount',
                    type:'post', //GET
                    timeout : 30000,
                    async:true,    //或false,是否异步
                    data:{
                        'keys':keys,
                        'flag':flag,
                    },
                    success:function(data){
                        //取消加载层
                        layer.closeAll('loading');
                        $("#debt_amount").text(data[0].debt_amount);
                        $("#service_interest").text(data[0].service_interest);
                        $("#repayment_interest").text(data[1].repayment_interest);
                    },
                    error:function () {
                        //取消加载层
                        layer.closeAll('loading');
                    }
                });

            }else{
                $("#debt_amount").text('0.00');
                $("#service_interest").text('0.00');
                $("#repayment_interest").text('0.00');

            }

        });
    };
    //全选总计该条件下的放款金额,服务费,利息总计.
    $.fn.selecttotal=function(){
        $(".select").on('click',function(){

            $('input[name="id[]"]').prop('checked', true);
            $('input[name="id_all"]').prop('checked', true);
            var flag = 1;
            var searchtext = $('input[name="DebtLoanProjectDetailSearch[searchtext]"]').val();
            var start_date = $('input[name="DebtLoanProjectDetailSearch[start_date]"]').val();
            var end_date = $('input[name="DebtLoanProjectDetailSearch[end_date]"]').val();
            var status = $('select[name="DebtLoanProjectDetailSearch[status]"]').val();
            var payback_method = $('input[name="DebtLoanProjectDetailSearch[payback_method]"]').val();
            var loan_days = $('input[name="DebtLoanProjectDetailSearch[loan_days]"]').val();
            //加载层数据加载
            layer.load(0,{shade: [0.1, '#000']});
            $.ajax({
                url:'loan-project-detail-debt-amount',
                type:'post', //GET
                timeout : 30000,
                async:true,    //或false,是否异步
                data:{
                    //   'keys':keys,
                    'flag':flag,
                    'searchtext':searchtext,
                    'start_date':start_date,
                    'end_date':end_date,
                    'status':status,
                    'payback_method':payback_method,
                    'loan_days':loan_days,
                },
                success:function(data){
                    //取消加载层
                    layer.closeAll('loading');
                    $("#debt_amount").text(data[0].debt_amount);
                    $("#service_interest").text(data[0].service_interest);
                    $("#repayment_interest").text(data[0].repayment_interest);
                },
                error:function () {
                    //取消加载层
                    layer.closeAll('loading');
                    layer.msg('请求超时！');
                    $('input[name="id[]"]').prop('checked', false);
                    $('input[name="id_all"]').prop('checked', false);
                    $("#debt_amount").text('0.00');
                    $("#service_interest").text('0.00');
                    $("#repayment_interest").text('0.00');
                }
            });


        });
    };
    //反选总计本页的放款金额,服务费,利息总计.
    $.fn.reversetotal=function(){
        $(".Reverse").on('click',function(){
            $('input[name="id[]"]').each(function(){
                this.checked = !this.checked;
            });
            if($('input[name="id_all"]').prop('checked') == true){
                //var keys = $("#grid").yiiGridView("getSelectedRows");
                $('input[name="id[]"]').prop('checked', false);
                $('input[name="id_all"]').prop('checked', false);
                $("#debt_amount").text('0.00');
                $("#service_interest").text('0.00');
                $("#repayment_interest").text('0.00');
            }
            else{
                var totalcount = 0;
                var checkcount = 0;
                $('input[name="id[]"]').each(function() {
                    totalcount++;
                });
                $('input[name="id[]"]').each(function() {
                    if($(this).prop('checked') == true){
                        checkcount++;
                    }
                });
                if(totalcount==checkcount){
                    $('input[name="id_all"]').prop('checked', true);
                }
                var keys = $("#grid").yiiGridView("getSelectedRows");
                var flag = 0;
                //加载层
                layer.load(0,{shade: [0.1, '#000']});
                $.ajax({
                    url:'loan-project-detail-debt-amount',
                    type:'post', //GET
                    timeout : 30000,
                    async:true,    //或false,是否异步
                    data:{
                        'keys':keys,
                        'flag':flag,
                    },
                    success:function(data){
                        //取消加载层
                        layer.closeAll('loading');
                        $("#debt_amount").text(data[0].debt_amount);
                        $("#service_interest").text(data[0].service_interest);
                        $("#repayment_interest").text(data[1].repayment_interest);
                    },
                    error:function () {
                        //取消加载层
                        layer.closeAll('loading');
                    }
                });

            }
        });
    };


})(jQuery);

