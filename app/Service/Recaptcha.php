<?php

namespace App\Service;
use GuzzleHttp\Client;

class Recaptcha
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $secret = config('services.recaptcha.secret');
        if (empty($secret)) {
            return true;
        }

        $client = new Client;
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' =>
                 [
                    'secret' => $secret,
                    'response' => $value,
                    'remoteip' => request()->ip(),

                ]
            ]
        );
        $body = json_decode((string) $response->getBody());
        return $body->success;
    }
}
