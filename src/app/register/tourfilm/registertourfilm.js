angular
  .module('app')
  .controller('regTf', function ($scope, $http, $mdToast, $translate, $state, $stateParams, Cities) {
    $translate('TOURFILM').then(function (value) {
      $scope.textCat = value;
    });
    $scope.countries = Cities.query();
    $scope.formData = {};
    $scope.formData.nfilms = 1;
    $scope.formData.valCat = 1;
    $scope.processTf = function () {
      $http.post('/api/newCompetitor', $scope.formData)
      .success(function (data) {
        console.log(data);
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
