<?php
namespace Bot\Callbacks;

use Al3x5\xBot\Telegram\Actions\Callbacks;

use Al3x5\xBot\Attributes\Callback;

#[Callback('option2')]
class Option2 extends Callbacks
{
    public function execute(): void
    {
        $id = $this->callback->id;
        $this->answerCallbackQuery($id,'Option No. 2 selected correctly',true);
    }
}