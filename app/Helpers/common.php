<?php

use AfricasTalking\SDK\AfricasTalking;
use GuzzleHttp\Exception\ConnectException;

function api_response($success, $errors, $status_code, $status_message, $message, $data)
{
    $response = array();
    $response['success'] = $success;
    $response['errors'] = $errors;
    $response['status_code'] = $status_code;
    $response['status_message'] = $status_message;
    $response['message'] = $message;
    $response['data'] = $data;

    return $response;
}

function send_sms($phone_number, $message)
{
    /* */
    $username = "plifelive";
    $apiKey = "37b21496865821705e324a8f302f193990a88cee4e8452a6928f2820fab27693";
    /** the numbers that you want to send to in a comma-separated list
     **/
    try {
        $AT = new AfricasTalking($username, $apiKey);
        // Get one of the services
        $sms = $AT->sms();

        return $result = $sms->send([
            'to' => $phone_number,
            'message' => $message,
//                'from' => "GOTEKSI",
        ]);
    } catch (ConnectException $exception) {
        return $exception->getMessage();
    }
}
function getRandomInt($length = 4) {
    $characters = '1234567890';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}
function getRandomString($length = 12) {
    $characters = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}
