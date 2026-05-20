<?php
namespace Bot\Commands;

use Al3x5\xBot\Commands;

use Al3x5\xBot\Attributes\Command;
use Bot\Conversations\RegisterConversation;

#[Command('/talk')]
class Talk extends Commands
{
    public function execute(): void
    {
        $talk = new RegisterConversation($this->update);

        $talk->start();
    }
    
    public static function description(): string
    {
        return 'Bla bla bla';
    }
}