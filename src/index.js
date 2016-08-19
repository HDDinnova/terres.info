angular
  .module('app', ['ngRoute', 'ngAnimate', 'ngMaterial', 'angular-magnificent'])
  .config(function ($mdThemingProvider) {
    $mdThemingProvider.theme('default')
      .primaryPalette('blue-grey', {
        'default': '400',
        'hue-1': '50'
      })
      .accentPalette('light-blue');
  });
