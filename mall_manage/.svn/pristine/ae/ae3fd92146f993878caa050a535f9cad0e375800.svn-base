/* ------------------------------------------------------------------------------
 *
 * 登录页面JS
 *
 * ---------------------------------------------------------------------------- */

app.controller('appCtrl', ['$scope', '$http', 'appService', 'appFactory', 'common', function ($scope, $http, appService, appFactory, common) {
    var formInit = function() {
        $scope.username = '';
        $scope.password = '';
    }

    formInit();

    /*
     * 表单提交用户所有信息
     */
    $scope.save = function() {
        var formData       = {};
        // 更新的数据
        formData.username = $scope.username;
        formData.password = $scope.password;
        $http({
            url: common.login_url,
            method: 'POST',
            data: $.param(formData),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function(response) {

            $scope.redirect = response.redirect;
            // 登录成功后跳转
            if (response.msg_type == 'success') {
                window.location.href = response.redirect;
            }else{
            	// 信息弹出框
            	appFactory.simpleAlert(response);
            }
        });
    }
}]);
