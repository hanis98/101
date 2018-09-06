<?php
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	'admin',
        	'user',
        	'ict',
        	'kp'
        ];
        foreach ($roles as $role) {
        	\Spatie\Permission\Models\Role::create([
        		'name' => $role,
        	]);
        }
    }
}