/**
 * 这里是博客列表模块
 * @type {[type]}
 */

userModule.controller('userCtrl', function($scope, $http, $state, $stateParams, User ) {

 // 持有新评论所有表单数据的对象
    $scope.userData = {};
  
    // 调用显示加载图标的变量
    $scope.loading = true;
  
    // 先获取所有的评论，然后绑定它们到$scope.users对象     // 使用服务中定义的函数
    // GET ALL USERS ====================================================
    User.get()
      .success(function(data) {
        $scope.users = data;
        $scope.loading = false;
      });

   // 处理提交表单的函数
    // SAVE A COMMENT ======================================================
    $scope.submitUser = function() {
      $scope.loading = true;
  
      // 保存评论。在表单间传递评论
      // 使用在服务中创建的函数
      User.save($scope.userData)
        .success(function(data) {
  
          // 如果成功，我们需要刷新评论列表
          User.get()
            .success(function(getData) {
              $scope.users = getData;
              $scope.loading = false;
            });
  
        })
        .error(function(data) {
          console.log(data);
        });
    };




});



