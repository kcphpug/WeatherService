<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('{path:.*}', function($path) use ($app) {
    $headersToPass = ['Content-Type','X-Pagination'];
    $rootUrl = 'http://api.openweathermap.org/data/2.5/';
    $queryString = $_SERVER['QUERY_STRING'];

    $passThrough = $app->make('App\PassThrough', [$rootUrl]);

    $result = $passThrough->getResultsForPath($path, $queryString);

    return response(
        $result['body'],
        $result['status'],
        array_only(
            $result['headers'],
            $headersToPass
        )
    );
});


