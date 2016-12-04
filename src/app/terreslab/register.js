angular
  .module('app')
  .controller('tlregCtrl', function ($scope, $http, $translate, $state, Cities) {
    $scope.countries = Cities.query();
    $scope.formData = {};
    $scope.registered = false;
    $scope.allready = false;
    $scope.unknown = false;

    $scope.processTL = function () {
      $http.post('/api/regTerreslab', $scope.formData)
      .success(function (data) {
        switch (data.status) {
          case 200:
            $scope.registered = true;
            if ($scope.formData.categoria === 'periodista') {
              $state.go('tlpay');
            }
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
