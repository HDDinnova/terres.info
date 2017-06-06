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
    .state('program', {
      url: '/program',
      templateUrl: 'app/program/program.html',
      controller: 'programCtrl'
    })
    .state('partners', {
      url: '/partners',
      templateUrl: 'app/partners/partners.html'
    })
    .state('news', {
      url: '/news',
      templateUrl: 'app/news/news.html',
      controller: 'NewsCtrl'
    })
    .state('post', {
      url: '/news/:id',
      templateUrl: 'app/news/news-post.html',
      controller: 'NewsPostCtrl'
    })
    .state('terreslab', {
      url: '/terreslab',
      templateUrl: 'app/terreslab/terreslab.html',
      controller: 'Terreslab'
    })
    .state('sustainable', {
      url: '/sustainable-day',
      templateUrl: 'app/sustain/sustain.html',
      controller: 'Sustain'
    })
    .state('sustainableSorry', {
      url: '/sustainable-day/sorry',
      templateUrl: 'app/sustain/sustainsorry.html'
    })
    .state('sustainableOk', {
      url: '/sustainable-day/thankyou',
      templateUrl: 'app/sustain/sustainok.html'
    })
    .state('tlregister', {
      url: '/terreslab/register',
      templateUrl: 'app/terreslab/register.html',
      controller: 'tlregCtrl'
    })
    .state('terreslab20off', {
      url: '/terreslab/register20off',
      templateUrl: 'app/terreslab/terreslab20off.html',
      controller: 'tlreg20OffCtrl'
    })
    .state('terreslab50off', {
      url: '/terreslab/register50off',
      templateUrl: 'app/terreslab/terreslab50off.html',
      controller: 'tlreg50OffCtrl'
    })
    .state('terreslabstudent', {
      url: '/terreslab/student',
      templateUrl: 'app/terreslab/terreslabstudent.html',
      controller: 'tlregStudentCtrl'
    })
    .state('terreslabstudentok', {
      url: '/terreslab/student/thankyou',
      templateUrl: 'app/terreslab/thankyou.html'
    })
    .state('terreslaboneday', {
      url: '/terreslab/oneday',
      templateUrl: 'app/terreslab/terreslaboneday.html',
      controller: 'tlregOnedayCtrl'
    })
    .state('terreslabonedayoffer', {
      url: '/terreslab/oneday/oferta',
      templateUrl: 'app/terreslab/terreslabonedayoffer.html',
      controller: 'tlregOnedayOfferCtrl'
    })
    .state('tlpay', {
      url: '/terreslab/register/pay',
      templateUrl: 'app/terreslab/pay.html'
    })
    .state('tlcancel', {
      url: '/terreslab/register/cancel',
      templateUrl: 'app/terreslab/cancel.html'
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
      templateUrl: 'app/login/login.html'
    })
    .state('chgPassword', {
      url: '/intranet/firstenter',
      templateUrl: 'app/intranet/firstenter.html',
      controller: 'firstenterCtrl'
    })
    .state('contact', {
      url: '/contact',
      templateUrl: 'app/contact/contact.html'
    })
    .state('competition', {
      url: '/official-competition',
      templateUrl: 'app/competition/competition.html',
      controller: 'competitionCtrl'
    })
    .state('howarrive', {
      url: '/how-to-arrive',
      templateUrl: 'app/arrive/arrive.html'
    })
    .state('soparregistre', {
      url: '/invitacio/sopar',
      templateUrl: 'app/sopar/invitacio.html',
      controller: 'soparInvitacioCtrl'
    })
    .state('soparpagat', {
      url: '/invitacio/thankyou',
      templateUrl: 'app/sopar/thankyou.html'
    })
    .state('soparerror', {
      url: '/invitacio/error',
      templateUrl: 'app/sopar/error.html'
    });
}
