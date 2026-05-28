<?php
namespace Bot\Commands;

use Al3x5\xBot\Telegram\Actions\Commands;

use Al3x5\xBot\Attributes\Command;

#[Command('/start')]
class Start extends Commands
{
    public function execute(): void
    {
        $name = $this->message->from->first_name;
        $this->reply("👋 Hi $name, run /help to see everything i can do.");
    }
    
    public static function description(): string
    {
        return 'Start command';
    }
}