angular
  .module('app')
  .controller('Sustain', function ($scope, $http, $state, Cities) {
    $http.get('/api/numSustain')
    .success(function (data) {
      console.log(data);
      if (parseInt(data.assistants, 0) >= 50) {
        $state.go('sustainableSorry');
      }
    });
    $scope.countries = Cities.query();
    $scope.formData = {};
    $scope.registered = false;
    $scope.allready = false;
    $scope.unknown = false;

    $scope.processSUST = function () {
      $http.post('/api/regSustain', $scope.formData)
      .success(function (data) {
        console.log(data);
        switch (data.status) {
          case 200:
            $state.go('sustainableOk');
            break;
          case 404:
            $state.go('sustainableSorry');
            break;
          case 400:
            $state.go('sustainableSorry');
            break;
          default:
            console.log(data);
        }
      });
    };
  });
