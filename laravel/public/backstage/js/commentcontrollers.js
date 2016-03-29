commentModule.controller('commentCtrl', function($rootScope, $scope, $http, $state, $stateParams,$location, Comment) {
  
    // 持有新评论所有表单数据的对象
    $scope.commentData = {};
  
    // 调用显示加载图标的变量
    $scope.loading = true;
  
    // 先获取所有的评论，然后绑定它们到$scope.comments对象     // 使用服务中定义的函数
    // GET ALL COMMENTS ====================================================
    Comment.get()
      .success(function(data) {
        $scope.comments = data;
        $scope.loading = false;
      });

   
        $scope.showComment=function(id){
        
          id=$('#oid').val();
          Comment.show(id)
          .success(function(data) {
          $scope.comments = data;
       
         });

        };
  
       
  
  

   // 处理提交表单的函数
    // SAVE A COMMENT ======================================================
    $scope.submitComment = function() {
      $scope.loading = true;
  
      // 保存评论。在表单间传递评论
      // 使用在服务中创建的函数
      Comment.save($scope.commentData)
        .success(function(data) {
  
          // 如果成功，我们需要刷新评论列表
          Comment.get()
            .success(function(getData) {
              $scope.comments = getData;
              $scope.loading = false;
            });
  
        })
        .error(function(data) {
          console.log(data);
        });
    };

 if($rootScope.login==false){
    right.innerHTML='您还未登录！'
    $location.path('/');
  }

    

});