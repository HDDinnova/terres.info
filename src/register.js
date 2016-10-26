angular
  .module('app')
  .controller('RegisterCtrl', function ($scope, $rootScope) {
    $rootScope.metaDescription = "terres Catalunya International Eco & Tourism Film Festival";
    $rootScope.metaKeywords = "film,festival,nature,corporate,terres,tortosa,ebre,delta,register,torufilm,documentary";
    $rootScope.metaOGsite = "terres Catalunya International Eco & Tourism Film Festival";
    $rootScope.metaOGtitle = "Register to terres Catalunya International Eco & Tourism Film Festival";
    $rootScope.metaOGurl = "http://terres.info/register";
    $rootScope.metaOGimg = "http://terres.info/img/tourfilm.jpg";
    $rootScope.metaOGimgType = "image/jpg";

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
