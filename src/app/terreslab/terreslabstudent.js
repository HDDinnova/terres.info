angular
  .module('app')
  .controller('tlregStudentCtrl', function ($scope, $http, $state, Cities) {
    $scope.countries = Cities.query();
    $scope.formData = {};
    $scope.registered = false;
    $scope.allready = false;
    $scope.unknown = false;

    $scope.processTLStudent = function () {
      console.log($scope.formData);
      $http.post('/api/regTerreslabStudent', $scope.formData)
      .success(function (data) {
        switch (data.status) {
          case 200:
            $state.go('terreslabstudentok');
            break;
          case 404:
            $scope.allready = true;
            break;
          case 400:
            $scope.unknown = true;
            break;
          default:
            console.log(data);
        }
      });
    };
  });
