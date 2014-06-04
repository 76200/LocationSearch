<?php

namespace AeriaGames\Core;

use AeriaGames\Controller\DefaultController;

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
     * @return Response
     */
    public function execute()
    {
        // Get controller, action and parameters
        $routingData = $this->request->getRoutingData();

        // Creating an instance of controller
        try {
            $controller = new $routingData['controller'];
        } catch(\Exception $e) {
            // If no controller is set, return DefaultController::indexAction()
            $controller = new DefaultController();
            return $controller->indexAction();
        }

        // Executing controllers' action
        $response = $controller->{$routingData['action']}($routingData['params']);

        return $response;
    }

}
