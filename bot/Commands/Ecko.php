<?php

namespace Bot\Commands;

use Al3x5\xBot\Commands;

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\FormatHelper;

#[Command('/echo')]
class Ecko extends Commands
{
    public function execute(): void
    {
        $args = $this->args();

        if (empty($args)) {
            $this->reply("Usage: /echo ".FormatHelper::inlineCode(" <message>"));
        }

        $this->reply(rtrim(implode(', ', $args), ', '));
    }

    public static function description(): string
    {
        return 'Repeat the message';
    }
}
