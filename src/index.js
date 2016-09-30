angular
  .module('app', ['ui.router', 'ngAnimate', 'ngMaterial', 'angular-magnificent', 'pascalprecht.translate', 'ngCookies', 'ngSanitize', 'ngCovervid'])
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
  .controller('menuCtrl', function ($scope, $translate, $timeout, $mdDialog, $http, $mdToast) {
    $scope.langs = [
      'CA',
      'ES',
      'EN'
    ];
    $scope.isCurrentLang = function (id) {
      if (id === $translate.use()) {
        return true;
      }
      return false;
    };
    $scope.selOpt = $translate.use();
    $scope.setLang = function () {
      $translate.use($scope.userLang.toLowerCase());
    };
    $timeout(function () {
      angular.element(document.querySelector('terres-menu')).addClass('actiu');
    }, 3000);

    // Subscribe to Newsletter
    $scope.showNewsletter = function (ev) {
      $mdDialog.show({
        controller: NewsCtrl,
        templateUrl: 'app/newsletter/subscribe.html',
        parent: angular.element(document.body),
        targetEvent: ev,
        clickOutsideToClose: false,
        fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
      })
      .then(function (user) {
        $http.post('/mapi/subscribe.php', user, null)
          .success(function (data) {
            if (data === "subscribed") {
              $translate('NEWSLETTER.ALREADY').then(function (value) {
                $mdToast.show(
                  $mdToast.simple()
                    .textContent(value)
                    .position('top right')
                    .hideDelay(3000)
                );
              });
            } else {
              $translate('NEWSLETTER.THANKYOU').then(function (value) {
                $mdToast.show(
                  $mdToast.simple()
                    .textContent(value)
                    .position('top right')
                    .hideDelay(3000)
                );
              });
            }
          })
          .error(function (data) {
            console.log(data);
          });
      }, function () {
        console.log('You cancelled the dialog.');
      });
    };

    function NewsCtrl($scope, $mdDialog) {
      $scope.cancel = function () {
        $mdDialog.cancel();
      };

      $scope.subscribe = function () {
        var persona = {
          name: $scope.newsName,
          surname: $scope.newsSurname,
          mail: $scope.newsEmail
        };
        $mdDialog.hide(persona);
      };
    }
  })
  .controller('footerCtrl', function ($scope) {
    $scope.any = new Date();
  });
