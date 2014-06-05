<?php

namespace AeriaGames\Core;

/**
 * JsonResponse
 */
class JsonResponse extends Response
{
    /**
     * Constructor.
     *
     * @param $data
     * @param int $status
     */
    public function __construct($data, $status = self::HTTP_OK)
    {
        parent::__construct($data, $status, self::CONTENT_TYPE_JSON);
    }

}
