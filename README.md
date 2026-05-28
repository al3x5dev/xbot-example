# xBot Example

An example Telegram bot showcasing the features of the [xBot](https://github.com/al3x5dev/xbot) PHP library.

This repository demonstrates how to use xBot's main features: commands, callbacks, keyboards, conversations, middlewares, and more. Use it as a reference to build your own Telegram bot.

> **Note:** This is a demonstration project. Commands and examples are provided as-is and may need additional security measures for production use.

---

## Requirements

- PHP 8.2+
- [Composer](https://getcomposer.org/)

## Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/al3x5/xbot-example.git
cd xbot-example
```

### 2. Configure your bot

Copy the example config and fill in your bot credentials:

```bash
cp config.example.php config.php
```

Edit `config.php` and set your bot token, secret token, and admin user IDs:

```php
return [
    'token' => '123456:ABC-DEF...',        // Your bot token from BotFather
    'secret' => 'your-secret-token',        // Secret token for webhook security
    'admins' => [123456789],                // Telegram user IDs of admins
    'debug' => true,
    'abs_path' => __DIR__,
];
```

### 3. Install dependencies

```bash
composer install
```

### 4. Set the webhook

```bash
php vendor/bin/xbot hook:set https://your-domain.com/index.php
```

### 5. Register commands and callbacks

```bash
php vendor/bin/xbot register
```

---

## Project structure

```
├── bot/
│   ├── middleware.php                 # Middleware configuration
│   ├── Commands/                      # Bot commands
│   │   ├── Start.php                  # /start
│   │   ├── Help.php                   # /help
│   │   ├── Ecko.php                   # /echo
│   │   ├── Broadcast.php              # /broadcast (admin only)
│   │   ├── Photo.php                  # /photo
│   │   ├── Greet.php                  # Greet (text trigger)
│   │   ├── Talk.php                   # /talk (conversation)
│   │   ├── Generic.php                # fallback handler
│   │   └── Keyboards/
│   │       ├── Inline.php             # /inline (inline keyboard)
│   │       └── Reply.php              # /reply (reply keyboard)
│   ├── Callbacks/                     # Callback query handlers
│   │   ├── Option1.php                # option1 callback
│   │   ├── Option2.php                # option2 callback
│   │   └── Option3.php                # option3 callback
│   ├── Conversations/                 # Multi-step conversations
│   │   └── RegisterConversation.php   # Name → age flow
│   └── Middlewares/                   # Custom middleware
│       ├── AuthMiddleware.php         # Admin authorization
│       └── UpdateLoggerMiddleware.php # Request logging
├── storage/
│   ├── commands.json                  # Auto-generated command registry
│   ├── callbacks.json                 # Auto-generated callback registry
│   ├── logs/                          # Log files
│   └── cache/                         # Conversation cache
├── index.php                          # Webhook entry point
├── config.php                         # Bot configuration
└── config.example.php                 # Config template
```

---

## Features

### Commands

Commands are classes that extend `Commands` and use the `#[Command]` attribute:

```php
#[Command('/start')]
class Start extends Commands
{
    public function execute(): void
    {
        $this->reply("Hello!");
    }

    public static function description(): string
    {
        return 'Start command';
    }
}
```

### Callbacks

Callback query handlers extend `Callbacks` and use the `#[Callback]` attribute:

```php
#[Callback('option1')]
class Option1 extends Callbacks
{
    public function execute(): void
    {
        $this->answerCallbackQuery($this->callback->id);
        $this->reply("Option selected");
    }
}
```

### Keyboards

Build inline and reply keyboards using the fluent API:

```php
$inline = Keyboard::inline()
    ->row(
        InlineButton::make('Option 1')->callback('data1'),
        InlineButton::make('Option 2')->callback('data2'),
    )
    ->build();

$reply = Keyboard::reply()
    ->row(ReplyButton::make('Contact')->requestContact())
    ->resize()->oneTime()
    ->build();
```

### Conversations

Multi-step conversations are handled by extending `Conversations`:

```php
class RegisterConversation extends Conversations
{
    public function start(): void
    {
        $this->ask("What's your name?", 'name');
    }

    public function name(): void
    {
        $name = $this->update->message->getText();
        $this->ask("Hi $name, how old are you?", 'age');
    }

    public function age(): void
    {
        // ...
        $this->stopConversation();
    }
}
```

### Middlewares

Middlewares run before commands and can abort execution:

```php
class AuthMiddleware extends Middlewares
{
    public function handle(\Closure $next)
    {
        if (!$this->isAdmin()) {
            $this->abort('Access denied');
            return;
        }
        return $next();
    }
}
```

### Text formatting

xBot provides a `FormatHelper` for Telegram-formatted text:

```php
FormatHelper::bold('bold text');
FormatHelper::italic('italic text');
FormatHelper::inlineCode('code');
FormatHelper::expandableBlockQuote('quote');
FormatHelper::link('text', 'https://...');
```

---

## CLI Usage

xBot includes a CLI tool for common tasks:

```bash
# Set webhook
php vendor/bin/xbot hook:set https://your-site.com/index.php

# Check webhook info
php vendor/bin/xbot hook:info

# Delete webhook
php vendor/bin/xbot hook:delete

# Register commands and callbacks
php vendor/bin/xbot register

# Generate new command class
php vendor/bin/xbot telegram:command

# Generate new callback class
php vendor/bin/xbot telegram:callback

# Generate new conversation class
php vendor/bin/xbot telegram:conversation

# Generate new middleware
php vendor/bin/xbot telegram:middleware
```

---

## Running the bot

### Webhook mode (recommended)

Point your webhook to `index.php`:

```bash
php vendor/bin/xbot hook:set https://your-domain.com/index.php
```

The bot processes updates automatically on each webhook call.

---

## License

This project is licensed under the MIT License. See [LICENSE](LICENSE).

---

*Built with [xBot](https://github.com/al3x5dev/xbot)*
