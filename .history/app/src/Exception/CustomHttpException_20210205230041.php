<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomHttpException extends HttpException
{
    public function __construct(string $httpCode, array $message = array())
    {
        switch ($httpCode) {
            case "404":
                // $response()
                http_response_code(404);
                return json_encode(array(
                    "msg" => "not found"
                ));
        }
    }
}
