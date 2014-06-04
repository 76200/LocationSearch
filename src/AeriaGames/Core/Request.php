<?php

namespace AeriaGames\Core;

/**
 * Default Request class
 */
class Request
{
    /**
     * @var $request array
     */
    private $request;

    /**
     * Constructor.
     *
     * @param array $request
     */
    function __construct(array $request)
    {
        $this->request = $request;
    }

}
