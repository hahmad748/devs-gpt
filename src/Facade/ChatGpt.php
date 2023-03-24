<?php

namespace Devsfort\ChatGpt\Facade;

use Illuminate\Support\Facades\Facade;

class ChatGpt extends Facade
{

    protected static function getFacadeAccessor()
    {
        return "ChatGpt";
    }
}