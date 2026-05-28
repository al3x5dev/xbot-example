<?php
namespace Bot\Commands;

use Al3x5\xBot\Telegram\Actions\Commands;

use Al3x5\xBot\Attributes\Command;

#[Command('/generic')]
class Generic extends Commands
{
    public function execute(): void
    {
        // Forces the execution of the /help command
        $this->executeCommand('/help');
    }
    
    public static function description(): string
    {
        return 'Generic command handler or text messages, run to /help';
    }
}