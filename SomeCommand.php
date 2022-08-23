<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SendUserOrderStats;

class SomeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:order_stats {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправляет сводные данные по последним сделкам пользователя';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('user');
        $user = User::where('email', $email)->first();
        if ($user instanceof User) {
            $action = new SendUserOrderStats($user);
            $action->execute();
        }
    }
}
