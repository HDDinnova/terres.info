angular
  .module('app')
  .controller('regTf', function ($scope, $http, $mdToast, $translate, Cities, EarlyFee) {
    $scope.countries = Cities.query();
    $scope.formData = {};
    $scope.formData.section = '1';
    $scope.formData.nfilms = 1;
    $scope.updateImport = function () {
      var im;
      if ($scope.formData.section === '1') {
        if (EarlyFee.state) {
          im = 90;
        } else {
          im = 60;
        }
      } else {
        im = 150;
      }
      $scope.preu = $scope.formData.nfilms * im + ' €';
    };
    $scope.updateImport();
    $scope.processTf = function () {
      $scope.formData.import = $scope.preu;
      $scope.formData.date = new Date();
      $http.post('/api/newCompetitor', $scope.formData)
      .success(function (data) {
        if (data === 'emailOK') {
          $translate('REGISTER.SATISFACTORY').then(function (value) {
            $mdToast.show(
              $mdToast.simple()
                .textContent(value)
                .position('top right')
                .hideDelay(3000)
            );
          });
        }
      });
    };
  });
