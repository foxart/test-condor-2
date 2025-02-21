<?php

namespace app\handlers;

use app\common\Handler;
use app\repository\GoogleAnalyticsRepository;
use app\repository\HotJarRepository;
use app\repository\PositiveGuysRepository;
use Exception;

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
        ob_start();
        include 'SolutionHandler.tpl.php';
        return ob_get_clean();
    }

    public function getTotal(): string
    {
        try {
            $data = [
                'Google Analytics' => $this->googleAnalyticsRepository->getData()
                    ->getTotalCount(),
                'Positive Guys' => $this->positiveGuysRepository->getData()
                    ->getTotalCount(),
                'Hot Jar' => $this->hotJarRepository->getData()
                    ->getTotalCount(),
            ];
            return $this->createJsonResponse($data);
        } catch (Exception $e) {
            return $this->createJsonResponse([], error: true, message: $e->getMessage());
        }
    }

    private function createJsonResponse($data, $error = false, $message = ""): string
    {
        header('Content-Type: application/json');
        return json_encode([
            'error' => $error,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function getTotalShapeError(): string
    {
        try {
            $data = [
                'Google Analytics' => $this->googleAnalyticsRepository->getDataShapeError()
                    ->getTotalCount(),
                'Positive Guys' => $this->positiveGuysRepository->getData()
                    ->getTotalCount(),
                'Hot Jar' => $this->hotJarRepository->getData()
                    ->getTotalCount(),
            ];
            return $this->createJsonResponse($data);
        } catch (Exception $e) {
            return $this->createJsonResponse([], error: true, message: $e->getMessage());
        }
    }

    public function getTotalNetworkError(): string
    {
        try {
            $data = [
                'Google Analytics' => $this->googleAnalyticsRepository->getDataNetworkError()
                    ->getTotalCount(),
                'Positive Guys' => $this->positiveGuysRepository->getData()
                    ->getTotalCount(),
                'Hot Jar' => $this->hotJarRepository->getData()
                    ->getTotalCount(),
            ];
            return $this->createJsonResponse($data);
        } catch (Exception $e) {
            return $this->createJsonResponse([], error: true, message: $e->getMessage());
        }
    }

    public function getByDate(): string
    {
        try {
            $data = [
                'Google Analytics' => $this->googleAnalyticsRepository->getData()
                    ->getAggregatedDataByDate(),
                'Positive Guys' => $this->positiveGuysRepository->getData()
                    ->getAggregatedDataByDate(),
                'Hot Jar' => $this->hotJarRepository->getData()
                    ->getAggregatedDataByDate(),
            ];
            return $this->createJsonResponse($data);
        } catch (Exception $e) {
            return $this->createJsonResponse([], error: true, message: $e->getMessage());
        }
    }

    public function getByIp(): string
    {
        try {
            $data = [
                'Google Analytics' => $this->googleAnalyticsRepository->getData()
                    ->getAggregatedDataByIp(),
                'Positive Guys' => $this->positiveGuysRepository->getData()
                    ->getAggregatedDataByIp(),
                'Hot Jar' => $this->hotJarRepository->getData()
                    ->getAggregatedDataByIp(),
            ];
            return $this->createJsonResponse($data);
        } catch (Exception $e) {
            return $this->createJsonResponse([], error: true, message: $e->getMessage());
        }
    }
}
