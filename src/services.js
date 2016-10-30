angular
  .module('app')
  .factory('Cities', Cities)
  .factory('Competitors', Competitors)
  .factory('AuthenticationSvc', AuthenticationSvc);
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
function AuthenticationSvc($http, $q, $window) {
  var userInfo;
  var errorCode;

  function login(userName) {
    var deferred = $q.defer();

    $http.post("/api/login", userName)
    .then(function (result) {
      if (result.data.status === 200) {
        userInfo = {
          status: result.data.status,
          message: result.data.message,
          id: result.data.id
        };
        $window.sessionStorage.userInfo = JSON.stringify(userInfo);
        deferred.resolve(userInfo);
      } else if (result.data.status === 202) {
        userInfo = {
          status: result.data.status,
          message: result.data.message
        };
        deferred.resolve(userInfo);
      } else {
        errorCode = {
          status: result.data.status,
          message: result.data.message
        };
        deferred.reject(errorCode);
      }
    });

    return deferred.promise;
  }

  function logout() {
    var deferred = $q.defer();

    $http({
      method: "POST",
      url: "/api/logout",
      headers: {
        accessToken: userInfo.accessToken
      }
    }).then(function (result) {
      userInfo = null;
      $window.sessionStorage.userInfo = null;
      deferred.resolve(result);
    }, function (error) {
      deferred.reject(error);
    });

    return deferred.promise;
  }

  function getUserInfo() {
    return userInfo;
  }

  function init() {
    if ($window.sessionStorage.userInfo) {
      userInfo = JSON.parse($window.sessionStorage.userInfo);
    }
  }
  init();

  return {
    login: login,
    logout: logout,
    getUserInfo: getUserInfo
  };
}
