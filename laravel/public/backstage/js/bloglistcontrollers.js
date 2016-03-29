/**
 * 这里是博客列表模块
 * @type {[type]}
 */

blogListModule.controller('blogListCtrl', function($rootScope, $scope, $http, $state, $stateParams,$location, Bloglist ) {

 // 持有新评论所有表单数据的对象
    $scope.bloglistData = {};
  
    // 调用显示加载图标的变量
    $scope.loading = true;
  
    // 先获取所有的评论，然后绑定它们到$scope.bloglists对象     // 使用服务中定义的函数
    // GET ALL BLOGLISTS ====================================================
    Bloglist.get()
      .success(function(data) {
        $scope.bloglists = data;
        $scope.loading = false;
      });

 $scope.showBloglist=function(id){
        
          id=$('#oid').val();
          Bloglist.show(id)
          .success(function(data) {
          $scope.bloglists = data;
       
         });

        };

   // 处理提交表单的函数
    // SAVE A COMMENT ======================================================
    $scope.submitBloglist = function() {
      $scope.loading = true;
  
      // 保存评论。在表单间传递评论
      // 使用在服务中创建的函数
      Bloglist.save($scope.bloglistData)
        .success(function(data) {
  
          // 如果成功，我们需要刷新评论列表
          Bloglist.get()
            .success(function(getData) {
              $scope.bloglists = getData;
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



