<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Project::class, 50)->create();
        factory(App\User::class, 100)->create();
        
        
        DB::table('categories')->insert([
            'name' => "Tools",
        ]);

        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@fundrail.com",
            'role_type' => "1",
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
