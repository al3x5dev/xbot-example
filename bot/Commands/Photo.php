<?php

namespace Bot\Commands;

use Al3x5\xBot\Telegram\Actions\Commands;

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Telegram\FormatHelper;
use Al3x5\xBot\Telegram\Entities\InputFile;

#[Command('/photo')]
class Photo extends Commands
{
    public function execute(): void
    {
        $photo = new InputFile([
            'file' =>
            base('php.jpg')
        ]);

        $this->sendPhoto(
            $this->message->chat->id,
            $photo,
            caption: FormatHelper::bold('📸 This is a PHP photo!'),
        );
    }

    public static function description(): string
    {
        return 'Send a photo';
    }
}
