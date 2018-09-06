<?php
use Illuminate\Database\Seeder;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	'can approve',
        	'can authorize',
        ];
        foreach ($permissions as $permission) {
        	\Spatie\Permission\Models\Permission::create([
        		'name' => $permission,
        	]);
        }
    }
}