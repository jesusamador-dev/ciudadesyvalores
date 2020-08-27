<?php

use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Access::class, 10)->create()->each(function ($user) {
            factory(App\User::class)->create([
                'idUser' => $user->id
            ]);
            factory(App\Address::class)->create([
                'idUser' => $user->id
            ]);
        });
    }
}
