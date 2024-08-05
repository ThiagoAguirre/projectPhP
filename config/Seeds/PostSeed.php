<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Faker\Factory;

/**
 * Post seed.
 */
class PostSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [];
        $faker = Factory::create();

        for ($i = 0; $i <= 100; $i++) { 
            $title = $faker->sentence(5);
            $data[] = [
                'title' => $title,
                'slug' => strtolower(str_replace([' ', '.'], ['-', ''], $title)),
                'user_id' => $faker->numberBetween(1, 20),
                'content' => $faker->paragraph(2),
            ];
        }

        $table = $this->table('posts');
        $table->insert($data)->save();
    }
}