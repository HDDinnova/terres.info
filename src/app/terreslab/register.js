angular
  .module('app')
  .controller('tlregCtrl', function ($scope, $http, $translate, $state, Cities, $mdToast) {
    $scope.countries = Cities.query();
    $scope.formData = {};

    $scope.processCf = function () {
      $http.post('/api/regTerreslab', $scope.formData)
      .success(function (data) {
        if (data === '200') {
          $translate('REGISTER.SATISFACTORY').then(function (value) {
            $mdToast.show(
              $mdToast.simple()
                .textContent(value)
                .position('top right')
                .hideDelay(6000)
            );
          });
          $state.go('terreslab');
        }
      });
    };
  });
