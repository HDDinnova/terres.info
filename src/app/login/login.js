angular
  .module('app')
  .controller('LoginCtrl', function ($scope, $window, $state, AuthenticationSvc) {
    $scope.formLogin = {};
    $scope.formlogin = function () {
      AuthenticationSvc.login($scope.formLogin)
      .then(function (result) {
        if (result.status === 202){
          $state.go('first_enter');
        } else if (result.status === 200) {
          $state.go('intranet');
        }
      }, function (error) {
        $window.alert(error.message);
        console.log(error);
      });
    };
  });
