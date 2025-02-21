<?php

namespace app\handlers;

use app\common\Handler;

function jsonResponse($data, $error = false, $message = "")
{
    header('Content-Type: application/json');
    echo json_encode([
        'error' => $error,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}

class ApiHandler implements Handler
{
    public function __construct()
    {
    }

    public function execute($url, $data = []): string
    {
        ob_start();
        include 'ApiHandler.tpl.php';
        return ob_get_clean();
    }

    public function getGoogleAnalytics(): string
    {
        $data = [
            "192.168.1.1" => [
                "2024-02-01" => 20,
                "2024-02-02" => 15,
                "2024-02-03" => 5
            ],
            "203.0.113.45" => [
                "2024-02-01" => 12,
                "2024-02-03" => 8
            ],
            "198.51.100.23" => [
                "2024-02-02" => 25,
                "2024-02-04" => 30
            ],
            "172.16.0.12" => [
                "2024-02-01" => 50,
                "2024-02-02" => 70,
                "2024-02-05" => 30
            ],
            "192.0.2.34" => [
                "2024-02-01" => 100,
                "2024-02-02" => 80
            ]
        ];
        return json_encode($data);
    }

    public function getPositiveGuys(): string
    {
        $data = [
            "10.0.0.1" => [
                "2024-03-01" => 18,
                "2024-03-02" => 22,
                "2024-03-03" => 30
            ],
            "203.0.113.100" => [
                "2024-03-01" => 14,
                "2024-03-02" => 25,
                "2024-03-04" => 12
            ],
            "198.51.100.75" => [
                "2024-03-01" => 33,
                "2024-03-02" => 28,
                "2024-03-03" => 17
            ],
            "172.16.0.200" => [
                "2024-03-01" => 60,
                "2024-03-03" => 45,
                "2024-03-05" => 35
            ],
            "192.0.2.50" => [
                "2024-03-02" => 90,
                "2024-03-04" => 75
            ]
        ];
        return json_encode($data);
    }

    public function getHotJar(): string
    {
        $data = [
            "172.16.1.10" => [
                "2024-04-01" => 25,
                "2024-04-02" => 30,
                "2024-04-03" => 10
            ],
            "203.0.113.55" => [
                "2024-04-01" => 14,
                "2024-04-02" => 20,
                "2024-04-04" => 18
            ],
            "198.51.100.123" => [
                "2024-04-01" => 40,
                "2024-04-02" => 35,
                "2024-04-05" => 22
            ],
            "10.0.0.50" => [
                "2024-04-01" => 12,
                "2024-04-03" => 15,
                "2024-04-05" => 28
            ],
            "192.0.2.99" => [
                "2024-04-02" => 50,
                "2024-04-03" => 70,
                "2024-04-04" => 40
            ]
        ];
        return json_encode($data);
    }
}
