angular
  .module('app')
  .config(routesConfig);

function routesConfig($stateProvider, $urlRouterProvider, $locationProvider) {
  $locationProvider.html5Mode(true);
  $urlRouterProvider.otherwise('/');

  $stateProvider
    .state('index', {
      url: '/',
      templateUrl: 'app/main.html'
    })
    .state('register', {
      url: '/register',
      templateUrl: 'app/register/register.html',
      controller: 'RegisterCtrl'
    })
    .state('tourfilm', {
      url: '/register/tourfilm',
      templateUrl: 'app/register/tourfilm/registertourfilm.html',
      controller: 'regTf'
    })
    .state('tourfilm.form', {
      url: '/',
      templateUrl: 'app/register/tourfilm/data.html'
    });
}
