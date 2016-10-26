angular
  .module('app', ['ui.router', 'ngAnimate', 'ngMaterial', 'ngResource', 'angular-magnificent', 'pascalprecht.translate', 'ngCookies', 'ngSanitize', 'ngCovervid', '720kb.socialshare'])
  .config(function ($mdThemingProvider, $translateProvider) {
    $mdThemingProvider.theme('default')
      .primaryPalette('blue-grey', {
        'default': '400',
        'hue-1': '50'
      })
      .accentPalette('light-blue');
    $translateProvider
      .registerAvailableLanguageKeys(['en', 'es', 'ca'], {
        'en_*': 'en',
        'es_*': 'es',
        'ca_*': 'ca'
      })
      .determinePreferredLanguage()
      .fallbackLanguage('en')
      .useLocalStorage()
      .useStaticFilesLoader({
        prefix: 'i18n/locale-',
        suffix: '.json'
      })
      .useSanitizeValueStrategy(null);
  })
  .controller('footerCtrl', function ($scope) {
    $scope.any = new Date();
  })
  .controller('AppCtrl', function () {
    // $scope.metaDescription = "terres Catalunya International Eco & Tourism Film Festival";
    // $scope.metaKeywords = "film,festival,nature,corporate,terres,tortosa,ebre,delta";
    // $scope.metaOGsite = "terres Catalunya International Eco & Tourism Film Festival";
    // $scope.metaOGtitle = "terres Catalunya International Eco & Tourism Film Festival, from may 31th to june 3rd at 2017";
    // $scope.metaOGurl = "http://terres.info";
    // $scope.metaOGimg = "http://terres.info/img/logo-terres.png";
    // $scope.metaOGimgType = "image/png";
  })
  .component('terresMenu', {
    templateUrl: 'app/terresmenu.html',
    controller: 'menuCtrl'
  });
