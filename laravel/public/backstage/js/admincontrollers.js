/**
 * 这里是博客列表模块
 * @type {[type]}
 */

adminModule.controller('adminCtrl', function($rootScope, $scope, $location , $http, $state, $stateParams, Admin ) {

  
    // 持有新评论所有表单数据的对象
    $scope.adminData = {};
  
    // 调用显示加载图标的变量
    $scope.loading = true;
  
    // 先获取所有的评论，然后绑定它们到$scope.comments对象     // 使用服务中定义的函数
    // GET ALL COMMENTS ====================================================
    Admin.get()
      .success(function(data) {
        $scope.admins = data;
        $scope.loading = false;
      });
      //全局监控后台用户有没有登录
     $rootScope.login=false;

    $scope.check=function(admins){ 
        for(var i=0;i<admins.length;i++){
                if(($("#user").val()==admins[i].email)&&($("#password").val()==admins[i].password)){   
                    alert('登录成功');
                    $location.path('/api/management/0');     
                     $rootScope.login=true;
                }
                else{
                    alert('用户名或者密码错误');
                    
                   $location.path('/'); 
                }

            }
    };

       // $scope.logout=function(){ 
        
       //   $location.path('/');   
       //  };


});



loginModule.controller('loginCtrl', function($rootScope, $scope, $location , $http, $state, $stateParams, Admin ) {

 if($rootScope.login==false){
    right.innerHTML='您还未登录！'
    $location.path('/');
  }


 $scope.logout=function(){ 
        
         $location.path('/');  
         $rootScope.login=false; 
        };


});