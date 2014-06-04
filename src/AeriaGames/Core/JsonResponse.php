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
     * @param string $contentType
     */
    function __construct($data, $status = self::HTTP_OK, $contentType = self::CONTENT_TYPE_JSON)
    {
        parent::__construct($data, $status, $contentType);
    }

}
