<?php

namespace App\Http\Controllers\Api\V1\Tests;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     operationId="getUsersList",
     *     tags={"Users"},
     *     summary="Get list of users",
     *     @OA\Response(response="200", description="Successful operation"),
     * )
     */
    public function index()
    {
        dd(auth('api')->user());
    }
}
