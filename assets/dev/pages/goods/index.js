/* ------------------------------------------------------------------------------
 *
 * goods 商品管理JS
 *
 * ---------------------------------------------------------------------------- */
//审核状态
var State = {1: "待审核",2: "已下架",3: "审核未通过",5: "销售中",90:"团购中",91:"团购结束"};
//分类条目
var Cate =  {1: "新鲜水果",2: "产地直供",3: "车厘子",4: "奇异果",5:"菠萝凤梨",6:"橙柑橘柚",7:"蓝莓草莓",8:"葡萄提子",9:"桃李杏梅",10:"热带水果",11:"苹果香蕉梨"};
//销售方式
var salesType = {1: "普通",2: "团购"};

var logistics = {1: "第三方快递",2: "送货上门"};

var direct_sales = {0: "否",1: "是"};

app.filter("StateDesc", function () {
    return function (e) {
        return State[e];
    }
});
app.filter("CateDesc", function () {
    return function (e) {
        return Cate[e];
    }
});

app.filter("salesTypeDesc", function () {
    return function (e) {
        return salesType [e];
    }
});
app.filter("logisticsDesc", function () {
    return function (e) {
        return logistics [e];
    }
});

app.filter("direct_salesDesc", function () {
    return function (e) {
        return direct_sales [e];
    }
});

app.controller('appCtrl', ['$scope', '$http','appService', 'appFactory','common', function($scope, $http,appService, appFactory,common) {

    //所有列表
    $scope.alllist = [];

    // 列表数据变量初始化
    $scope.list = [];

    //顶部统计数据
    $scope.lists = [];

    //顶部商品新增数据统计
    var countGoodsData = function ()
    {
        var url =  common.count_goods_data;
        $http({
            url: url,
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            // 顶部商品统计数据
            $scope.lists = response.list;

        });
    }
    countGoodsData();

    //商品列表数据
    var getList = function (page){
        var formData = {};

        formData.state = $scope.state;

        // loading 开
        appFactory.loadingToggle(1);

        var url = page > 1 ? common.get_goods + page : common.get_goods;
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

    //页面初始化首次获取列表
    getList(1);

    $scope.filterList = function (event) {
        if($scope.state != event)
        {
            searchDataInit();

            if(event == 'all')
            {
                $scope.all = true;
                $scope.verify = false;
                $scope.sale = false;
                $scope.down = false;
                $scope.state = '';
            }

            if(event == 'verify')
            {
                $scope.all = false;
                $scope.verify = true;
                $scope.sale = false;
                $scope.down = false;
                $scope.state = 1;
            }

            if(event == 'sale')
            {
                $scope.all = false;
                $scope.verify = false;
                $scope.sale = true;
                $scope.down = false;
                $scope.state = 5;
            }

            if(event == 'down')
            {
                $scope.all = false;
                $scope.verify = false;
                $scope.sale = false;
                $scope.down = true;
                $scope.state = 2;
            }


        }
        getList(1);
    }


    // 翻页
    $scope.changePager = function(page, $event) {
        getList(page);
    }



    /*
     * 审核信息时，表单信息初始化数据
     * item: 当前单条数据对象
     * id: ID
     */
    $scope.fullData = {};
    $scope.id = 0;
    $scope.verify_remark = '';
    $scope.getData = function(id) {
        var formData = {};
        // 请求信息
        $http({
            url: common.verify_url + id,
            method: 'GET',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {

            //商品名称
            $scope.fullData.name = response.item.name;

            //商品图片
            $scope.fullData.img = response.item.img;

            // 销售方式
            $scope.fullData.sales_type = response.item.sales_type;

            $scope.fullData.verify_value = response.item.sales_type == 1 ? 5 : 90;

            // 商品分类
            $scope.fullData.category = response.item.category;

            // 商品介绍
            $scope.fullData.info = response.item.info;

            // 是否产地直销
            $scope.fullData.direct_sales = response.item.direct_sales;

            // 物流方式
            $scope.fullData.logistics = response.item.logistics;

            // 状态
            $scope.fullData.state = response.item.state;

            // 申请时间
            $scope.fullData.add_time = response.item.add_time;

            // 以下字段是表单提交的信息
            // ID
            $scope.id = response.item.id;
            // 审核备注
            $scope.fullData.verify_remark = response.item.verify_remark;

        });
    };

    /*
     * 更新数据
     * id: ID
     */
    $scope.save = function() {
        var formData = {};
        // 更新的数据
        formData.verify_remark = $scope.verify_remark;
        formData.state = $scope.verify_state;
        // 请求更新数据开始
        appFactory.loadingToggle(1);
        $http({
            url: common.verifys_url + $scope.id,
            method: 'POST',
            data: $.param(formData),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            // 信息弹出框
            appFactory.simpleAlert(response);

            // 更新成功需更新list中的数据
            if (response.msg_type == 'success') {
                // 隐藏模态框
                $('#verify_modal').modal('hide');
                $('#info_modal').modal('hide');
                $('#up_modal').modal('hide');
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
        $scope.s_day3 = 'day3';
        $scope.s_day4 = 'day4';
        $scope.day = true;

        $scope.week = false;
        $scope.month = false;
        $scope.day2 = true;
        $scope.week2 = false;
        $scope.month2 = false;

        $scope.day3 = true;
        $scope.week3 = false;
        $scope.month3 = false;

        $scope.day4 = true;
        $scope.week4 = false;
        $scope.month4 = false;

        $scope.all = true;
        $scope.verify = false;
        $scope.sale = false;
        $scope.down = false;
        $scope.state = '';
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
    $scope.searchAction3 = function() {
        $scope.day3 = false;
        $scope.week3 = false;
        $scope.month3 = false;
        showLine();
    }
    $scope.searchAction4 = function() {
        $scope.day4 = false;
        $scope.week4 = false;
        $scope.month4 = false;
        showLine();
    }
    //单品
    $scope.getSalesList = function(event) {
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
    //类目
    $scope.getCatesList = function(event) {
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

    //访问
    $scope.getVisitList = function(event) {
        if($scope.s_day3 != event)
        {
            searchDataInit();
            $scope.s_day3 = event;

            if(event == 'day3')
            {
                $scope.day3 = true;
                $scope.week3 = false;
                $scope.month3 = false;
            }

            if(event == 'week3')
            {
                $scope.day3 = false;
                $scope.week3 = true;
                $scope.month3 = false;
            }

            if(event == 'month3')
            {
                $scope.day3 = false;
                $scope.week3 = false;
                $scope.month3 = true;
            }
        }
        showLine();
    }
    //分享
    $scope.getShareList = function(event) {
        if($scope.s_day4 != event)
        {
            searchDataInit();
            $scope.s_day4 = event;

            if(event == 'day4')
            {
                $scope.day4 = true;
                $scope.week4 = false;
                $scope.month4 = false;
            }

            if(event == 'week4')
            {
                $scope.day4 = false;
                $scope.week4 = true;
                $scope.month4 = false;
            }

            if(event == 'month4')
            {
                $scope.day4 = false;
                $scope.week4 = false;
                $scope.month4 = true;
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

                //单品销售统计
                var getSalesData = function() {
                    $http({
                        url: common.get_sales,
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
                                    data : bb
                                }
                            ]

                        };
                        stacked_lines.setOption(stacked_lines_options,true);
                    });
                };
               getSalesData();

                var stacked2_lines = ec.init(document.getElementById('stacked2_lines'),macarons);
                //类目销售统计
                var getCatesData = function() {
                    formData = {};
                    formData.s_start_time2 = $scope.s_start_time2;
                    formData.s_end_time2 = $scope.s_end_time2;
                    formData.s_day2 = $scope.s_day2;
                    $http({
                        url: common.get_cates,
                        method: 'POST',
                        data:$.param(formData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.cates);
                        var bb =angular.fromJson(response.echarts_data.mons);
                        stacked_lines_options = {
                            color: ['#6398DB'],
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
                                    data : bb
                                }
                            ]

                        };
                        stacked2_lines.setOption(stacked_lines_options,true);
                    });
                };
               getCatesData();

                var stacked3_lines = ec.init(document.getElementById('stacked3_lines'),macarons);
                //单品访问统计
                var getVisitData = function() {
                    formData = {};
                    formData.s_start_time3 = $scope.s_start_time3;
                    formData.s_end_time3 = $scope.s_end_time3;
                    formData.s_day3 = $scope.s_day3;

                    $http({
                        url: common.get_visit,
                        method: 'POST',
                        data:$.param(formData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.names);
                        var bb =angular.fromJson(response.echarts_data.access);
                        stacked_lines_options = {
                            color: ['#8B0000'],
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['访问次数']
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
                                    name:'访问次数',
                                    type:'bar',
                                    data : bb
                                }
                            ]

                        };
                        stacked3_lines.setOption(stacked_lines_options,true);
                    });
                };
                getVisitData();

                var stacked4_lines = ec.init(document.getElementById('stacked4_lines'),macarons);
                //单品分享统计
                var getShareData = function() {
                    formData = {};
                    formData.s_start_time4 = $scope.s_start_time4;
                    formData.s_end_time4 = $scope.s_end_time4;
                    formData.s_day4 = $scope.s_day4;
                    $http({
                        url: common.get_share,
                        method: 'POST',
                        data:$.param(formData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.names);
                        var bb =angular.fromJson(response.echarts_data.shares);
                        stacked_lines_options = {
                            color: ['#FF1493'],
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['分享次数']
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
                                    name:'分享次数',
                                    type:'bar',
                                    data : bb
                                }
                            ]

                        };
                        stacked4_lines.setOption(stacked_lines_options,true);
                    });
                };
                getShareData();
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




