/* ------------------------------------------------------------------------------
 *
 *修改密码
 *
 * ---------------------------------------------------------------------------- */
app.controller('appCtrl', ['$scope', '$http', 'appService', 'appFactory', 'common', function ($scope, $http, appService, appFactory, common )
{
    var formInit = function() {
        $scope.oldpsw = '';
        $scope.newpsw = '';
        $scope.surenewpsw = '';
    }
    formInit();

    /*
     * 表单提交用户所有信息
     */
    $scope.save = function() {
        var formData       = {};
        // 更新的数据
        formData.oldpsw = $scope.oldpsw;
        formData.newpsw = $scope.newpsw;
        formData.surenewpsw = $scope.surenewpsw;
        $http({
            url: common.my_url,
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
