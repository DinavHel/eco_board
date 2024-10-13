<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:admin-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an Admin for the dashboard';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $admin = new User();
        $admin->name = $this->ask('Introduza o nome do administrador: ');
        $admin->email = $this->ask('Introduza o email do administrador: ');
        $admin->password = $this->secret('Introduza o contrasinal do administrador: ');
        $admin->save();

        $this->info('Admin created successfully.');

        return Command::SUCCESS;
    }
}
