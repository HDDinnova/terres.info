angular
  .module('app')
  .controller('Terreslab', function ($scope, $translate) {
    $scope.lang = $translate.use();
    $scope.$on('langChange', function (event, lang) {
      $scope.lang = lang;
    });
  });
