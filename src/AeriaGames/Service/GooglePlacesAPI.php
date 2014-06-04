<?php

namespace AeriaGames\Service;

use AeriaGames\Helper\ResultFilter;

/**
 * GooglePlacesAPI
 */
class GooglePlacesAPI
{
    const STATUS_INVALID_REQUEST = 'INVALID_REQUEST';
    const STATUS_OK              = 'OK';
    const STATUS_REQUEST_DENIED  = 'REQUEST_DENIED';
    const STATUS_ZERO_RESULTS    = 'ZERO_RESULTS';

    const QUERY_URL = 'https://maps.googleapis.com/maps/api/place/textsearch/json';

    /**
     * @var string Your Google API key
     */
    private $apiKey;

    /**
     * Constructor.
     */
    function __construct()
    {
        $this->apiKey = $this->loadApiKey();
    }

    /**
     * Returns JSON error message
     *
     * @param $reason
     * @return string
     */
    public static function error($reason)
    {
        $error = [
            'status' => 'error',
            'message' => self::errorMessage($reason)
        ];

        return json_encode($error);
    }

    /**
     * Returns human-readable error message
     *
     * @param $errorCode
     * @return string
     */
    private static function errorMessage($errorCode)
    {
        switch ($errorCode) {
            case self::STATUS_INVALID_REQUEST:
                return "Invalid request.";
            case self::STATUS_REQUEST_DENIED:
                return "Request denied. Check your API key";
            case self::STATUS_ZERO_RESULTS:
                return "No results";
            default:
                return "Unexpected error: {$errorCode}";
        }
    }

    /**
     * Loads API key from file or throws \Exception when file or key does not exist
     *
     * @return string
     * @throws \Exception
     */
    private function loadApiKey()
    {
        // Trying to get key
        $key = @file_get_contents(WEB_DIR . '/../config/google.key');
        // File doesn't exist or permission denied
        if ($key === false) {
            throw new \Exception('File "google.key" not found in "/config" dir.');
        } // File exists, but has no content
        elseif (!$key) {
            throw new \Exception('You should place your GoogleAPI key in "google.key" file.');
        }

        return $key;
    }

    /**
     * Executes query to the GooglePlacesAPI
     *
     * @param $input
     * @param $sensor
     * @return \stdClass query result
     */
    private function query($input, $sensor)
    {
        // Building URL with required parameters
        $queryUrl = sprintf('%s?key=%s&sensor=%s&input=%s', self::QUERY_URL, $this->apiKey, $sensor, $input);
        $result = file_get_contents($queryUrl);

        return json_decode($result, true);
    }

    /**
     * Executes `textsearch` API method
     *
     * @param $input
     * @param bool $sensor
     * @throws \Exception
     * @return string json string
     */
    public function textSearch($input, $sensor = false)
    {
        $query = $this->query($input, $sensor);
        $status = $query['status'];

        if ($status == self::STATUS_OK) {
            $resultFilter = new ResultFilter($query['results']);
            return json_encode($resultFilter->filter());
        } else {
            return $this->error($status);
        }

    }

}
