<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->count() === 0) {
            $this->command->info('No users found. Please seed users first.');
            return;
        }

        Article::factory()->count(30)->make()->each(function ($article) use ($users) {
            $article->user_id = $users->random()->id;
            $article->save();
        });
    }
}
