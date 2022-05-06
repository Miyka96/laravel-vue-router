<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::create([
            'name' => 'Micaela',
            'email' => 'micaela@micaela.com',
            'password' => Hash::make('mica123'),
        ]);

        for ($i=0; $i < 20 ; $i++) { 
            User::create([
                'name'=>$faker->name(),
                'email'=>$faker->unique()->email(),
                'password'=>Hash::make($faker->password()),
            ]);
        }
    }
}
