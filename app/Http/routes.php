<?php

$app->get( '/', function () use ( $app ) {
    return view('weather', ['name' => 'Weather Enthusiast']);
} );

$app->get( '{path:.*}', function ( $path ) use ( $app ) {
    // Configure
    $cacheTtl      = 60;
    $headersToPass = [ 'Content-Type', 'X-Pagination' ];
    $rootUrl       = 'http://api.openweathermap.org/data/2.5/';

    $queryString = $_SERVER['QUERY_STRING'];

    $result      = Cache::remember(
        $path . $queryString,
        $cacheTtl,
        function () use ( $path, $queryString, $app, $rootUrl ) {
            $passThrough = $app->make( 'App\Http\Services\PassThrough', [ $rootUrl ] );

            return $passThrough->getResultsForPath( $path, $queryString );
        }
    );

    return response(
        $result['body'],
        $result['status'],
        array_only(
            $result['headers'],
            $headersToPass
        )
    );
} );
