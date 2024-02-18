<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateAgentUserAndRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:agent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        $user = User::factory()->create([
            'name' => 'Agent',
            'email' => 'agent@example.email',
            'password' => bcrypt('agent@example.email'),
        ]);

        $user->roles()->create(['name' => 'agent']);

        $agentRole = Role::findByName('agent');
        $agentRole->givePermissionTo([
            'view_vehicle::entry',
            'view_any_vehicle::entry',
            'create_vehicle::entry',
            'update_vehicle::entry',
            'restore_vehicle::entry',
            'restore_any_vehicle::entry',
            'replicate_vehicle::entry',
            'reorder_vehicle::entry',
            'delete_vehicle::entry',
            'delete_any_vehicle::entry',
            'force_delete_vehicle::entry',
            'force_delete_any_vehicle::entry',
        ]);
    }
}
