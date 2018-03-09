/* ------------------------------------------------------------------------------
 *
 * 简单功能封装
 *
 * ---------------------------------------------------------------------------- */
app.factory('appFactory', function($rootScope) {
    var factory = {};

    // 列表搜索框显示隐藏操作
    factory.searchboxToggle = function() {
        $rootScope.searchbox = false;
        $rootScope.btn = function() {
            var searchbtn = $('#searchbtn');
            if ($rootScope.searchbox) {
                $rootScope.searchbox = false;
                searchbtn.val("筛选 ＋");
            } else {
                $rootScope.searchbox = true;
                searchbtn.val("筛选 －");
            }
        }
    }

    // 页面loading
    factory.loadingToggle = function(isLoading) {
        // 请求过程中显示loading，默认0:不显示
        $rootScope.loading = isLoading ? 1 : 0;
    }

    // header 消息数据更新，headerMessages()在 angularjs_header.js中
    factory.headerMessages = function() {
        $rootScope.headerMessages();
    }

    // 翻页数据
    factory.pagerInit = function(response) {
        $rootScope.total_rows = response.total_rows;
        $rootScope.start_page = response.start_page;
        $rootScope.per_page = response.per_page;
        $rootScope.pages = response.pages;
        $rootScope.list_count = response.list_count;
        $rootScope.curpage = parseInt(response.curpage);
        $rootScope.prevPages = parseInt($rootScope.curpage - 4);
        $rootScope.nextPages = parseInt($rootScope.curpage + 4);
        $rootScope.pageNumbers = angular.fromJson(response.pageNumbers);
    }
    // 翻页数据
    factory.pagerInit2 = function(response) {
        $rootScope.total_rows2 = response.total_rows;
        $rootScope.start_page2 = response.start_page;
        $rootScope.per_page2 = response.per_page;
        $rootScope.pages2 = response.pages;
        $rootScope.list_count2 = response.list_count;
        $rootScope.curpage2 = parseInt(response.curpage);
        $rootScope.prevPages2 = parseInt($rootScope.curpages - 4);
        $rootScope.nextPages2 = parseInt($rootScope.curpagess + 4);
        $rootScope.pageNumbers2 = angular.fromJson(response.pageNumbers);
    }

    // 简单的弹出框
    factory.simpleAlert = function(response) {
        sweetAlert({
            title: "",
            text: response.message,
            type: response.msg_type,
            timer: 2000
        });
    }

    // 任务新增或编缉时，第三步中素材列表，设置为全局是因为除了在task/edit.js中用到，在task/add_material.js中添加素材后，也需要重载列表
    factory.setMaterialListData = function(list){
        $rootScope.materialList = list;
    }

    // 任务新增或编缉时，第三步中中新增素材列表，需根据第二步中选择的投放平台，设置素材平台为相对应值可选
    factory.setMaterialPlatform = function(type){
        $rootScope.platform = {};
        $rootScope.materialPlatform = type;
        for (var i = 1; i < 5; i++) {
            $rootScope.platform[i] = type;
        }
    }

    return factory;
});

app.factory('fileReader', ["$q", "$log", function($q, $log) {
    var onLoad = function(reader, deferred, scope) {
        return function() {
            scope.$apply(function() {
                deferred.resolve(reader.result);
            });
        };
    };
    var onError = function(reader, deferred, scope) {
        return function() {
            scope.$apply(function() {
                deferred.reject(reader.result);
            });
        };
    };
    var getReader = function(deferred, scope) {
        var reader = new FileReader();
        reader.onload = onLoad(reader, deferred, scope);
        reader.onerror = onError(reader, deferred, scope);
        return reader;
    };
    var readAsDataURL = function(file, scope) {
        var deferred = $q.defer();
        var reader = getReader(deferred, scope);
        reader.readAsDataURL(file);
        return deferred.promise;
    };
    return {
        readAsDataUrl: readAsDataURL
    };
}]);
