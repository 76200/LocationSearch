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
        // If route is set, then set request
        if (isset($request['url'])) {
            $this->request = $request;
        } else {
            // return DefaultController::indexAction if no route is specified
            $this->request = ['url' => 'default/index/'];
        }
    }

    /**
     * Gets routing data: controller, action and parameters
     *
     * @return array
     */
    public function getRoutingData()
    {
        // Get the `controller` and `action` name from the `request`
        list($controller, $action, $params) = explode('/', $this->request['url']);

        return [
            'controller' => 'AeriaGames\\Controller\\' . ucfirst($controller) . 'Controller',
            'action' => $action . 'Action',
            'params' => $params
        ];
    }

}
