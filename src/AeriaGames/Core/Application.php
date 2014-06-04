<?php

namespace AeriaGames\Core;

/**
 * Class Application
 */
class Application
{
    /**
     * @var Request $request
     */
    private $request;

    /**
     * Constructor.
     *
     * @param Request $request
     */
    function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Executes application
     *
     * @return string
     */
    public function execute()
    {
        echo 'hello';
    }

}
