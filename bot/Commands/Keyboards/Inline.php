<?php

namespace Bot\Commands\Keyboards;

use Al3x5\xBot\Telegram\Actions\Commands;

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Telegram\Factories\InlineButton;
use Al3x5\xBot\Telegram\Factories\Keyboard;

#[Command('/inline')]
class Inline extends Commands
{
    public function execute(): void
    {
        $keyboard = Keyboard::inline()->row(
            InlineButton::make('Option 1')->callback('option1'),
            InlineButton::make('Option 2')->callback('option2'),
            InlineButton::make('Option 3')->callback('option3'),
        )->row(
            InlineButton::make('Telegram')
            ->url('https://core.telegram.org/bots/api')
            ->style('primary'),
            InlineButton::make('Pinteres')
            ->url('https://pinterest.com')
            ->style('danger')
        )->build();

        $this->reply(
            "Choose an option",
            [
                'reply_markup' => $keyboard
            ]
        );
    }

    public static function description(): string
    {
        return 'Show inline keyboard';
    }
}
