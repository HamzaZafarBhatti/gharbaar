<?php

namespace Database\Seeders;

use App\Models\Blogger;
use Illuminate\Database\Seeder;

class BloggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Blogger::factory(3)->create();
    }
}
