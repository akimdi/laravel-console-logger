<?php

use Illuminate\Console\Command;
use Illuminated\Console\Loggable;

class CommandWithInvalidNotificationRecipients extends Command
{
    use Loggable;

    protected $signature = 'command-with-invalid-notification-recipients';

    protected function getEmailNotificationRecipients()
    {
        return [
            ['address' => 'not_an_email', 'name' => 'John Doe'],
            ['address' => false, 'name' => 'John Doe'],
            ['address' => null, 'name' => 'Jane Smith'],
            ['name' => 'Jane Smith'],
        ];
    }

    public function handle()
    {
    }

    public function mailerHandler()
    {
        return last($this->icLogger()->getHandlers());
    }
}
