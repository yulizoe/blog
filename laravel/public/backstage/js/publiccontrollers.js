/**
 * 这里是博客列表模块
 * @type {[type]}
 */

publicModule.controller('publicCtrl', function($scope, $http, $state, $stateParams, Comment, Bloglist ,User ,Admin) {


    // 处理删除评论的函数
    // DELETE A COMMENT ====================================================
    $scope.deleteComment = function(id) {
      $scope.loading = true; 
  
      // 使用在服务中创建的函数
      Comment.destroy(id)
        .success(function(data) {
  
          // 如果成功，我们需要刷新评论列表
          Comment.get()
            .success(function(getData) {
              $scope.comments = getData;
              $scope.loading = false;
            });
  
        });
    };

// 处理删除博客的函数
    // DELETE A Bloglist ====================================================
    $scope.deleteBloglist = function(id) {
      $scope.loading = true; 
  
      // 使用在服务中创建的函数
      Bloglist.destroy(id)
        .success(function(data) {
  
          // 如果成功，我们需要刷新博客列表
          Bloglist.get()
            .success(function(getData) {
              $scope.bloglists = getData;
              $scope.loading = false;
            });
  
        });
    };

    // 处理删除用户的函数
    // DELETE A Bloglist ====================================================
    $scope.deleteUser = function(id) {
      $scope.loading = true; 
  
      // 使用在服务中创建的函数
      User.destroy(id)
        .success(function(data) {
  
          // 如果成功，我们需要刷新用户列表
          User.get()
            .success(function(getData) {
              $scope.users = getData;
              $scope.loading = false;
            });
  
        });
    };



    $scope.filterOptions = {
        filterText: "",
        useExternalFilter: true
    };
    $scope.totalServerItems = 0;
    $scope.pagingOptions = {
        pageSizes: [5, 10, 20],
        pageSize: 5,
        currentPage: 1
    };
    $scope.setPagingData = function(data, page, pageSize) {
        var pagedData = data.slice((page - 1) * pageSize, page * pageSize);
        $scope.management = pagedData;
        $scopehttp://localhost:8000/#/api/management/0.totalServerItems = data.length;
        if (!$scope.$$phase) {
            $scope.$apply();
        }
    };

// 这里可以根据路由上传递过来的blogType参数加载不同的数据
    console.log($stateParams);
    $scope.getPagedDataAsync = function(pageSize, page, searchText) {
        setTimeout(function() {
            var data;
            if (searchText) {
                var ft = searchText.toLowerCase();
                $http.get('/api/management/'+$stateParams.management)
                    .success(function(largeLoad) {
                        data = largeLoad.filter(function(item) {
                            return JSON.stringify(item).toLowerCase().indexOf(ft) != -1;
                        });
                        $scope.setPagingData(data, page, pageSize);
                         
                    });
            } else {
                $http.get('/api/management/'+$stateParams.management)
                    .success(function(largeLoad) {
                        $scope.setPagingData(largeLoad, page, pageSize);

                    });
            }
        }, 100);
    };


    $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);

    $scope.$watch('pagingOptions', function(newVal, oldVal) {
        if (newVal !== oldVal && newVal.currentPage !== oldVal.currentPage) {
            $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
        }
    }, true);
    $scope.$watch('filterOptions', function(newVal, oldVal) {
        if (newVal !== oldVal) {
            $scope.getPagedDataAsync($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage, $scope.filterOptions.filterText);
        }
    }, true);

//三张不同的表格
if($stateParams.management==0){ //用户管理
    $scope.gridOptions = {
        data: 'management',
        rowTemplate: '<div style="height: 100%"><div ng-style="{ \'cursor\': row.cursor }" ng-repeat="col in renderedColumns" ng-class="col.colIndex()" class="ngCell ">' +
            '<div class="ngVerticalBar" ng-style="{height: rowHeight}" ng-class="{ ngVerticalBarVisible: !$last }"> </div>' +
            '<div ng-cell></div>' +
            '</div></div>',
        multiSelect: false,
        enableCellSelection: true,
        enableRowSelection: false,
        enableCellEdit: true,
        enablePinning: true,
        columnDefs: 
        [{
            field: 'id',
            displayName: '序号',
            width: 60,
            pinnable: false,
            sortable: false
        }, {
            field: 'name',
            displayName: '用户名',
            enableCellEdit: true
        }, {
            field: 'email',
            displayName: '邮箱',
            enableCellEdit: true,
            width: 220
        }, {
            field: 'updated_at',
            displayName: '注册时间',
            enableCellEdit: true,
            width: 220,
           
        }, {
            field: 'id',
            displayName: '删除',
            enableCellEdit: false,
            sortable: false,
            pinnable: false,
            cellTemplate: '<div><a href="javascript:void(0);"  ng-click="deleteUser(row.getProperty(col.field))">删除</a></div>'
        }],
        enablePaging: true,
        showFooter: true,
        totalServerItems: 'totalServerItems',
        pagingOptions: $scope.pagingOptions,
        filterOptions: $scope.filterOptions
    };

}else if($stateParams.management==1){  //博客管理

$scope.gridOptions = {
        data: 'management',
        rowTemplate: '<div style="height: 100%"><div ng-style="{ \'cursor\': row.cursor }" ng-repeat="col in renderedColumns" ng-class="col.colIndex()" class="ngCell ">' +
            '<div class="ngVerticalBar" ng-style="{height: rowHeight}" ng-class="{ ngVerticalBarVisible: !$last }"> </div>' +
            '<div ng-cell></div>' +
            '</div></div>',
        multiSelect: false,
        enableCellSelection: true,
        enableRowSelection: false,
        enableCellEdit: true,
        enablePinning: true,
        columnDefs: 
        [{
            field: 'id',
            displayName: '序号',
            width: 60,
            pinnable: false,
            sortable: false
        }, {
            field: 'btitle',
            displayName: '博客标题',
            enableCellEdit: true
        }, {
            field: 'bcontent',
            displayName: '博客内容',
            enableCellEdit: true,
            width: 220
        }, {
            field: 'bclass',
            displayName: '分类',
            enableCellEdit: true,
            width: 120
        },{
            field: 'author',
            displayName: '作者',
            enableCellEdit: true,
            width: 120
        }, {
            field: 'id',
            displayName: '详情',
            enableCellEdit: false,
            sortable: false,
            pinnable: false,
            cellTemplate: '<div><a ui-sref="blogdetail({id:row.getProperty(col.field)})" id="{{row.getProperty(col.field)}}">查看</a></div>'
        }, {
            field: 'id',
            displayName: '删除',
            enableCellEdit: false,
            sortable: false,
            pinnable: false,
            cellTemplate: '<div><a href="javascript:void(0);"  ng-click="deleteBloglist(row.getProperty(col.field))">删除</a></div>'
        }],
        enablePaging: true,
        showFooter: true,
        totalServerItems: 'totalServerItems',
        pagingOptions: $scope.pagingOptions,
        filterOptions: $scope.filterOptions
    };

}else if($stateParams.management==2){  //评论管理

$scope.gridOptions = {
        data: 'management',
        rowTemplate: '<div style="height: 100%"><div ng-style="{ \'cursor\': row.cursor }" ng-repeat="col in renderedColumns" ng-class="col.colIndex()" class="ngCell ">' +
            '<div class="ngVerticalBar" ng-style="{height: rowHeight}" ng-class="{ ngVerticalBarVisible: !$last }"> </div>' +
            '<div ng-cell></div>' +
            '</div></div>',
        multiSelect: false,
        enableCellSelection: true,
        enableRowSelection: false,
        enableCellEdit: true,
        enablePinning: true,
        columnDefs: 
        [{
            field: 'id',
            displayName: '序号',
            width: 60,
            pinnable: false,
            sortable: false
        }, {
            field: 'author',
            displayName: '作者',
            enableCellEdit: true,
            
        }, {
            field: 'ccontent',
            displayName: '评论内容',
            enableCellEdit: true,
            width: 220
        }, {
            field: 'bid',
            displayName: '被评论的博客id',
            enableCellEdit: true,
            width: 120
        }, {
            field: 'updated_at',
            displayName: '评论时间',
            enableCellEdit: true,
            width: 200
        }, {
            field: 'id',
            displayName: '详情',
            enableCellEdit: false,
            sortable: false,
            pinnable: false,
            cellTemplate: '<div><a ui-sref="commentdetail({id:row.getProperty(col.field)})" id="{{row.getProperty(col.field)}}">查看</a></div>'
        }, {
            field: 'id',
            displayName: '删除',
            enableCellEdit: false,
            sortable: false,
            pinnable: false,
            cellTemplate: '<div><a href="javascript:void(0);"  ng-click="deleteComment(row.getProperty(col.field))">删除</a></div>'
        }],
        enablePaging: true,
        showFooter: true,
        totalServerItems: 'totalServerItems',
        pagingOptions: $scope.pagingOptions,
        filterOptions: $scope.filterOptions
    };

}


});





