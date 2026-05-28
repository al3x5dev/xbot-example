<?php

namespace Bot\Commands;

use Al3x5\xBot\Telegram\Actions\Commands;

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Telegram\FormatHelper;

#[Command('/broadcast')]
class Broadcast extends Commands
{
    public function execute(): void
    {
        $args = $this->args();

        if (empty($args)) {
            $this->reply(
                sprintf(
                    "Usage: /broadcast %s",
                    FormatHelper::inlineCode('<message>')
                )
            );
            return;
        }

        $message = trim(implode(', ', $args), ', ');

        $this->reply(FormatHelper::bold("📢 Broadcast message sent:") . "\n\n" . $message);
    }

    public static function description(): string
    {
        return 'Broadcast message (admin only)';
    }
}
