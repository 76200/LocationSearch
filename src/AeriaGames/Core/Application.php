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
        $pathInfo = $this->request->getPath();

        // Creating an instance of controller
        try {
            $controller = new $pathInfo['controller'];
        } catch(\Exception $e) {
            // If no controller is set, return DefaultController::indexAction()
            $controller = new DefaultController();
            return $controller->indexAction();
        }

        // Executing controllers' action
        $response = $controller->{$pathInfo['action']}($pathInfo['params']);

        return $response;
    }

}
