<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
            [
                'username' => 'admin',
                'email' => 'admin@teknokrat.ac.id',
                'password' => 'admin',
                'name' => 'Admin',
                'is_admin' => true,
            ]
        );
        User::create(
            [
                'username' => 'ryanov_akbar',
                'email' => 'ryanov_akbar@teknokrat.ac.id',
                'password' => '21312020',
                'name' => 'Ryanov Akbar',
                'profile_wallpaper' => 'profile_wallpaper/Ryanov_Akbar_Profile_Wallpaper.jpg',
            ]
        );
        User::create(
            [
                'username' => 'muhammad_agung_saputra',
                'email' => 'muhammad_agung_saputra@teknokrat.ac.id',
                'password' => '21312035',
                'name' => 'Muhammad Agung Saputra',
            ]
        );
        User::create(
            [
                'username' => 'muhammad_romza_zikrian',
                'email' => 'muhammad_romza_zikrian@teknokrat.ac.id',
                'password' => '21312052',
                'name' => 'Muhammad Romza Zikrian',
            ]
        );
        
        
        Category::create(
            [
                'name' => 'Full Stack Developer',
                'slug' => 'full-stack-developer',
            ]
        );
        Category::create(
            [
                'name' => 'Mobile App Developer',
                'slug' => 'mobile-app-developer',
            ]
        );
        Category::create(
            [
                'name' => 'Cyber Security',
                'slug' => 'cyber-security',
            ]
        );
        Category::create(
            [
                'name' => 'Back End Developer',
                'slug' => 'back-end-developer',
            ]
        );
        Category::create(
            [
                'name' => 'Front End Developer',
                'slug' => 'front-end-developer',
            ]
        );
        
        
        Post::create(
            [
                'user_id' => 2,
                'category_id' => 1,
                'header' => 'Full Stack Web Development',
                'slug' => 'full-stack-web-development',
                'post_wallpaper' => 'post_wallpaper/Full_Stack_Web_Development_With_Seven_Methods_Post_Wallpaper.jpg',
                'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat blanditiis quas rerum odit deserunt laborum consectetur reprehenderit, voluptatibus nobis in quibusdam corrupti quasi quos quo illo unde vel incidunt consequuntur beatae. Ipsum quis minima rerum, officia saepe voluptatibus veritatis voluptate a mollitia nesciunt dolorum.',
                'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia itaque incidunt totam, mollitia animi illo possimus deleniti aspernatur, nemo modi nihil! Consequatur ex delectus nam ducimus earum facere perferendis, accusantium voluptas debitis blanditiis.</p><p>Facilis et ullam quam provident totam cupiditate deserunt itaque molestiae nesciunt dolores. Deserunt ea libero ipsum incidunt iure magni eaque, reiciendis doloribus ratione voluptatum ullam aliquam cum similique ab fuga dicta, illo temporibus autem molestias quo iusto sequi molestiae! Aut, ipsa quae mollitia nulla nisi, quaerat magni cupiditate corrupti.</p><p>accusamus tenetur non optio nobis itaque debitis impedit veritatis ullam error ipsum quo explicabo molestias corporis. Reiciendis expedita minus delectus quisquam itaque. Quibusdam architecto iusto aspernatur laborum eveniet praesentium commodi ratione nisi exercitationem unde doloribus, quam qui suscipit quae rerum eius libero molestias explicabo odit illum veniam, maiores provident accusantium distinctio? Laborum amet temporibus minus rerum labore libero, perspiciatis hic ex, magnam iure ipsum iste nobis in iusto.</p>',
            ]
        );
        Post::create(
            [
                'user_id' => 2,
                'category_id' => 2,
                'header' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'post_wallpaper' => 'post_wallpaper/Mobile_App_Development_Post_Wallpaper.png',
                'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat blanditiis quas rerum odit deserunt laborum consectetur reprehenderit, voluptatibus nobis in quibusdam corrupti quasi quos quo illo unde vel incidunt consequuntur beatae. Ipsum quis minima rerum, officia saepe voluptatibus veritatis voluptate a mollitia nesciunt dolorum.',
                'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia itaque incidunt totam, mollitia animi illo possimus deleniti aspernatur, nemo modi nihil! Consequatur ex delectus nam ducimus earum facere perferendis, accusantium voluptas debitis blanditiis.</p><p>Facilis et ullam quam provident totam cupiditate deserunt itaque molestiae nesciunt dolores. Deserunt ea libero ipsum incidunt iure magni eaque, reiciendis doloribus ratione voluptatum ullam aliquam cum similique ab fuga dicta, illo temporibus autem molestias quo iusto sequi molestiae! Aut, ipsa quae mollitia nulla nisi, quaerat magni cupiditate corrupti.</p><p>accusamus tenetur non optio nobis itaque debitis impedit veritatis ullam error ipsum quo explicabo molestias corporis. Reiciendis expedita minus delectus quisquam itaque. Quibusdam architecto iusto aspernatur laborum eveniet praesentium commodi ratione nisi exercitationem unde doloribus, quam qui suscipit quae rerum eius libero molestias explicabo odit illum veniam, maiores provident accusantium distinctio? Laborum amet temporibus minus rerum labore libero, perspiciatis hic ex, magnam iure ipsum iste nobis in iusto.</p>',
            ]
        );
        Post::create(
            [
                'user_id' => 2,
                'category_id' => 3,
                'header' => 'Cyber Security',
                'slug' => 'cyber-security',
                'post_wallpaper' => 'post_wallpaper/Cyber_Security_Post_Wallpaper.jpg',
                'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat blanditiis quas rerum odit deserunt laborum consectetur reprehenderit, voluptatibus nobis in quibusdam corrupti quasi quos quo illo unde vel incidunt consequuntur beatae. Ipsum quis minima rerum, officia saepe voluptatibus veritatis voluptate a mollitia nesciunt dolorum.',
                'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia itaque incidunt totam, mollitia animi illo possimus deleniti aspernatur, nemo modi nihil! Consequatur ex delectus nam ducimus earum facere perferendis, accusantium voluptas debitis blanditiis.</p><p>Facilis et ullam quam provident totam cupiditate deserunt itaque molestiae nesciunt dolores. Deserunt ea libero ipsum incidunt iure magni eaque, reiciendis doloribus ratione voluptatum ullam aliquam cum similique ab fuga dicta, illo temporibus autem molestias quo iusto sequi molestiae! Aut, ipsa quae mollitia nulla nisi, quaerat magni cupiditate corrupti.</p><p>accusamus tenetur non optio nobis itaque debitis impedit veritatis ullam error ipsum quo explicabo molestias corporis. Reiciendis expedita minus delectus quisquam itaque. Quibusdam architecto iusto aspernatur laborum eveniet praesentium commodi ratione nisi exercitationem unde doloribus, quam qui suscipit quae rerum eius libero molestias explicabo odit illum veniam, maiores provident accusantium distinctio? Laborum amet temporibus minus rerum labore libero, perspiciatis hic ex, magnam iure ipsum iste nobis in iusto.</p>',
            ]
        );
    }
}