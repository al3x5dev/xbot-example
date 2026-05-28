<?php

namespace Bot\Commands\Keyboards;

use Al3x5\xBot\Telegram\Actions\Commands;

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Telegram\Factories\Keyboard;
use Al3x5\xBot\Telegram\Factories\ReplyButton;

#[Command('/reply')]
class Reply extends Commands
{
    public function execute(): void
    {
        $keyboard = Keyboard::reply()
            ->row(
                ReplyButton::make('Greet')->style('success')
            )
            ->row(
                ReplyButton::make('📞 Contact')->requestContact()
            )
            ->row(
                ReplyButton::make('📍 Location')->requestLocation()
            )
            ->resize()
            ->oneTime()->build();
        $this->reply("Use the buttons to respond quickly:", ['reply_markup' => $keyboard]);
    }

    public static function description(): string
    {
        return 'Show reply keyboard';
    }
}
