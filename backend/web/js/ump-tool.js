/**
 * 将数值舍1后格式化.
 *
 * @param num 数值(Number或者String)
 * @param cent 要保留的小数位(Number)
 * @param isThousand 是否需要千分位 0:不需要,1:需要(数值类型);
 * @return 格式的字符串,如'1,234,567.45'
 * @type String
 */
function formatNumber(num, cent, isThousand) {
    num = num.toString().replace(/\$|\,/g, '');

    // 检查传入数值为数值类型
    if (isNaN(num))
        num = "0";

    // 获取符号(正/负数)
    sign = (num == (num = Math.abs(num)));

    num = Math.floor(num * Math.pow(10, cent)); // 把指定的小数位先转换成整数.多余的小数位四舍五入
    cents = num % Math.pow(10, cent);       // 求出小数位数值
    num = Math.floor(num / Math.pow(10, cent)).toString();  // 求出整数位数值
    cents = cents.toString();        // 把小数位转换成字符串,以便求小数位长度

    // 补足小数位到指定的位数
    while (cents.length < cent)
        cents = "0" + cents;

    if (isThousand) {
        // 对整数部分进行千分位格式化.
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
            num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
    }

    if (cent > 0)
        return (((sign) ? '' : '-') + num + '.' + cents);
    else
        return (((sign) ? '' : '-') + num);
}
/**
 * 日期转化为月/日
 * @param uData 日期
 * @returns {string} 如 6/7
 */
function userDate(uData) {
    var myDate = new Date(uData);

    var month = myDate.getMonth() + 1;
    var day = myDate.getDate();
    var hour=myDate.getHours();
    var minute=myDate.getMinutes();
    return month + '/  ' + day+' '+hour+':'+minute;
}
(function ($) {
    /**
     *
     * @param div_id 调用的div的id
     * @param unit 单位
     * @param series_name 图例名称或者数据名称
     * @param yAxis_name y轴名称
     * @param couponsCost 详细数据源
     */
    $.fn.setchart=function (div_id,unit,series_name,yAxis_name,couponsCost) {
        var myChart = echarts.init(document.getElementById(div_id));
        var option = {
            tooltip: {
                trigger: 'axis',
                formatter: function (params) {
                    var res = '';
                    res += userDate(params[0].axisValue) + "<br/>"
                    for (var i = 0; i < params.length; i++) {
                        res += '<p><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:' + params[i].color + '"></span>' + params[i].seriesName + '('+unit+'):' + formatNumber(params[i].data[1], 2, 1) + '</p>'
                    }
                    return res;
                },
            },
            legend: {
                data: [series_name],
                x: 'center',
                bottom: '-2%',
            },

            xAxis: [
                {
                    type: 'time',
                    interval: 24 * 3600 * 1000,
                    inverse: false,
                    axisLabel: {
                        rotate:45,//倾斜度 -90 至 90 默认为0
                        formatter: function (value) {
                            // 格式化成月/日
                            var date = new Date(value);
                            var texts = [(date.getMonth() + 1), date.getDate()];
                            return texts.join('/');
                        }
                    }

                }
            ],
            yAxis: [
                {
                    type: 'value',
                    name: yAxis_name,
                    axisLabel: {
                        formatter: '{value} '
                    },

                }

            ],
            grid: {
                left: '5%',
                right: '5%',
                top: '14%',
                bottom:'23%',
                containLabel: false
            },
            series: [
                {
                    name: series_name,
                    type: 'line',
                    data: couponsCost,
                    barWidth: 10,
                    itemStyle: {
                        normal: {color: 'rgb(18,186,99)'}
                    }
                }

            ]
        };
        //图表随浏览器宽度自适应
        window.onresize = function () {
            myChart.resize(); //使第一个图表适应
            myChart_pieMain.resize(); // 使第二个图表适应
        }
        myChart.setOption(option);


    }
})(jQuery);