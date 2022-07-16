<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
        User::create([
            'name' => 'Kevin Darmawan',
            'UUID' => \Illuminate\Support\Str::uuid()->toString(),
            'email' => 'kevindarmawan022@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'ADMIN',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
        \App\Models\User::factory(3)->create();

        Post::factory(20)->create();

        Category::create([
            'name' => 'Other..',
            'slug' => 'other',
            'description' => 'Other Category'
        ]);

        Category::create([
            'name' => 'Sport',
            'slug' => 'sport',
            'description' => 'an activity involving physical exertion and skill in which an individual or team competes against another or others for entertainment.'
        ]);

        Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
            'description' => 'the application of scientific knowledge for practical purposes, especially in industry.
            "advances in computer technology"'
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'Programming',
            'description' => 'the process or activity of writing computer programs.'
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
            'description' => 'the way in which a person or group lives.
            "the benefits of a healthy lifestyle"'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'description' => 'Web design encompasses many different skills and disciplines in the production and maintenance of websites. '
        ]);

        Category::create([
            'name' => 'News',
            'slug' => 'news',
            'description' => 'newly received or noteworthy information, especially about recent or important events.'
        ]);

        Category::create([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
            'description' => 'the action of providing or being provided with amusement or enjoyment.'
        ]);

        Category::create([
            'name' => 'Computer',
            'slug' => 'computer',
            'description' => 'an electronic device for storing and processing data, typically in binary form, according to instructions given to it in a variable program.'
        ]);

        Category::create([
            'name' => 'Education',
            'slug' => 'education',
            'description' => 'the process of receiving or giving systematic instruction, especially at a school or university.'
        ]);

    }
}