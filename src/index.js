var english = {
  LANGUAGE: 'Language',
  REGISTRATION_MENU: 'Registration',
  PARTNERS_MENU: 'Partners',
  NEWS_MENU: 'News',
  ABOUT_MENU: 'About Us',
  NEWSLETTER_MENU: 'Newsletter',
  TITLE_MAIN: 'TORTOSA / May 31th - June 3rd 2017',
  DEVELOPED_FOOTER: 'Developed by',
  TOURFILM: 'tourfilm',
  DOCUMENTARY: 'Documentary',
  CATEGORY: 'Category',
  SECTION: 'Section',
  REGISTER: {
    NEW: 'Register new film',
    AMOUNT: 'Amount',
    N_FILMS: 'Number of films',
    G_INF: 'General Information',
    P_INF: 'Participant information',
    P_NAME: 'Name (Contact person)',
    C_NAME: 'Company / Entity (For invoice)',
    ADDR: 'Address',
    ZIP: 'Zip code',
    CITY: 'City',
    VAT: 'Tax number / VAT (For invoice)',
    PHONE: 'Phone number',
    EMAIL: 'E-mail',
    WEB: 'Website',
    CATALA: 'Catalan language production',
    STATE: 'National',
    INTERNATIONAL: 'International',
    SINGLE: 'Single',
    CAMPAIGN: 'Campaign',
    TERART: 'Terres + '
  },
  NEWSLETTER: {
    THANKS: 'Thank you for your subscription to our newsletter',
    EMAIL: 'Please, enter your email address'
  }
};

var spanish = {
  LANGUAGE: 'Idioma',
  REGISTRATION_MENU: 'Registro',
  PARTNERS_MENU: 'Patrocinadores',
  NEWS_MENU: 'Notícias',
  ABOUT_MENU: 'Quienes somos',
  NEWSLETTER_MENU: 'Newsletter',
  TITLE_MAIN: 'TORTOSA / 31 de mayo - 3 de junio de 2017',
  DEVELOPED_FOOTER: 'Desarrollado por',
  TOURFILM: 'Film turístico',
  DOCUMENTARY: 'Documental',
  CATEGORY: 'Categoria',
  SECTION: 'Sección',
  REGISTER: {
    NEW: 'Registro de nuevo film',
    AMOUNT: 'Importe',
    N_FILMS: 'Núm. de films',
    G_INF: 'Información general',
    P_INF: 'Información del participante',
    P_NAME: 'Nombre (Persona de contacto)',
    C_NAME: 'Empresa / Entidad (Para factura)',
    ADDR: 'Dirección',
    ZIP: 'Código postal',
    CITY: 'Municipio',
    VAT: 'NIF (Para factura)',
    PHONE: 'Teléfono',
    EMAIL: 'Correo electrónico',
    WEB: 'Página web',
    CATALA: 'Producción en lengua catalana',
    STATE: 'Estatal',
    INTERNATIONAL: 'Internacional',
    SINGLE: 'Senzillo',
    CAMPAIGN: 'Campaña',
    TERART: 'Terres + '
  },
  NEWSLETTER: {
    THANKS: 'Gracias per suscribir-te a la Newsletter',
    EMAIL: 'Por favor, escribe tu dirección de email'
  }
};

var catalan = {
  LANGUAGE: 'Idioma',
  REGISTRATION_MENU: 'Registre',
  PARTNERS_MENU: 'Patrocinadors',
  NEWS_MENU: 'Notícies',
  ABOUT_MENU: 'Qui som',
  NEWSLETTER_MENU: 'Newsletter',
  TITLE_MAIN: 'TORTOSA / 31 de maig - 3 de juny de 2017',
  DEVELOPED_FOOTER: 'Desenvolupat per',
  TOURFILM: 'film turístic',
  DOCUMENTARY: 'Documental',
  CATEGORY: 'Categoria',
  SECTION: 'Secció',
  REGISTER: {
    NEW: 'Registre de nou film',
    AMOUNT: 'Import',
    N_FILMS: 'Nombre de films',
    G_INF: 'Informació general',
    P_INF: 'Informació del participant',
    P_NAME: 'Nom (Persona de contacte)',
    C_NAME: 'Empresa / Entitat (Per a factura)',
    ADDR: 'Adreça',
    ZIP: 'Codi postal',
    CITY: 'Població',
    VAT: 'NIF (Per a factura)',
    PHONE: 'Telèfon',
    EMAIL: 'Correu electrònic',
    WEB: 'Pàgina web',
    CATALA: 'Producció en llengua catalana',
    STATE: 'Estatal',
    INTERNATIONAL: 'Internacional',
    SINGLE: 'Senzill',
    CAMPAIGN: 'Campanya',
    TERART: 'Terres + '
  },
  NEWSLETTER: {
    THANKS: 'Gràcies per subscriure\'t a la Newsletter',
    EMAIL: 'Si us plau, escriu la teva adreça d\'email'
  }
};

angular
  .module('app', ['ui.router', 'ngAnimate', 'ngMaterial', 'angular-magnificent', 'pascalprecht.translate', 'ngSanitize'])
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
      .translations('en', english)
      .translations('es', spanish)
      .translations('ca', catalan)
      .useSanitizeValueStrategy('escape');
  })
  .controller('menuCtrl', function ($scope, $translate, $timeout, $mdDialog) {
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
      .then(function (email) {
        console.log(email);
      }, function () {
        console.log('You cancelled the dialog.');
      });
    };

    function NewsCtrl($scope, $mdDialog) {
      $scope.hide = function () {
        $mdDialog.hide();
      };

      $scope.cancel = function () {
        $mdDialog.cancel();
      };

      $scope.subscribe = function () {
        if ($scope.newsEmail != 'undefined') {
          console.log($scope.newsEmail);
        }

        // $mdDialog.hide($scope.newsEmail);
      };
    }
  })
  .controller('footerCtrl', function ($scope) {
    $scope.any = new Date();
  });
