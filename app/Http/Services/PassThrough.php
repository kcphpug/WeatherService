<?php namespace App\Http\Services;

use \GuzzleHttp as GuzzleHttp;

class PassThrough {
    protected $rootUrl = null;

    public function __construct( $rootUrl ) {
        $this->rootUrl = $rootUrl;
    }

    public function getResultsForPath( $path, $queryString = "" ) {
        $client   = new GuzzleHttp\Client();
        $url      = $this->getRealApiUrl( $path, $queryString );
        $response = $client->get( $url );

        return $this->getArrayForGuzzleResponse( $response );
    }

    protected function getRealApiUrl( $path, $queryString = "" ) {
        $url = $this->rootUrl . $path;
        $url .= ( empty( $queryString ) ? '' : '?' . $queryString );

        return $url;
    }

    protected function getArrayForGuzzleResponse( $response ) {
        $result            = [ 'body' => null, 'status' => '', 'headers' => '' ];
        $result['body']    = $response->getBody()->getContents();
        $result['status']  = $response->getStatusCode();
        $result['headers'] = $response->getHeaders();

        return $result;
    }
}