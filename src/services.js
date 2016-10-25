angular
  .module('app')
  .factory('Cities', Cities)
  .factory('Competitors', Competitors)
  .factory('News', News);
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
function News($resource) {
  return $resource('news/ca.json');
}
