angular
  .module('app')
  .controller('competitionCtrl', function ($scope, Films) {
    $scope.films = Films.query();
  });
