<?php

namespace App\Http\Controllers\Api;

class ControllerDoc
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Laravel OpenApi Documentation"
     * )
     *
     * @OA\Server(
     *      url=http://localhost:8000,
     *      description="API Server"
     * )

     *
     * @OA\Tag(
     *     name="Projects",
     *     description="API Endpoints of Projects"
     * )
     */
}