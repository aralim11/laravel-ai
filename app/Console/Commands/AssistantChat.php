<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

use function Laravel\Prompts\text;

#[Signature('chat')]
#[Description('Command description')]
class AssistantChat extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        while (true) {
            $input = $this->ask('Ask me a question (type exit to stop)');
            $name = text('What is your name?');

            if ($input === 'exit') {
                $this->info('Goodbye 👋');
                break;
            }

            // $this->error('Something went wrong.');
            // $this->info("You asked: $input");
        }
    }
}
