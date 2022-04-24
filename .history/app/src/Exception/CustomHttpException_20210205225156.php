<?php

namespace App\Exception;

use Symfony\Component\Validator\Constraints\Json;

class CustomHttpException {

    public function __construct(string $httpCode) {

        switch($httpCode) {
            case "404":
                // $response()
                http_response_code(404);
                return json_encode(array(
                    "msg" => "not found"
                ));

}