<?php

namespace Bot\Commands;

use Al3x5\xBot\Commands;

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Telegram\Factorys\Keyboard;

#[Command('Greet')]
class Greet extends Commands
{
    public function execute(): void
    {

        $this->reply(
            "👋",
            [
                'reply_markup' => Keyboard::remove()
            ]
        );
    }

    public static function description(): string
    {
        return 'Command to greet';
    }
}
