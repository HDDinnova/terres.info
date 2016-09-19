angular
  .module('app')
  .controller('RegisterCtrl', function ($scope) {
    $scope.resources = [
      './video/fonsmenu_selecciocategoria_ok.webm',
      '*.ogv',
      '*.mp4'
    ];
    $scope.poster = 'http://placehold.it/2000&text=you%20may%20want%20to%20have%20a%20poster';
    $scope.fullScreen = true;
    $scope.muted = true;
    $scope.zIndex = '0';
    $scope.playInfo = {};
    $scope.pausePlay = false;
  }
);
