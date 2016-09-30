angular
  .module('app')
  .controller('regTf', function ($scope, $http) {
    $scope.formData = {};
    $scope.formData.section = '1';
    $scope.formData.nfilms = 1;
    $scope.updateImport = function () {
      var im;
      var data = new Date();
      var dataFinal = new Date('2016-12-31');
      if ($scope.formData.section === '1') {
        if (data > dataFinal) {
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
        console.log(data);
      });
    };
    $http.get('https://restcountries.eu/rest/v1/region/europe')
    .then(function (response) {
      $scope.countries = response.data;
    });
  });
