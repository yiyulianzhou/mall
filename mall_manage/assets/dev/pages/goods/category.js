
//分类条目
var Cate =  {1: "新鲜水果",2: "时令蔬菜",3: "精选肉类",4: "活鲜水产",5:"粮油副食",6:"中式点心",7:"西餐西点",8:"禽蛋乳品",9:"南北干货",10:"滋补养生",11:"坚果炒货",12:"酱料酱菜",13:"槽卤腌制",14:"日韩美食",15:"小吃零食"};
var State = {1:'开放',0:'关闭'};
app.filter("CateDesc", function () {
    return function (e) {
        return Cate[e];
    }
});

app.filter("StateDesc", function () {
    return function (e) {
        return State[e];
    }
});

app.controller('appCtrl', ['$scope', '$http','appService', 'appFactory','common', function($scope, $http,appService, appFactory,common) {

    //所有列表
    $scope.alllist = [];

    // 列表数据变量初始化
    $scope.list = [];


    //商品列表数据
    var getList = function (page){
        var formData = {};

        formData.state = $scope.state;

        // loading 开
        appFactory.loadingToggle(1);

        var url = page > 1 ? common.get_category + page : common.get_category;
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
            $scope.state = '';

            if(event == 'all')
            {
                $scope.all = true;
                $scope.open = false;
                $scope.off = false;
                $scope.state = '';
            }

            if(event == 'open')
            {
                $scope.all = false;
                $scope.open = true;
                $scope.off = false;
                $scope.state = 1;
            }

            if(event == 'off')
            {
                $scope.all = false;
                $scope.open = false;
                $scope.off = true;
                $scope.state = 0;
            }
        }
        getList(1);
    }




    // 搜索条件初始化
    var searchDataInit = function() {
        $scope.all = true;
        $scope.open = false;
        $scope.off = false;
    }
    searchDataInit();

    // 翻页
    $scope.changePager = function(page, $event) {
        getList(page);
    }

    /*
     * 分类详情
     * item: 当前单条数据对象
     * id: ID
     */
    $scope.fullData = {};
    $scope.id = 0;
    $scope.getData = function(id) {
        var formData = {};
        // 请求信息
        $http({
            url: common.cate_detail_url + id,
            method: 'GET',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {

            //分类名称
            $scope.fullData.name = response.item.name;

            //分类介绍
            $scope.fullData.info = response.item.info;

            //商品数量
            $scope.fullData.goods_num = response.item.goods_num;

            //商铺数量
            $scope.fullData.shop_num = response.item.shop_num;

            //分类状态
            $scope.fullData.state = response.item.state;

            // 以下字段是表单提交的信息
            // ID
            $scope.id = response.item.id;

        });
    };

    /*
     * 添加数据
     */
    $scope.save = function() {
        var formData = {};
        //添加的数据
        //分类名
        formData.name = $scope.name;
        //介绍
        formData.info = $scope.info;
        //是否开放
        formData.state = $scope.state;

        // 请求添加数据开始
        appFactory.loadingToggle(1);
        $http({
            url: common.addCate_url,
            method: 'POST',
            data: $.param(formData),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            // 信息弹出框
            appFactory.simpleAlert(response);

            // 添加成功需更新list中的数据
            if (response.msg_type == 'success') {
                // 隐藏模态框
                $('#cate_modal').modal('hide');
                $('#cateInfo_modal').modal('hide');
                $scope.changePager($scope.curpage, '');
            }
            appFactory.loadingToggle(0);
        });
        // 请求结束
    };

}]);




