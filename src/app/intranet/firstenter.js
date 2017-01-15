angular
  .module('app')
  .controller('firstenterCtrl', function ($scope, $window, $http, $state) {
    var userInfo = {};
    var errorCode = {};
    $scope.formFE = {};
    $scope.formfe = function () {
      $http.post("/api/firstenter", $scope.formFE)
      .then(function (result) {
        console.log(result);
        if (result.data.status === 200) {
          userInfo = {
            status: result.data.status,
            message: result.data.message,
            id: result.data.email
          };
          $window.sessionStorage.userInfo = JSON.stringify(userInfo);
          $window.location.href = '/intranet';
        } else {
          errorCode = {
            status: result.data.status,
            message: result.data.message
          };
          /*
            Implementar error al canviar contrasenya
          */
          console.log(errorCode);
        }
      });
    };
  });
