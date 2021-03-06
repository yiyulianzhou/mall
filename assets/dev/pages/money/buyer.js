
/* ------------------------------------------------------------------------------
 *
 * money 财务买家提现JS
 *
 * ---------------------------------------------------------------------------- */
var Satus = {1: "待审核",3: "审核未通过",12: "待打款",13: "提现完成"};
app.filter("StatusDesc", function () {
    return function (e) {
        return Satus[e];
    }
})
app.controller('appCtrl', ['$scope', '$http','appService', 'appFactory','common', function($scope, $http,appService, appFactory,common) {

    //所有列表
    $scope.alllist = [];

    // 反馈列表数据变量初始化
    $scope.list = [];

    // 提现列表
    $scope.applylist = [];

    //头部买家统计数据
    $scope.lists = [];

    //统计头部卖家提现相关数据
    var countBuyerCash = function ()
    {
        var url =  common.count_buyer_cash;
        $http({
            url: url,
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            // 待处理的反馈列表数据
            $scope.lists = response.count;

        });
    }
    countBuyerCash();

    //卖家提现列表数据
    var getList = function (page){
        var formData = {};

        formData.status = $scope.status;

        // loading 开
        appFactory.loadingToggle(1);
        var url = page > 1 ? common.get_buyer + page : common.get_buyer;
        $http({
            url:url,
            method:'POST',
            data:$.param(formData),
            headers:{  'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response){
            $scope.alllist = response.list;

            // 翻页数据
            appFactory.pagerInit(response);

            // loading 关
            appFactory.loadingToggle(0);
        });

    }
    getList(1);
    $scope.filterList = function (event) {
        if($scope.status != event)
        {
            searchDataInit();
            $scope.status = '';

            if(event == 'all')
            {
                $scope.all = true;
                $scope.verify = false;
                $scope.pay = false;
                $scope.done = false;
                $scope.fail = false;
                $scope.status = '';
            }

            if(event == 'verify')
            {
                $scope.all = false;
                $scope.verify = true;
                $scope.pay = false;
                $scope.done = false;
                $scope.fail = false;
                $scope.status = 1;
            }

            if(event == 'pay')
            {
                $scope.all = false;
                $scope.verify = false;
                $scope.pay = true;
                $scope.done = false;
                $scope.fail = false;
                $scope.status = 12;
            }

            if(event == 'done')
            {
                $scope.all = false;
                $scope.verify = false;
                $scope.pay = false;
                $scope.done = true;
                $scope.fail = false;
                $scope.status = 13;
            }

            if(event == 'fail')
            {
                $scope.all = false;
                $scope.verify = false;
                $scope.pay = false;
                $scope.done = false;
                $scope.fail = true;
                $scope.status = 3;
            }
            getList(1);
        }
    }

    // 翻页
    $scope.changePager = function(page, $event) {
         getList(page);

    }
    // Echat 设置，配置Echats相关文件路径
    // ------------------------------
    require.config({
        paths: {
            echarts: common.base_url + 'assets/js/plugins/visualization/echarts'
        }
    });
    // 搜索条件初始化
    var searchDataInit = function() {
        $scope.s_start_time = '';
        $scope.s_end_time = '';
        $scope.s_start_time2 = '';
        $scope.s_end_time2 = '';
        $scope.s_day = 'day';
        $scope.s_day2 = 'day2';
        $scope.day = true;

        $scope.week = false;
        $scope.month = false;
        $scope.day2 = true;
        $scope.week2 = false;
        $scope.month2 = false;

        $scope.all = true;
        $scope.verify = false;
        $scope.pay = false;
        $scope.done = false;
        $scope.fail = false;

    }
    searchDataInit();

    // 搜索
    $scope.searchAction = function() {
        $scope.day = false;
        $scope.week = false;
        $scope.month = false;
        showLine();
    }

    $scope.searchAction2 = function() {
        $scope.day2 = false;
        $scope.week2 = false;
        $scope.month2 = false;
        showLine();
    }
    $scope.getDateList = function(event) {
        if($scope.s_day != event)
        {
            searchDataInit();
            $scope.s_day = event;

            if(event == 'day')
            {
                $scope.day = true;
                $scope.week = false;
                $scope.month = false;
            }

            if(event == 'week')
            {
                $scope.day = false;
                $scope.week = true;
                $scope.month = false;
            }

            if(event == 'month')
            {
                $scope.day = false;
                $scope.week = false;
                $scope.month = true;
            }
        }
        showLine();
    }
    $scope.getSellerList = function(event) {
        if($scope.s_day2 != event)
        {
            searchDataInit();
            $scope.s_day2 = event;

            if(event == 'day2')
            {
                $scope.day2 = true;
                $scope.week2 = false;
                $scope.month2 = false;
            }

            if(event == 'week2')
            {
                $scope.day2 = false;
                $scope.week2 = true;
                $scope.month2 = false;
            }

            if(event == 'month2')
            {
                $scope.day2 = false;
                $scope.week2 = false;
                $scope.month2 = true;
            }
        }
        showLine();
    }
    var showLine = function ()
    {
        require(
            [
                'echarts',
                'echarts/theme/macarons',
                'echarts/chart/bar',
                'echarts/chart/pie',
                'echarts/chart/funnel',
                'echarts/chart/line'
            ],function(ec, macarons) {

                var stacked_lines = ec.init(document.getElementById('stacked_lines'),macarons);
                //初始化
                var formData = {};
                formData.s_start_time = $scope.s_start_time;
                formData.s_end_time = $scope.s_end_time;

                formData.s_day = $scope.s_day;

                //提现金额统计
                var getBuyerCashData = function() {
                    $http({
                        url: common.get_buyer_cash,
                        method: 'POST',
                        data:$.param(formData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.days);
                        var bb =angular.fromJson(response.echarts_data.mons);
                        stacked_lines_options = {
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['提现金额']
                            },
                            toolbox: {
                                show : false,
                                feature : {
                                    mark : {show: true},
                                    dataView : {show: true, readOnly: false},
                                    magicType : {show: true, type: ['line', 'bar']},
                                    restore : {show: true},
                                    saveAsImage : {show: true}
                                }
                            },
                            calculable : true,
                            xAxis : [
                                {
                                    type : 'category',
                                    data : aa,
                                    axisLabel:{
                                        interval:0,//横轴信息全部显示
                                        rotate:-30,//-30度角倾斜显示
                                    }
                                }
                            ],
                            yAxis : [
                                {
                                    type : 'value',

                                }
                            ],
                            series : [
                                {
                                    name:'提现金额',
                                    type:'bar',
                                    data : bb
                                }
                            ]

                        };
                        stacked_lines.setOption(stacked_lines_options,true);
                    });
                };
                getBuyerCashData();

                var stacked2_lines = ec.init(document.getElementById('stacked2_lines'),macarons);
                //提现买家
                var getCashBuyerData = function() {
                    formData = {};
                    formData.s_start_time2 = $scope.s_start_time2;
                    formData.s_end_time2 = $scope.s_end_time2;
                    formData.s_day2 = $scope.s_day2;
                    $http({
                        url: common.get_cash_buyer,
                        method: 'POST',
                        data:$.param(formData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.username);
                        var bb =angular.fromJson(response.echarts_data.mon);
                        stacked_lines_options = {
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['提现金额']
                            },
                            toolbox: {
                                show : false,
                                feature : {
                                    mark : {show: true},
                                    dataView : {show: true, readOnly: false},
                                    magicType : {show: true, type: ['line', 'bar']},
                                    restore : {show: true},
                                    saveAsImage : {show: true}
                                }
                            },
                            calculable : true,
                            xAxis : [
                                {
                                    type : 'category',
                                    data : aa,
                                    axisLabel:{
                                        interval:0,//横轴信息全部显示
                                        rotate:-30,//-30度角倾斜显示
                                    }
                                }
                            ],
                            yAxis : [
                                {
                                    type : 'value',

                                }
                            ],
                            series : [
                                {
                                    name:'提现金额',
                                    type:'bar',
                                    data : bb
                                }
                            ]

                        };
                        stacked2_lines.setOption(stacked_lines_options,true);
                    });
                };
                getCashBuyerData();
                // Resize charts
                // ------------------------------
                window.onresize = function() {
                    setTimeout(function() {
                        stacked_lines.resize();
                    }, 200);
                }
            })
    }
    //加载图表
    showLine();
}]);



