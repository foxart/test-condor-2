<?php

namespace app\router;
enum RouterConfig: string
{
    case INDEX = '/';
    case SOLUTION = '/solution';
    case API = '/api';

    public function getTitle(): string
    {
        return match ($this) {
            self::INDEX => 'Task description',
            self::SOLUTION => 'Test solution',
            self::API => 'Api test urls',
        };
    }
}
