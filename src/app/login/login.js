angular
  .module('app')
  .controller('LoginCtrl', function ($scope, $window, $state, AuthenticationSvc) {
    $scope.formLogin = {};
    $scope.formlogin = function () {
      AuthenticationSvc.login($scope.formLogin)
      .then(function (result) {
        if (result.status === 202) {
          $state.go('chgPassword');
        } else if (result.status === 200) {
          $window.location.href = '/intranet';
        }
      }, function (error) {
        $window.alert(error.message);
        console.log(error);
      });
    };
  });
