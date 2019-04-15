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
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
