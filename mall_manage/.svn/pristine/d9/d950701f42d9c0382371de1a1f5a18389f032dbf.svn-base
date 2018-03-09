/* ------------------------------------------------------------------------------
 *
 * home 首页JS
 *
 * ---------------------------------------------------------------------------- */
app.controller('appCtrl', ['$scope', '$http', 'appService', 'appFactory', 'common', function($scope, $http,appService, appFactory,common) {

    // 反馈列表数据变量初始化
    $scope.list = [];

    // 提现列表
    $scope.applylist = [];

    //待处理反馈信息
    var feedback = function (page)
    {
        //var url = common.show_tips;
        // loading 开
        appFactory.loadingToggle(1);
        var url = page > 1 ? common.show_tips + page : common.show_tips;
        $http({
            url: url,
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            // 待处理的反馈列表数据
            $scope.list = response.list;

            // 翻页数据
            appFactory.pagerInit(response);

            // loading 关
            appFactory.loadingToggle(0);
        });
    }
    //页面初始化首次获取列表
    feedback(1);

    //待处理提现信息
    var cashapply = function (page)
    {
        //var url = common.cash_apply;
        // loading 开
        var url = page > 1 ? common.cash_apply + page : common.cash_apply;
        $http({
            url: url,
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            // 待处理的反馈列表数据
            $scope.applylist = response.list;
            // 翻页数据
            appFactory.pagerInit2(response);

            // loading 关
            appFactory.loadingToggle(0);

        });
    }
    cashapply(1);

    // 翻页
    $scope.changePager = function(page, $event) {
        if($event =='tips') feedback(page);
        if($event =='apply') cashapply(page,$event);
    }

    // Echat 设置，配置Echats相关文件路径
    // ------------------------------
    require.config({
        paths: {
            echarts: common.base_url + 'assets/js/plugins/visualization/echarts'
        }
    });

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

                var getSellerData = function() {
                    $http({
                        url: common.show_line,
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.shop);
                        var bb =angular.fromJson(response.echarts_data.mon);
                        stacked_lines_options = {
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['销售金额']
                            },
                            toolbox: {
                                show : true,
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
                                    name:'销售金额',
                                    type:'bar',
                                    data : bb
                                }
                            ]

                        };
                        stacked_lines.setOption(stacked_lines_options,true);
                    });
                };
                getSellerData();
                var stacked2_lines = ec.init(document.getElementById('stacked2_lines'),macarons);

                var getBuyerData = function() {
                    $http({
                        url: common.show_buyer,
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.username);
                        var bb =angular.fromJson(response.echarts_data.mon);
                        $scope.list_buyers = response.echarts_data;
                        stacked_lines_options = {
                            color: ['#6398DB'],
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['消费金额']
                            },
                            toolbox: {
                                show : true,
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
                                    name:'消费金额',
                                    type:'bar',
                                    data: bb
                                }
                            ]
                        };
                        stacked2_lines.setOption(stacked_lines_options,true);
                    });
                };
                getBuyerData();
                var stacked3_lines = ec.init(document.getElementById('stacked3_lines'),macarons);

                var getGoodsData = function() {
                    $http({
                        url: common.show_goods,
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {

                        var aa =angular.fromJson(response.echarts_data.total);
                        var bb =angular.fromJson(response.echarts_data.name);
                        $scope.list_goods = response.echarts_data;
                        stacked_lines_options = {
                            color: ['#D15FEE'],
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['销量']
                            },
                            toolbox: {
                                show : true,
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
                                    data : bb ,
                                    axisLabel:{
                                        interval:0,//横轴信息全部显示
                                        rotate:-30,//-30度角倾斜显示
                                    }
                                }
                            ],
                            yAxis : [
                                {
                                    type : 'value'
                                }
                            ],
                            series : [
                                {
                                    name:'销量',
                                    type:'bar',
                                    data: aa

                                }
                            ]
                        };
                        stacked3_lines.setOption(stacked_lines_options,true);
                    });
                };
                getGoodsData();
                var stacked4_lines = ec.init(document.getElementById('stacked4_lines'), macarons);
                var getDistrictData = function() {
                    $http({
                        url: common.show_district,
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {

                        stacked_lines_options  = {
                            tooltip : {
                                trigger: 'item',
                                formatter: "{a} <br/>{b} : {c} ({d}%)"
                            },
                            legend: {
                                orient : 'vertical',
                                x : 'left',
                                data:['杨浦小区','央讯小区','永和家园','美兰嘉园']
                            },
                            toolbox: {
                                show : true,
                                feature : {
                                    mark : {show: true},
                                    dataView : {show: true, readOnly: false},
                                    magicType : {
                                        show: true,
                                        type: ['pie', 'funnel'],
                                        option: {
                                            funnel: {
                                                x: '25%',
                                                width: '50%',
                                                funnelAlign: 'left',
                                                max: 1548
                                            }
                                        }
                                    },
                                    restore : {show: true},
                                    saveAsImage : {show: true}
                                }
                            },
                            calculable : true,
                            series : [
                                {
                                    name:'访问来源',
                                    type:'pie',
                                    radius : '55%',
                                    center: ['50%', '60%'],
                                    data:[
                                        {value:335, name:'杨浦小区'},
                                        {value:310, name:'央讯小区'},
                                        {value:135, name:'永和家园'},
                                        {value:1548, name:'美兰嘉园'}
                                    ]
                                }
                            ]
                        };
                        stacked4_lines.setOption(stacked_lines_options,true);
                    });
                };
                getDistrictData();
                // Resize charts
                // ------------------------------
                window.onresize = function() {
                    setTimeout(function() {
                        stacked_lines.resize();
                        stacked2_lines.resize();
                        stacked3_lines.resize();
                        stacked4_lines.resize();
                    }, 200);
                }
            })
    }
    //加载图表
    showLine();
}]);
