angular
  .module('app')
  .controller('MainCtrl', function ($scope) {
    $scope.magnificent = {
      current: 0,
      slides: [
        {
          src: 'img/salinada-40.jpg',
          description: 'Les salines'
        },
        {
          src: 'img/_MG_0914.jpg',
          description: 'Platja'
        },
        {
          src: 'img/_MG_4636.jpg',
          description: 'Skyline Tortosa'
        },
        {
          src: 'img/Amp_MG_0819.jpg',
          description: 'Camí a la platja'
        },
        {
          src: 'img/cabiscol-17.jpg',
          description: 'Partida de cabiscol'
        },
        {
          src: 'img/_MG_5908.jpg',
          description: 'Façana fluvial de Tortosa'
        },
        {
          src: 'img/deltebre-36.jpg',
          description: 'Arròs recent plantat'
        }
      ],
      settings: {
        enabled: true,
        interval: 5
      }
    };
  });
