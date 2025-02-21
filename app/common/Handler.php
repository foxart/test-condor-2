<?php

namespace app\common;
interface Handler
{
    public function execute(string $url, array $data = []): string;
}
