<?php

namespace Bot\Middlewares;

use Al3x5\xBot\Config;
use Al3x5\xBot\Events;
use Al3x5\xBot\Telegram\Actions\Middlewares;

class UpdateLoggerMiddleware extends Middlewares
{
    public function handle(\Closure $next)
    {
        if (Config::get('debug')) {
            Events::logger('development', 'update.log', json_encode($this->update));
        }

        return $next();
    }
}