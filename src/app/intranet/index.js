angular
  .module('app')
  .controller('IntraCtrl', function ($state, auth) {
    if (!auth.status) {
      $state.go('login');
    }
  });
