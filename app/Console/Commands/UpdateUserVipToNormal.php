<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class UpdateUserVipToNormal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UserVip:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change User Vip to Normal';

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
        User::where('role', 'vip')->where('expired', "<=", now())->each(function ($user) {
            $user->update(['role' => 'normal']);
        });
    }
}
