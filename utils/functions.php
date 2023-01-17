<?php
use App\Core\Validation;
    function response(Array $data, int $status = 200)
    {
        header("Content-Type: application/json");
        http_response_code($status);
        return json_encode($data, JSON_PRETTY_PRINT);
    }


    function cleanPostData(string $key)
    {
        if (isset($_POST[$key])) {
            return cleanData($_POST[$key]);
        }
        else{
            return null;
        }
    }

    function cleanGetData(string $key)
    {
        if (isset($_GET[$key])) {
            return cleanData($_GET[$key]);
        }
        else{
            return null;
        }
    }

    function cleanData($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }