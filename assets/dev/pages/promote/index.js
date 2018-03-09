/* ------------------------------------------------------------------------------
 *
 * seller 卖家管理JS
 *
 * ---------------------------------------------------------------------------- */
//实名认证
var Status = {0: "过期",1: "正常"};

app.filter("StatusDesc", function () {
    return function (e) {
        return Status[e];
    }
});

app.controller('appCtrl', ['$scope', '$http','appService', 'appFactory','common', function($scope, $http,appService, appFactory,common) {

    //所有列表
    $scope.alllist = [];

    //顶部统计数据
    $scope.lists = [];

    //统计活动顶部数据
    var countPromote = function ()
    {
        var url =  common.count_promote;
        $http({
            url: url,
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            //列表数据
            $scope.lists = response.count;

        });
    }
    countPromote();

    //活动列表数据
    var getList = function (page){
        var formData = {};

        formData.status = $scope.status;

        // loading 开
        appFactory.loadingToggle(1);
        var url = page > 1 ? common.promote_list + page : common.promote_list;
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
                $scope.status = '';
            }
            getList(1);
        }
    }
    // 翻页
    $scope.changePager = function(page, $event) {
        getList(page);

    }

    /*
     * 查看活动详情，表单信息初始化数据
     * item: 当前单条数据对象
     * id: ID
     */

    $scope.fullData = {};
    $scope.id = 0;
    $scope.getData = function(id) {
        var formData = {};
        // 请求信息
        $http({
            url: common.promote_info + id,
            method: 'GET',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {

            //活动id
            $scope.fullData.id = response.item.id;

            //活动名称
            $scope.fullData.name = response.item.name;

            //单个红包金额
            $scope.fullData.money = response.item.money;

            //拆分人数
            $scope.fullData.use_user = response.item.use_user;

            //红包规则描述
            $scope.fullData.desc = response.item.desc;

            //个人红包金额上限
            $scope.fullData.max_money = response.item.max_money;

            //红包使用范围
            $scope.fullData.con_money = response.item.con_money;

            //红包使用条件
            $scope.fullData.con_money = response.item.con_money;

            //红包使用有效期
            $scope.fullData.del_time = response.item.del_time;


            //活动开始时间
            $scope.fullData.create_time= response.item.create_time;

            //活动结束时间
            $scope.fullData.end_time = response.item.end_time;

            //活动封面图片
            $scope.fullData.money1 = response.item.money1;

            //规则描述
            $scope.fullData.money2 = response.item.money2;

        });
    };

    /*
     * 更新数据
     * id: ID
     */
    $scope.save = function() {
        var formData = {};
        // 更新的数据
        formData.state = $scope.state;

        // 请求更新数据开始
        appFactory.loadingToggle(1);
        $http({
            url: common.promote_info + $scope.id,
            method: 'POST',
            data: $.param(formData),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            // 信息弹出框
            appFactory.simpleAlert(response);

            // 更新成功需更新list中的数据
            if (response.msg_type == 'success') {
                // 隐藏模态框
                $('#info_modal').modal('hide');
                $('#add_modal').modal('hide');
                $scope.changePager($scope.curpage, '');
            }
            appFactory.loadingToggle(0);
        });
        // 请求结束

    };


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

                //区域活跃用户统计
                var getSellerData = function() {
                    $http({
                        url: common.red_bags,
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
                                data:['红包个数']
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
                                    name:'红包个数',
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
                //发放金额统计
                var getCashSellerData = function() {
                    formData = {};
                    formData.s_start_time2 = $scope.s_start_time2;
                    formData.s_end_time2 = $scope.s_end_time2;
                    formData.s_day2 = $scope.s_day2;
                    $http({
                        url: common.promote_money,
                        method: 'POST',
                        data:$.param(formData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.days);
                        var bb =angular.fromJson(response.echarts_data.mons);
                        stacked_lines_options = {
                            color: ['#FF1493'],
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['累计金额']
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
                                    name:'累计金额',
                                    type:'bar',
                                    data : bb
                                }
                            ]

                        };
                        stacked2_lines.setOption(stacked_lines_options,true);
                    });
                };
                getCashSellerData();
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


