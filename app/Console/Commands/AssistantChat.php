<?php

namespace App\Console\Commands;

use App\Ai\Agents\PersonalAssistant;
use App\Models\User;
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
            $user_id = $this->ask('Enter user ID (exit to stop): ');
            $question = $this->ask('Enter question (exit to stop): ');

            if ($user_id === 'exit' || $question === 'exit') {
                $this->info('Goodbye 👋');
                break;
            }

            $user = User::find($user_id, 'id');

            $response = (new PersonalAssistant)->forUser($user)
                ->prompt($question);

            $this->info('Answer: '.$response);
        }
    }
}
