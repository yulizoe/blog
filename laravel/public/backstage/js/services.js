//请尝试把BookListCtrl中加载博客列表数据的部分抽出来作为一个服务
var publicModule = angular.module("publicModule", []);
var blogListModule = angular.module("blogListModule", []);
var commentModule = angular.module("commentModule", []);  
var userModule = angular.module("userModule", []);
var adminModule = angular.module("adminModule", []);
var loginModule = angular.module("loginModule", []);
 
publicModule.factory('Comment', function($http) {
  
    return {
      // get all the comments
      get : function() {
        return $http.get('/api/management/2');
      },
  
      // save a comment (pass in comment data)
      save : function(commentData) {
        return $http({
          method: 'POST',
          url: '/api/management/2',
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          data: $.param(commentData)
        });
      },
  
      // destroy a comment
      destroy : function(id) {
        return $http.delete('/api/comments/' + id);
      },
   // show a comment
      show : function(id) {
        return $http.get('/api/commentdetail/' + id);
      }
    }
    
  
  }).factory('Bloglist', function($http) {
  
    return {
      // get all the bloglists
      get : function() {
        return $http.get('/api/management/1');
      },
  
      // save a bloglist (pass in bloglist data)
      save : function(bloglistData) {
        return $http({
          method: 'POST',
          url: '/api/management/1',
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          data: $.param(bloglistData)
        });
      },
  
      // destroy a bloglist
      destroy : function(id) {
        return $http.delete('/api/bloglists/' + id);
      },

        show : function(id) {
        return $http.get('/api/blogdetail/' + id);
      }
    }
  
  }).factory('User', function($http) {
  
    return {
      // get all the users
      get : function() {
        return $http.get('/api/management/0');
      },
  
      // save a user (pass in user data)
      save : function(userData) {
        return $http({
          method: 'POST',
          url: '/api/management/0',
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          data: $.param(userData)
        });
      },
  
      // destroy a user
      destroy : function(id) {
        return $http.delete('/api/users/' + id);
      }
    }
  
  }).factory('Admin', function($http) {
  
    return {
      // get all the users
      get : function() {
        return $http.get('/api/admins');
      }

    }
  
  });


