<?php

namespace AeriaGames\Controller;

use AeriaGames\Core\Response;

/**
 * DefaultController
 */
class DefaultController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $response = new Response('<h1>AeriaGames LocationSearch app</h1>');

        return $response;
    }
}
