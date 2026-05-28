<?php
namespace Bot\Middlewares;

use Al3x5\xBot\Telegram\FormatHelper;
use Al3x5\xBot\Telegram\Actions\Middlewares;

class AuthMiddleware extends Middlewares
{
    public function handle(\Closure $next)
    {
        if (!$this->isAdmin()) {
            $this->abort(FormatHelper::italic('⛔ This command is for admins only.'));
            return;
        }
        return $next();
    }
}