angular
  .module('app')
  .factory('Cities', Cities)
  .factory('Competitors', Competitors)
  .factory('EarlyFee', EarlyFee);
  // .factory('SaveMember', SaveMember);

function Cities($resource) {
  return $resource('https://restcountries.eu/rest/v1/region/europe', {}, {
    query: {method: 'GET', params: {}, isArray: true}
  });
}
function Competitors($resource) {
  return {
    getAll: function () {
      return $resource('api/competitors', {}, {
        query: {method: 'GET', params: {}, isArray: true}
      });
    }
  };
}
function EarlyFee() {
  return function () {
    this.state = function () {
      var early = true;
      var data = new Date();
      var dataFinal = new Date('2017-01-15');
      if (data > dataFinal) {
        early = false;
      }
      return early;
    };
  };
}
