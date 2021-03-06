angular
  .module('app')
  .controller('tlregOnedayOfferCtrl', function ($scope, $http, Cities, $window) {
    $scope.countries = Cities.query();
    $scope.formData = {};
    $scope.registered = false;
    $scope.allready = false;
    $scope.unknown = false;

    $scope.processTL = function () {
      $http.post('/api/regTerreslabOneday', $scope.formData)
      .success(function (data) {
        switch (data.status) {
          case 200:
            $scope.registered = true;
            $window.location.href = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HT7PW9K8VAEXS';
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
