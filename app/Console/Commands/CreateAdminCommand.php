<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:create-admin {username} {firstName} {secondName} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        User::create([
            'username'  =>  $this->argument('username'),
            'first_name'  =>  $this->argument('firstName'),
            'second_name'  =>  $this->argument('secondName'),
            'role'  =>  User::ROLE_ADMIN,
            'email' =>  $this->argument('email'),
            'password'  =>  bcrypt($this->argument('password'))
        ]);
    }
}
