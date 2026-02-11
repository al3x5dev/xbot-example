<?php

namespace Bot\Commands;

use Al3x5\xBot\Commands;

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Entities\InputFile;

#[Command('/sendphoto')]
class SendPhoto extends Commands
{
    public function execute(): void
    {

        $file = base('php.jpg');

        $photo = new InputFile([
            'curl'=>new \CURLFile($file)
        ]);


        $this->sendPhoto([
            'chat_id' => $this->message->from->id,
            'photo'   =>  $photo,
            'caption' => 'Photo sent from the server'
        ]);
    }

    public static function description(): string
    {
        return 'Command description';
    }
}
