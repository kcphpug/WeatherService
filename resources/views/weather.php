<!DOCTYPE html>
<html data-ng-app="plunker">

<head>
    <meta charset="utf-8" />
    <title>AngularJS Plunker</title>
    <script>document.write('<base href="' + document.location + '" />');</script>
    <link rel="stylesheet" href="/style.css" />
    <script data-require="angular.js@1.4.x" src="https://code.angularjs.org/1.4.0-rc.2/angular.js" data-semver="1.4.0-rc.2"></script>
    <script src="/app.js"></script>
</head>

<body ng-controller="MainCtrl" ng-cloak>
    <h1>{{appName}}</h1>
    <p>Hello <?=$name?>!</p>
    <p>
        <input type="text" placeholder="City,ST" ng-model="city" />
        <button ng-click="getCurrent()">Go</button>
    </p>

    <div>{{'Main Temp ' + (currentWeather.main.temp | number:2) }}</div>
    <div ng-bind="'Min Temp '+currentWeather.main.temp_min"></div>

    <div ng-repeat="weather in currentWeather.weather">
        <div ng-bind="weather.description"></div>
        <img ng-src="http://openweathermap.org/img/w/{{weather.icon}}.png">
    </div>
</body>

</html>