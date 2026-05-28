<?php

namespace Bot\Conversations;

use Al3x5\xBot\Telegram\Actions\Conversations;
use Al3x5\xBot\Telegram\FormatHelper;

class RegisterConversation extends Conversations
{
    public function start(): void
    {
        $this->end('exit');

        $this->ask(
            sprintf(
                "👋Hi, what's your name?\n\nType %s to end the conversation",
                FormatHelper::inlineCode('"exit"')
            ),
            'name'
        );
    }

    public function name(): void
    {
        $name = $this->update->message->getText();

        if (mb_strlen($name) < 2) {
            $this->reply("Name is too short. Please try again:");
            return;
        }

        $this->ask(
            sprintf(
                "Great! %s, how old are you?\n\nType %s to end the conversation",
                FormatHelper::bold($name),
                FormatHelper::inlineCode('"exit"')
            ),
            'age'
        );
    }

    public function age(): void
    {
        $age = $this->update->message->getText();

        if (!is_numeric($age) || (int)$age < 1 || (int)$age > 150) {
            $this->reply("Please enter a valid age:");
            return;
        }

        $this->reply("Perfect, you are $age years old");
        $this->stopConversation();
    }
}
