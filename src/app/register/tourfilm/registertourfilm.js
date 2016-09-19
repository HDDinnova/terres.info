angular
  .module('app')
  .controller('regTf', function ($scope) {
    $scope.formData = {};
    $scope.formData.section = 'terres';
    $scope.formData.nfilms = 1;
    $scope.updateImport = function () {
      var im;
      var data = new Date();
      var dataFinal = new Date('2016-12-31');
      if ($scope.formData.section === 'terres') {
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
      console.log($scope.formData);
    };
  });
