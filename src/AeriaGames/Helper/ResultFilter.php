<?php

namespace AeriaGames\Helper;

/**
 * Class ResultFilter
 * Helper to get filtered data containing only names and locations
 */
final class ResultFilter
{
    /**
     * @var array
     */
    private $results;

    /**
     * @param array $results
     */
    public function __construct($results)
    {
        $this->results = $results;
    }

    /**
     * Filters result. Returns only names and addresses
     *
     * @return array
     */
    public function filter()
    {
        $arr = [];
        foreach ($this->results as $result) {
            if ($result['formatted_address'] && $result['name']) {
                $arr[] = [
                    'name' => $result['name'],
                    'formatted_address' => $result['formatted_address']
                ];
            }
        }

        return $arr;
    }

}
