/* ------------------------------------------------------------------------------
 *
 * promote 活动管理JS
 *
 * ---------------------------------------------------------------------------- */
//实名认证
var Status = {0: "过期",1: "正常",3:"满金额",4:"手工关闭"};
//是否在首页显示
var Display = {0: "否",1: "是"};
//拆分方式
var Split = {1:"等分",2:"随机"};
app.filter("StatusDesc", function () {
    return function (e) {
        return Status[e];
    }
});

app.filter("DisplayDesc", function () {
    return function (e) {
        return Display[e];
    }
});

app.filter("SplitDesc", function () {
    return function (e) {
        return Split[e];
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

            //需要人数
            $scope.fullData.user = response.item.user;

            //红包总额
            $scope.fullData.money = response.item.money;

            //红包总个数
            $scope.fullData.number = response.item.number;

            //可使用红包数
            $scope.fullData.use_number = response.item.use_number;

            //单个红包金额
            $scope.fullData.bag_money = response.item.bag_money;

            //拆分方式
            $scope.fullData.split_type = response.item.split_type;

            //使用限制
            $scope.fullData.con_money = response.item.con_money;

            //红包有效期截止时间
            $scope.fullData.bet = response.item.bet;

            //活动结束时间
            $scope.fullData.aet = response.item.aet;

            //是否在首页显示
            $scope.fullData.is_display = response.item.is_display;

            //已领取人数
            $scope.fullData.pd_user = response.item.pd_user;

            //已领取金额
            $scope.fullData.pd_money = response.item.pd_money;

            //已使用人数
            $scope.fullData.use_user = response.item.use_user;

            //已使用金额
            $scope.fullData.use_money = response.item.use_money;

            //创建时间
            $scope.fullData.create_time= response.item.create_time;

            //结束时间
            $scope.fullData.close_time= response.item.close_time;

            //删除时间
            $scope.fullData.del_time = response.item.del_time;

            //红包规则描述
            $scope.fullData.desc = response.item.desc;


            //状态
            $scope.fullData.status = response.item.status;

        });
    };
    var formInit = function() {
        //活动名称
        $scope.name='';

        //需要人数
        $scope.user='';

        //红包总额
        $scope.money='';

        //红包总个数
        $scope.number='';

        //可使用红包数
        $scope.use_number='';

        //单个红包金额
        $scope.bag_money='';

        //拆分方式
        $scope.split_type='';

        //使用限制
        $scope.con_money='';

        //红包有效期截止时间
        $scope.bet='';

        //活动结束时间
        $scope.aet='';

        //是否在首页显示
        $scope.is_display='';

        //创建时间
        $scope.create_time='';

        //红包规则描述
        $scope.desc='';

    }

    formInit();
    /*
     * 创建数据
     * id: ID
     */
    $scope.save = function() {
        var formData = {};

        //活动名称
        formData.name = $scope.name;

        //需要人数
        formData.user = $scope.user;

        //红包总额
        formData.money = $scope.money;

        //红包总个数
        formData.number = $scope.number;

        //可使用红包数
        formData.use_number = $scope.use_number;

        //单个红包金额
        formData.bag_money = $scope.bag_money;

        //拆分方式
        formData.split_type = $scope.split_type;

        //使用限制
        formData.con_money = $scope.con_money;

        //红包有效期截止时间
        formData.bet = $scope.bet;

        //活动结束时间
        formData.aet = $scope.aet;

        //是否在首页显示
        formData.is_display = $scope.is_display;

        //创建时间
        formData.create_time= $scope.create_time;

        //结束时间
        formData.close_time= $scope.close_time;

        //删除时间
        formData.del_time = $scope.del_time;

        //红包规则描述
        formData.desc = $scope.desc;


        // 请求数据开始
        sweetAlert({
            title: "新增活动",
            text: "确定要新增活动吗",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function() {
            $http({
                url: common.create,
                method: 'POST',
                data: $.param(formData),
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function(response) {
                // 新增成功
                if (response.msg_type == 'success') {
                    // 初始化不要放到sweetAlert中执行
                    formInit();
                    sweetAlert({
                        title: "新增成功",
                        text: "继续新增活动还是返回列表",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "继续新增",
                        cancelButtonText: "返回列表",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    }, function(isConfirm) {
                        // 是否新增用户
                        if (isConfirm) {
                            // 跳转到编辑用户
                            window.location.href = common.index;
                        }else{
                            // 跳转到列表
                            window.location.href = common.index;
                        }
                    });
                } else {
                    // 信息弹出框
                    appFactory.simpleAlert(response);
                }
            });
        });
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



