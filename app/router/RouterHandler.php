<?php

namespace app\router;

use app\common\MenuConfig;
use app\handlers\ApiHandler;
use app\handlers\SolutionHandler;

class RouterHandler
{
    private Router $router;
    private mixed $template;
    private array $menuConfig;

    public function __construct($template)
    {
        $this->template = $template;
        $this->router = new Router();
        $this->menuConfig = MenuConfig::cases();
        $this->setupRoutes();
    }

    private function setupRoutes(): void
    {
        /** INDEX */
        $this->router->get(RouterConfig::INDEX->value, function () {
            $content = nl2br(file_get_contents('index.md'));
            $this->render(RouterConfig::INDEX->getTitle(), $content);
        });
        /** SOLUTION */
        $this->router->get(RouterConfig::SOLUTION->value, function () {
            $this->render(RouterConfig::SOLUTION->getTitle(), new SolutionHandler()->execute(RouterConfig::SOLUTION->value));
        });
        $this->router->get(RouterConfig::SOLUTION->value . '/total', function () {
            echo new SolutionHandler()->getTotal();
        });
        $this->router->get(RouterConfig::SOLUTION->value . '/total/shape-error', function () {
            echo new SolutionHandler()->getTotalShapeError();
        });
        $this->router->get(RouterConfig::SOLUTION->value . '/total/network-error', function () {
            echo new SolutionHandler()->getTotalNetworkError();
        });
        $this->router->get(RouterConfig::SOLUTION->value . '/date', function () {
            echo new SolutionHandler()->getByDate();
        });
        $this->router->get(RouterConfig::SOLUTION->value . '/ip', function () {
            echo new SolutionHandler()->getByIp();
        });
        /** API */
        $this->router->get(RouterConfig::API->value, function () {
            $this->render(RouterConfig::API->getTitle(), new ApiHandler()->execute(RouterConfig::API->value));
        });
        $this->router->get(RouterConfig::API->value . '/google-analytics', function () {
            echo new ApiHandler()->getGoogleAnalytics();
        });
        $this->router->get(RouterConfig::API->value . '/google-analytics/shape-error', function () {
            echo new ApiHandler()->getGoogleAnalyticsShapeError();
        });
        $this->router->get(RouterConfig::API->value . '/positive-guys', function () {
            echo new ApiHandler()->getPositiveGuys();
        });
        $this->router->get(RouterConfig::API->value . '/hot-jar', function () {
            echo new ApiHandler()->getHotJar();
        });
    }

    private function render(string $title, string $content): void
    {
        $headerTitle = $title;
        $routerContent = $content;
        $menuConfig = $this->menuConfig;
        include $this->template;
    }

    public function dispatch(string $uri, string $method): void
    {
        $this->router->dispatch($uri, $method);
    }
}
