<?php

namespace Bot\Commands;

use Al3x5\xBot\Commands;

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Events;
use Al3x5\xBot\FormatHelper;

#[Command('/help')]
class Help extends Commands
{
    public function execute(): void
    {
        $message = '';

        // getCommandsList() returns an array where:
        // key   => command name
        // value => command description
        foreach ($this->getCommandsList() as $key => $value) {
            if ($key == 'Greet') {
                continue;
            }
            if (!$this->isAdmin() && $key == '\broadcast') {
                continue;
            }
            if ($key != '/generic') {
                $message .= "$key - $value\n";
            }
        }

        $this->reply(
            sprintf(
                "%s\n%s",
                // Text formatting using FormatHelper::class
                FormatHelper::bold('Commands List'),
                FormatHelper::expandableBlockQuote($message)
            )
        );
    }

    public static function description(): string
    {
        return 'Show bot commands help';
    }
}
