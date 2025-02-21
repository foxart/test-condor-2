<?php

namespace app\common;
use app\router\RouterConfig;

enum MenuConfig: string
{
    case INDEX = 'task';
    case SOLUTION = 'solution';
    case API = 'api';

    public function getRoute(): string
    {
        return match ($this) {
            self::INDEX => RouterConfig::INDEX->value,
            self::SOLUTION => RouterConfig::SOLUTION->value,
            self::API => RouterConfig::API->value,
        };
    }

    public function getTitle(): string
    {
        return match ($this) {
            self::INDEX => 'Task',
            self::SOLUTION => 'Solution',
            self::API => 'Api',
        };
    }
}
