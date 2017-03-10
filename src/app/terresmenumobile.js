angular
  .module('app')
  .controller('menuMobileCtrl', function ($scope, $rootScope, $translate, $mdDialog, $http, $mdToast, $mdSidenav, $window) {
    $scope.docs = function () {
      $window.location.href = '/docs';
    };

    $scope.goJury = function (url) {
      $window.location.href = 'http://terres.info/docs/' + $translate.use() + '/' + url;
    };

    $scope.toggleRight = function () {
      $mdSidenav('right').toggle();
    };

    $scope.close = function () {
      $mdSidenav('right').close();
    };

    function rightMenu() {
      if ($mdSidenav('right').isOpen()) {
        $mdSidenav('right').close();
      }
    }

    $scope.jury = {
      0: {
        nom: "Swen Waterreus",
        url: "swen-waterreus",
        enabled: false
      },
      1: {
        nom: "Dorothée Adam",
        url: "dorothee-adam",
        enabled: false
      },
      2: {
        nom: "Alejandra Medina",
        url: "alejandra-medina",
        enabled: false
      },
      3: {
        nom: "George Pessis",
        url: "georges-pessis",
        enabled: true
      },
      4: {
        nom: "Kymisha Carey",
        url: "kymisha_carey",
        enabled: false
      },
      5: {
        nom: "Hugo Marcos",
        url: "#",
        enabled: true
      },
      6: {
        nom: "Joanna Pardos",
        url: "#",
        enabled: true
      }
    };

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
      $rootScope.$broadcast('langChange', $scope.userLang.toLowerCase());
    };

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
              console.log(data);
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
        rightMenu();
        console.log('You cancelled the dialog.');
      });
    };

    function NewsCtrl($scope, $mdDialog) {
      $scope.cancel = function () {
        $mdDialog.cancel();
        rightMenu();
      };

      $scope.subscribe = function () {
        var persona = {
          name: $scope.newsName,
          surname: $scope.newsSurname,
          mail: $scope.newsEmail,
          lang: $translate.use()
        };
        $mdDialog.hide(persona);
        rightMenu();
      };
    }
  });
