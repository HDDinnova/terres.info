angular
  .module('app')
  .controller('IntraCtrl', function ($state, auth) {
    if (!auth.status) {
      $state.go('login');
    }
    if (auth.status === 202) {
      $state.go('chgPassword');
    }
  });
