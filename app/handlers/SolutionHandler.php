<?php

namespace app\handlers;

use app\common\Handler;
use app\models\ApiDto;
use app\repository\GoogleAnalyticsRepository;
use app\repository\HotJarRepository;
use app\repository\PositiveGuysRepository;

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

class SolutionHandler implements Handler
{
    private GoogleAnalyticsRepository $googleAnalyticsRepository;
    private PositiveGuysRepository $positiveGuysRepository;
    private HotJarRepository $hotJarRepository;

    public function __construct()
    {
        $this->googleAnalyticsRepository = new GoogleAnalyticsRepository();
        $this->positiveGuysRepository = new PositiveGuysRepository();
        $this->hotJarRepository = new HotJarRepository();
    }

    public function execute($url, $data = []): string
    {
//        ob_start();
//        include 'SolutionHandler.tpl.php';
        $googleAnalytics = $this->getGoogleAnalytics();
        foreach ($googleAnalytics->getData() as $ip => $dailyStats) {
//            echo "IP Address: $ip" . PHP_EOL;
//            foreach ($dailyStats as $date => $count) {
//                echo "   Date: $date, Count: $count" . PHP_EOL;
//            }
        }
        $positiveGuys = $this->getPositiveGuys();
        $hotJar = $this->getHotJar();
        var_dump(($googleAnalytics->getStatsByIp('192.168.1.1')));
        var_dump(($googleAnalytics->getAggregatedDataByIp()));
        return '$hotJar';
    }

    public function getGoogleAnalytics(): ?ApiDto
    {
        return $this->googleAnalyticsRepository->getData();
    }

    public function getPositiveGuys(): ?ApiDto
    {
        return $this->positiveGuysRepository->getData();
    }

    public function getHotJar(): ?ApiDto
    {
        return $this->hotJarRepository->getData();
    }
}
