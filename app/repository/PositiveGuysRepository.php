<?php

namespace app\repository;
use app\common\Request;
use app\models\ApiDto;
use RuntimeException;

class PositiveGuysRepository extends Request
{
    private string $url;

    public function __construct()
    {
        $this->url = 'http://host.docker.internal/api/positive-guys';
    }

    public function getData(): ApiDto
    {
        $jsonData = $this->executeJson($this->url);
        if ($jsonData === null) {
            throw new RuntimeException("Failed to fetch data from API.");
        }
        $data = json_decode($jsonData, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException("Invalid JSON received: " . json_last_error_msg());
        }
        return new ApiDto($data);
    }
}
