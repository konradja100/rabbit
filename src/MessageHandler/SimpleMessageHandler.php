<?php

namespace App\MessageHandler;

use App\Message\SimpleMessage;

class SimpleMessageHandler
{

    public function __invoke(SimpleMessage $message)
    {
        echo memory_get_usage() . PHP_EOL;
    }
}