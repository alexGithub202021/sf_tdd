<?php

namespace App\Exception;

class CustomHttpException {

    public function __construct(string $httpCode) {

        switch($httpCode) {
            case "404":
                // $response()
        }

    }

}