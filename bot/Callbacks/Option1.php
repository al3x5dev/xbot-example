<?php
namespace Bot\Callbacks;

use Al3x5\xBot\Callbacks;

use Al3x5\xBot\Attributes\Callback;

#[Callback('option1')]
class Option1 extends Callbacks
{
    public function execute(): void
    {
        $this->answerCallbackQuery($this->callback->id);
        $this->reply("Option No. 1 selected correctly");
    }
}