/* ------------------------------------------------------------------------------
 *
 * order 订单管理JS
 *
 * ---------------------------------------------------------------------------- */
//订单状态

var State = {4: "待发货",7: "待收货",8:"待评价",9: "交易完成",10: "待付款",11:"已删除",14:"已取消",15:"超时订单"};

//配送方式
var logistics = {1: "第三方快递",2: "送货上门"};

//支付方式
var pay_type = {1: "方式",2: "余额"};

//分类条目
var Cate =  {1: "新鲜水果",2: "时令蔬菜",3: "精选肉类",4: "活鲜水产",5:"粮油副食",6:"中式点心",7:"西餐西点",8:"禽蛋乳品",9:"南北干货",10:"滋补养生",11:"坚果炒货",12:"酱料酱菜",13:"槽卤腌制",14:"日韩美食",15:"小吃零食"};


app.filter("StateDesc", function () {
    return function (e) {
        return State[e];
    }
});

app.filter("logisticsDesc", function () {
    return function (e) {
        return logistics [e];
    }
});

app.filter("CateDesc", function () {
    return function (e) {
        return Cate[e];
    }
});

app.controller('appCtrl', ['$scope', '$http','appService', 'appFactory','common', function($scope, $http,appService, appFactory,common) {

    //所有订单列表
    $scope.alllist = [];

    //单条订单数据
    $scope.orderDetial = [];
    // 列表数据变量初始化
    $scope.list = [];

    //订单列表数据
    var getList = function (page){
        var formData = {};

        formData.state = $scope.state;

        // loading 开
        appFactory.loadingToggle(1);

        var url = page > 1 ? common.get_order + page : common.get_order;
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

    $scope.filterList = function (event) {
        if($scope.state != event)
        {
            searchDataInit();
            $scope.state = '';

            if(event == 'all')
            {
                $scope.all = true;
                $scope.toSend = false;
                $scope.toReceive = false;
                $scope.done = false;
                $scope.state = '';
            }

            if(event == 'toSend')
            {
                $scope.all = false;
                $scope.toSend = true;
                $scope.toReceive = false;
                $scope.done = false;
                $scope.state = 4;
            }

            if(event == 'toReceive')
            {
                $scope.all = false;
                $scope.toSend = false;
                $scope.toReceive = true;
                $scope.done = false;
                $scope.state = 7;
            }

            if(event == 'done')
            {
                $scope.all = false;
                $scope.toSend = false;
                $scope.toReceive = false;
                $scope.done = true;
                $scope.state = 9;
            }


        }
        getList(1);
    }

    //页面初始化首次获取列表
    getList(1);


    // 搜索条件初始化
    var searchDataInit = function() {
        $scope.s_start_time = '';
        $scope.s_end_time = '';

        $scope.s_day = 'day';
        $scope.s_order_cate = '';
        $scope.day = true;

        $scope.week = false;
        $scope.month = false;


        $scope.all = true;
        $scope.toSend = false;
        $scope.toReceive = false;
        $scope.done = false;
    }
    searchDataInit();


    // 翻页
    $scope.changePager = function(page, $event) {
        getList(page);
    }


    // 搜索
    $scope.searchAction = function() {
        $scope.day = false;
        $scope.week = false;
        $scope.month = false;
        showLine();
    }


    //订单
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

    /*
     * 查看订单详情，表单信息初始化数据
     * item: 当前单条数据对象
     * id: ID
     */
    $scope.fullData = {};
    $scope.id = 0;
    $scope.getData = function(id) {
        var formData = {};
        // 请求信息
        $http({
            url: common.orderInfo_url + id,
            method: 'GET',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {

            $scope.orderDetail = response.item;

            //订单号
            $scope.fullData.order_id = response.item[0].order_id;

            //商品名称

            $scope.fullData.goods_name = response.item[0].goods_name;

            //红包
            $scope.fullData.money_redbag = response.item[0].money_redbag;

            //支付方式
            $scope.fullData.pay_type = response.item[0].pay_type;

            //收货人
            $scope.fullData.receiver = response.item[0].receiver;

            //收货地址
            $scope.fullData.address = response.item[0].address;

            //电话
            $scope.fullData.phone = response.item[0].phone;

            //支付方式
            $scope.fullData.pay_type = response.item[0].pay_type;

            //规格名称
            $scope.fullData.gname = response.item[0].gname;

            //规格名称
            $scope.fullData.sales_price = response.item[0].sales_price;

            //订单总价
            $scope.fullData.money = response.item[0].money;

            //优惠金额
            $scope.fullData.money_other = response.item[0].money_other;

            //所属商铺
            $scope.fullData.shop = response.item[0].shop;

            //买家
            $scope.fullData.username = response.item[0].username;

            // 物流方式
            $scope.fullData.logi = response.item[0].logi;

            // 运费
            $scope.fullData.cont = response.item[0].cont;

            // 状态
            $scope.fullData.status = response.item[0].status;

            // 下单时间
            $scope.fullData.create_time = response.item[0].create_time;

            // 发货时间
            $scope.fullData.send_time = response.item[0].send_time;

            // 以下字段是表单提交的信息
            // ID
            $scope.id = response.item[0].id;

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
            url: common.orderInfo_url + $scope.id,
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
                formData.s_order_cate = $scope.s_order_cate;
                formData.s_day = $scope.s_day;

                //订单总额排行前10
                var getSalesData = function() {
                    $http({
                        url: common.get_order_data,
                        method: 'POST',
                        data:$.param(formData),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }).success(function(response) {
                        var aa =angular.fromJson(response.echarts_data.days);
                        var bb =angular.fromJson(response.echarts_data.mons);
                        stacked_lines_options = {
                            color: ['#FF1493'],
                            grid: {
                                x: 80,
                                x2: 80,
                                y: 30,
                                y2: 80
                            },
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['订单金额']
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
                                        rotate:-15,//-30度角倾斜显示
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
                                    name:'订单金额',
                                    type:'bar',
                                    data : bb
                                }
                            ]

                        };
                        stacked_lines.setOption(stacked_lines_options,true);
                    });
                };
               getSalesData();

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




