<?php

namespace App\Http\Controllers\Api\V1\Tests;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        dd(auth('api')->user());
    }
}
