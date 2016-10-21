<?php

namespace Controllers\ServerInfo;

use Controllers\AbstractBaseController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Says hello with a code
 *
 * @package Controllers\Serverinfo
 */
class HelloController extends AbstractBaseController
{
    /**
     * @return JsonResponse
     */
    public function viewAction()
    {
        return new JsonResponse([
            'code'    => 200,
            'message' => 'Hello, welcome.',
        ], 200);
    }
}