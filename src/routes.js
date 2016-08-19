angular
  .module('app')
  .config(routesConfig);

/** @ngInject */
function routesConfig($routeProvider, $locationProvider) {
  $locationProvider.html5Mode(true).hashPrefix('!');
  // $urlRouterProvider.otherwise('/');
  //
  // $stateProvider
  //   .state('app', {
  //     url: '/',
  //     template: '<app></app>'
  //   })
  //   .state('register', {
  //     url: '/register',
  //     template: '<register></register>'
  //   });

  $routeProvider
    .when('/', {
      templateUrl: 'app/main.html'
    })
    .when('/register', {
      templateUrl: 'app/register.html'
    })
    .otherwise({
      redirectTo: 'app/main.html'
    });
}
