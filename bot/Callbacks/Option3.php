<?php
namespace Bot\Callbacks;

use Al3x5\xBot\Callbacks;

use Al3x5\xBot\Attributes\Callback;

#[Callback('option3')]
class Option3 extends Callbacks
{
    public function execute(): void
    {
        $id = $this->callback->id;
        $this->answerCallbackQuery($id,'Option No. 3 selected correctly');
    }
}