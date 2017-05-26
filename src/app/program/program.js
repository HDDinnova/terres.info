angular
  .module('app')
  .controller('programCtrl', function ($scope, $http, $timeout) {
    $scope.popup = true;
    $timeout(function () {
      $scope.popup = false;
    }, 7000);

    $http.get('bloc1sala1.json')
    .then(function (res) {
      $scope.films1_1 = res.data;
    });
    $http.get('bloc1sala2_1.json')
    .then(function (res) {
      $scope.films1_2 = res.data;
    });
    $http.get('bloc1sala2_2.json')
    .then(function (res) {
      $scope.films1_3 = res.data;
    });
    $http.get('bloc3sala1.json')
    .then(function (res) {
      $scope.films3_1 = res.data;
    });
    $http.get('bloc4sala2_1.json')
    .then(function (res) {
      $scope.films4_1 = res.data;
    });
    $http.get('bloc4sala2_2.json')
    .then(function (res) {
      $scope.films4_2 = res.data;
    });
    $http.get('bloc4sala2_3.json')
    .then(function (res) {
      $scope.films4_3 = res.data;
    });
  });
