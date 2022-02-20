<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostVote;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= rand(10,20); $i++) {
            Rating::create([
                'post_id' => 1,
                'rating' => rand(1,5)
            ]);
        }
    }
}
