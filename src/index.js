angular
  .module('app', ['ui.router', 'ngAnimate', 'ngMaterial', 'ngResource', 'pascalprecht.translate', 'ngCookies', 'ngSanitize', 'ngCovervid', '720kb.socialshare', 'naif.base64', 'ngMap']) // 'angular-magnificent',
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

  })
  .component('terresMenu', {
    templateUrl: 'app/terresmenu.html',
    controller: 'menuCtrl'
  })
  .component('terresMenuMobile', {
    templateUrl: 'app/terresmenumobile.html',
    controller: 'menuMobileCtrl'
  });
