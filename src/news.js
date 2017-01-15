angular
  .module('app')
  .controller('NewsCtrl', function ($scope, $http, $translate, $rootScope) {
    var url = 'news/' + $translate.use() + '.json';
    $http.get(url).success(function (data) {
      $scope.news = data;
    });
    $rootScope.$on('langChange', function (e, langKey) {
      var url = 'news/' + langKey + '.json';
      $http.get(url).success(function (data) {
        $scope.news = data;
      });
    });

    var urlapi = 'api/news/' + $translate.use();
    $http.get(urlapi).success(function (data) {
      console.log(data);
    });
  })
  .controller('NewsPostCtrl', function ($scope, $stateParams, $http, $translate, $rootScope, $location) {
    $scope.socialurl = 'http://terres.info' + $location.path();
    var url = 'news/' + $translate.use() + '.json';
    $http.get(url).success(function (data) {
      $scope.post = data[$stateParams.id];
    });
    $rootScope.$on('langChange', function (e, langKey) {
      var url = 'news/' + langKey + '.json';
      $http.get(url).success(function (data) {
        $scope.post = data[$stateParams.id];
      });
    });
  });
