<?php

namespace AeriaGames\Controller;

use AeriaGames\Core\Response;

/**
 * PlacesController
 */
class PlacesController
{
    /**
     * @param string $params
     * @return Response
     */
    public function searchAction($params = null)
    {
        $response = new Response('search action... ' . $params);

        return $response;
    }
}
