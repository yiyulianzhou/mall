/* ------------------------------------------------------------------------------
 *
 * seller 卖家管理JS
 *
 * ---------------------------------------------------------------------------- */
//实名认证
var Real = {0: "未认证",1: "已认证",2: "资料待审核"};

//健康认证
var Health = {0: "未认证",1: "已认证",2: "资料待审核"};

//禁言状态
var Lock = {1: "已封禁",0: "正常"};

app.filter("RealDesc", function () {
    return function (e) {
        return Real[e];
    }
});

app.filter("HealthDesc", function () {
    return function (e) {
        return Health[e];
    }
});

app.filter("LockDesc", function () {
    return function (e) {
        return Lock[e];
    }
});

app.controller('appCtrl', ['$scope', '$http','appService', 'appFactory','common', function($scope, $http,appService, appFactory,common) {

    //所有列表
    $scope.alllist = [];

    //顶部统计数据
    $scope.lists = [];

    //统计头部卖家提现相关数据
    var countSeller = function ()
    {
        var url =  common.count_seller;
        $http({
            url: url,
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            // 待处理的反馈列表数据
            $scope.lists = response.count;

        });
    }
    countSeller();

    //卖家列表数据
    var getList = function (page){
        var formData = {};

        formData.status = $scope.status;

        // loading 开
        appFactory.loadingToggle(1);
        var url = page > 1 ? common.get_seller_list + page : common.get_seller_list;
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
    $scope.changeLock = function (id,event){
            $scope.id = id;
            if(event == '1')
            {
                $scope.lock = 0;
            }
            if(event == '0')
            {
                $scope.lock = 1;
            }
        var formData = {};
        formData.lock = $scope.lock;
        formData.id = $scope.id;
        $http({
            url: common.change_lock + id,
            method: 'POST',
            data: $.param(formData),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {

        })
    }
    // 翻页
    $scope.changePager = function(page, $event) {
        getList(page);

    }

    /*
     * 查看卖家详情，表单信息初始化数据
     * item: 当前单条数据对象
     * id: ID
     */
    $scope.fullData = {};
    $scope.id = 0;
    $scope.getData = function(id) {
        var formData = {};
        // 请求信息
        $http({
            url: common.get_seller_info + id,
            method: 'GET',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {

            //卖家id
            $scope.fullData.id = response.item.id;

            //店铺名称
            $scope.fullData.shop = response.item.shop;

            //店铺小区
            $scope.fullData.com_address = response.item.com_address;

            //店铺地址
            $scope.fullData.address = response.item.address;

            //头像
            $scope.fullData.pic = response.item.pic;

            //真是姓名
            $scope.fullData.name = response.item.name;

            //手机
            $scope.fullData.phone = response.item.phone;

            //背景
            $scope.fullData.bg_img = response.item.bg_img;

            //身份证正面
            $scope.fullData.img1 = response.item.img1;

            //身份证反面
            $scope.fullData.img2 = response.item.img2 ;

            //健康证照片
            $scope.fullData.img3 = response.item.img3;

            //实名认证状态
            $scope.fullData.is_real = response.item.is_real;

            //健康证状态
            $scope.fullData.is_health = response.item.is_health;

            //账户余额
            $scope.fullData.money = response.item.money;

            //未出货订单
            $scope.fullData.money1 = response.item.money1;

            //已出货订单
            $scope.fullData.money2 = response.item.money2;

            //封禁状态
            $scope.fullData.lock = response.item.lock;

            //创建时间
            $scope.fullData.create_time = response.item.create_time;

            // 以下字段是表单提交的信息
            // ID
            $scope.id = response.item.id;

        });
    };

    /*
     * 更新数据
     * id: ID
     */
    $scope.save = function() {
        var formData = {};
        // 更新的数据
        formData.is_real = $scope.verify_state1;
        formData.is_health = $scope.verify_state2;

        // 请求更新数据开始
        appFactory.loadingToggle(1);
        $http({
            url: common.verify_url + $scope.id,
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
                $('#verify_modal').modal('hide');
                $scope.changePager($scope.curpage, '');
            }
            appFactory.loadingToggle(0);
        });
        // 请求结束

    };
    var i =0;
    $scope.n = true;
    $scope.b = false;
    $scope.zoom = function(event){
        if( i%2 == 0){
            $scope.n = false;
            $scope.b = true;
            i++;
        }else{
            $scope.n = true;
            $scope.b = false;
            i--;
        }
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

                //卖家销售额统计
                var getSellerData = function() {
                    $http({
                        url: common.get_seller_sales,
                        method: 'POST',
                        data:$.param(formData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.names);
                        var bb =angular.fromJson(response.echarts_data.mons);
                        stacked_lines_options = {
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['销售金额']
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
                                    name:'销售金额',
                                    type:'bar',
                                    barWidth : 30,//柱图宽度
                                    data : bb
                                }
                            ]

                        };
                        stacked_lines.setOption(stacked_lines_options,true);
                    });
                };
                getSellerData();

                var stacked2_lines = ec.init(document.getElementById('stacked2_lines'),macarons);
                //用户数最多小区
                var getCashSellerData = function() {
                    formData = {};
                    formData.s_start_time2 = $scope.s_start_time2;
                    formData.s_end_time2 = $scope.s_end_time2;
                    formData.s_day2 = $scope.s_day2;
                    $http({
                        url: common.get_seller_users,
                        method: 'POST',
                        data:$.param(formData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.names);
                        var bb =angular.fromJson(response.echarts_data.mons);
                        stacked_lines_options = {
                            color: ['#FF1493'],
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['订单数量']
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
                                    name:'订单数量',
                                    type:'bar',
                                    barWidth : 30,//柱图宽度
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



