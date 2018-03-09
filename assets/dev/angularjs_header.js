/* ------------------------------------------------------------------------------
 *
 * 顶部数据控制器
 *
 * ---------------------------------------------------------------------------- */
app.controller('headerCtrl', ['$scope', '$rootScope', '$http', 'appService', 'appFactory', 'common', function ($scope, $rootScope, $http, appService, appFactory,  common) {

    $rootScope.header_message_list = '';
    $rootScope.header_total_rows   = 0;
    // 初始化列表数据
    $rootScope.headerMessages = function() {
        $http({
            url: common.getunreadmessages_url,
            method: 'POST',
            data: {},
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {
            $rootScope.header_message_list = response.list;
            $rootScope.header_total_rows   = response.total_rows;
        });
    }
    //$rootScope.headerMessages();
}]);
