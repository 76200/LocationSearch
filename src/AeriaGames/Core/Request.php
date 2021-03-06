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
    public function __construct(array $request)
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
        list($controller, $action, $params) = explode('/', $this->request['url']) + [null, null, null];
        $controller = 'AeriaGames\\Controller\\' . ucfirst($controller) . 'Controller';
        $action = $action . 'Action';

        if(!class_exists($controller) || !method_exists($controller, $action)) {
            $controller = 'AeriaGames\\Controller\\DefaultController';
            $action = 'indexAction';
        }

        return [
            'controller' => $controller,
            'action' => $action,
            'params' => $params
        ];
    }

}
