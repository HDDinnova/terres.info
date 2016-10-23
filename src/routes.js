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
    .state('participate', {
      url: '/participate',
      templateUrl: 'app/participate/participate.html'
    })
    .state('about', {
      url: '/about',
      templateUrl: 'app/about/about.html'
    })
    .state('partners', {
      url: '/partners',
      templateUrl: 'app/partners/partners.html'
    })
    .state('tourfilm', {
      url: '/register/tourfilm',
      templateUrl: 'app/register/tourfilm/registertourfilm.html',
      controller: 'regTf'
    })
    .state('tourfilm.form', {
      url: '/',
      templateUrl: 'app/register/data.html'
    })
    .state('documentary', {
      url: '/register/documentary',
      templateUrl: 'app/register/documentary/registerdoc.html',
      controller: 'regDoc'
    })
    .state('documentary.form', {
      url: '/',
      templateUrl: 'app/register/data.html'
    })
    .state('corporate', {
      url: '/register/corporate',
      templateUrl: 'app/register/corporate/registercf.html',
      controller: 'regCf'
    })
    .state('corporate.form', {
      url: '/',
      templateUrl: 'app/register/data.html'
    })
    .state('login', {
      url: '/login',
      templateUrl: 'login/login.html'
    });
}
