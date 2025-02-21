<?php

namespace app\models;

use DateTime;
use InvalidArgumentException;

class ApiDto
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = [];
        foreach ($data as $ip => $dailyStats) {
            if (!filter_var($ip, FILTER_VALIDATE_IP)) {
                throw new InvalidArgumentException("Invalid IP address: $ip");
            }
            $this->validateDailyStats($dailyStats);
            $this->data[$ip] = $dailyStats;
        }
    }

    private function validateDailyStats(array $dailyStats): void
    {
        foreach ($dailyStats as $date => $count) {
            if (!$this->isValidDate($date)) {
                throw new InvalidArgumentException("Invalid date format: $date");
            }
            if (!is_int($count)) {
                throw new InvalidArgumentException("The count for $date must be an integer.");
            }
        }
    }

    private function isValidDate(string $date): bool
    {
        return DateTime::createFromFormat('Y-m-d', $date) !== false;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getStatsByIp(string $ip): ?array
    {
        return $this->data[$ip] ?? null;
    }

    public function getAggregatedDataByIp(): array
    {
        return array_map(function ($dailyStats) {
            return array_sum($dailyStats);
        }, $this->data);
    }
}
