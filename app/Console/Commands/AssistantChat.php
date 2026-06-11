<?php

namespace App\Console\Commands;

use App\Ai\Agents\PersonalAssistant;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

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
            $input = $this->ask('Ask me a question (exit to stop)');

            if ($input === 'exit') {
                $this->info('Goodbye 👋');
                break;
            }

            $response = (new PersonalAssistant)
                ->prompt($input);

            $this->info('Answer: '.$response);
        }
    }
}
