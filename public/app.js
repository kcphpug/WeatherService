/**
 * Based on a code-along/presentation from GDG Kansas City,
 *   Presented by Lee Brandt from PaigeLabs :
 *   http://www.meetup.com/GDG-Kansas-City/events/222165008/
 */
(function(){

    var mainController = function($scope, WeatherSvc) {
        $scope.appName = 'Weather Query!';
        $scope.getCurrent = function(){
            WeatherSvc.GetCurrentWeather($scope.city).then(
                // success
                function successResult(results){
                    $scope.currentWeather = results.data;
                },
                // error
                function errorResult(err){
                    console.log(err);
                }
            );
        }
    };

    var weatherService = function($http){
        var getCurrentWeather = function(city){
            var apiUrl = '/weather?q=' + city + '&units=imperial';
            return $http.get(apiUrl);
        };

        return {
            GetCurrentWeather: getCurrentWeather
        }
    }


    // We want $scope to get injected and not get modified by a minimizer
    angular.module('plunker', [])
        .controller('MainCtrl', ['$scope','WeatherSvc', mainController])
        .factory('WeatherSvc',['$http',weatherService]);
}());
