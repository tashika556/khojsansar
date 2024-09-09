<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="3.0",
 *      title="Khojsansar API",
 *      description="Khojsansar App API Documentation",
 *      @OA\Contact(
 *          email="trishachhetri27@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.4.58",
 *          url="https://www.apache.org/licenses/LICENSE-2.4.58.html"
 *      )
 * )
 * 
 * @OA\Get(
 *     path="/",
 *     summary="Display Home Page",
 *     description="Home page",
 *     @OA\Response(response="default", description="Welcome page")
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

