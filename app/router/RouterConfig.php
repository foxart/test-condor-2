<?php

namespace app\router;
enum RouterConfig: string
{
    case INDEX = '/';
    case API = '/api';

    public function getTitle(): string
    {
        return match ($this) {
            self::INDEX => 'Task description',
            self::API => 'Api test urls',
        };
    }
}
