<?php

namespace Database\Seeders;

use App\Models\Likes;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin123"),
            "role" => "admin",
        ]);

        User::factory(5)
            ->has(
                Likes::factory()
                    ->count(4)
                    ->state(
                        function (array $attributes, User $user){
                            return ["user_id" => $user->id];
                        }
                    )
                )->create();
    }
}
