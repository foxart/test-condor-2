<?php

namespace app\common;

class Request
{
    public function executeJson(string $url): ?string
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Content-Type: application/json'
            ],
        ]);
        $response = curl_exec($curl);
        if (curl_error($curl)) {
//            $errorCode = curl_errno($curl);
//            $errorMessage = curl_error($curl);
            curl_close($curl);
//            throw new RuntimeException("cURL error ({$errorCode}): {$errorMessage}");
            return null;
        }
        curl_close($curl);
        return $response;
    }
}
