<?php

namespace App\Services;

use GuzzleHttp\Client;

class MimSmsService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function sendSms($recipient, $message)
    {
        $apiKey = config('services.mim_sms.api_key');
        $url = config('services.mim_sms.url');

        try {
            $response = $this->client->post($url, [
                'form_params' => [
                    'api_key' => $apiKey,
                    'to' => $recipient,
                    'message' => $message,
                ],
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['status'] == 'success') {
                return [
                    'success' => true,
                    'message' => $body['message'],
                ];
            }

            return [
                'success' => false,
                'error' => $body['error'],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }
}


