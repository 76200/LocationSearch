<?php

namespace AeriaGames\Controller;

use AeriaGames\Core\JsonResponse;
use AeriaGames\Service\GooglePlacesAPI;

/**
 * PlacesController
 */
class PlacesController
{
    /**
     * @param string $params
     * @throws \InvalidArgumentException
     * @return JsonResponse
     */
    public function searchAction($params = null)
    {
        $escaped = urlencode($params); // Forcing proper URL format

        try {
            $places = new GooglePlacesAPI();
            $result = $places->textSearch($escaped);
        } catch (\Exception $e) {
            $result = GooglePlacesAPI::error($e->getMessage());
        }

        $response = new JsonResponse($result);

        return $response;
    }
}
