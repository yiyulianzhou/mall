/* ------------------------------------------------------------------------------
 *
 * user edit 添加新用户，编辑用户，都在此控制器中控制
 *
 * ---------------------------------------------------------------------------- */
app.controller('appCtrl', ['$scope', '$http', 'appService', 'appFactory', 'common', 'userinfo', function ($scope, $http, appService, appFactory, common, userinfo)
{
    var formInit = function() {
        $scope.step1             = true;
        $scope.step2             = false;
        $scope.username          = userinfo.username;
        $scope.real_name         = userinfo.realname;
        $scope.data				 = userinfo.data;
		$scope.user_role		 = angular.fromJson(userinfo.permission);
        $scope.editid            = userinfo.id;
		
		// 树状选择框初始化
        $("#permission_tree").fancytree({
            checkbox: true,
            selectMode: 3
        });

        $("#permission_tree").fancytree("getTree").visit(function(node) {
            node.setSelected(false);
        });

        setNodeSelected($scope.user_role);
    }

    // 递归用户权限节点被选中
    var setNodeSelected = function(node){
        var tree = $("#permission_tree").fancytree("getTree");
        // 如果是object，递归处理数据，继续找出节点ID
        if (typeof(node) == 'object') {
            for (var i in node) {
                setNodeSelected(node[i]);
            }
        } else {
            var currentNode = tree.getNodeByKey(node);
            currentNode.setSelected(true);
        }
    }

    $scope.nextAction = function() {
        $scope.step1 = false;
        $scope.step2 = true;
    }

    $scope.backAction = function() {
        $scope.step1 = true;
        $scope.step2 = false;
    }	

    formInit();

    //信息校验，新增用户时密码必填，编辑时非必填
    $scope.$watch('password', function() {
        if (!$scope.editid) {
            //新增时必填字段
            $scope.password_required_invalid = false;
            if (!$scope.userEditForm.password.$viewValue) {
                $scope.password_required_invalid = true;
            }
        }
    });


    /*
     * 表单提交用户所有信息
     */
    $scope.save = function() {
        var formData = {};

        // 获取权限设置
        var selNodes = $('#permission_tree').fancytree('getTree');

        // 全部权限节点数据
        var selPermission = selNodes.toDict(true);

        // 选中的结点数据
        var selectedNodes = selNodes.getSelectedNodes();

        // 更新的数据
        formData.username                 = $scope.username;
        formData.real_name                = $scope.real_name;
        formData.password                 = $scope.password;
		formData.data					  = $scope.data == 1 ? 1 : 0;
        formData.permission               = selPermission;

        // 判断object 是否为空
        function isEmptyObject(e) {
            var t;
            for (t in e)
                return !1;
            return !0
        }

        if(isEmptyObject(selectedNodes)){
            sweetAlert({
                title: "",
                text: '请分配权限',
                type: 'warning',
                timer: 2000
            });

            return false;
        }

		var url = common.edit + '?id=' + $scope.editid;

		sweetAlert({
			title: "编辑用户",
			text: "确定要修改用户数据吗",
			type: "info",
			showCancelButton: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: true,
		}, function() {
			// 请求新增用户数据开始
			$http({
				url: url,
				method: 'POST',
				data: $.param(formData),
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(response) {
				if (response.msg_type == 'success') {
					formInit();
					sweetAlert({
						title: "修改成功",
						text: "继续修改用户还是返回列表",
						type: "success",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "返回列表",
						cancelButtonText: "查看信息",
						closeOnConfirm: true,
						closeOnCancel: true
					}, function(isConfirm) {
						if (isConfirm) {
							window.location.href = common.index;
						}else{
							window.location.reload();
						}
					});
				} else {
					appFactory.simpleAlert(response);
				}
			});
		});
    }
}]);
