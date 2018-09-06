<?php
use Illuminate\Database\Seeder;
class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed dummy users
        factory(\App\User::class, 100)
            ->create()
            ->each(function($user) {
                $user->assignRole('user');
                if($user->department->code == 'teknologi-maklumat') {
                    $user->assignRole('ict');
                }
            });
        // seed admin user
        factory(\App\User::class)->create([
            'email' => 'admin@app.com',
        ])->assignRole('admin', 'user');
        // get random users
        $users = \App\User::inRandomOrder()->limit(10)->get();
        // get random peralatan
        $peralatan = \App\Models\Peralatan::inRandomOrder()->limit(4)->get();
        
        // seed applications
        foreach ($users as $user) {
            factory(\App\Models\Application::class, 2)->create([
                'user_id' => $user->id,
            ])->each(function($application) use ($user, $peralatan) {
                \App\Models\ApplicationEquipment::create([
                    'application_id' => $application->id,
                    'peralatan_id' => $peralatan->shuffle()->first()->id,
                    'quantity' => 3,
                ]);
            });
        }
    }
}