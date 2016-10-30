angular
  .module('app')
  .controller('regCf', function ($scope, $http, $mdToast, $translate, $state, $stateParams, Cities) {
    $translate('CORPORATE').then(function (value) {
      $scope.textCat = value;
    });
    $scope.countries = Cities.query();
    $scope.formData = {};
    $scope.formData.nfilms = 1;
    $scope.formData.valCat = 3;
    $scope.processCf = function () {
      $http.post('/api/newCompetitor', $scope.formData)
      .success(function (data) {
        if (data === 'emailOK') {
          $translate('REGISTER.SATISFACTORY').then(function (value) {
            $mdToast.show(
              $mdToast.simple()
                .textContent(value)
                .position('top right')
                .hideDelay(6000)
            );
          });
          $state.go('login');
        }
      });
    };
  });
