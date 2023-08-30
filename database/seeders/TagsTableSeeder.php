<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'NFTs'
            ],
            [
                'name' => 'Blockchain',
            ],
            [
                'name' => 'Ethereum',
            ],
            [
                'name' => 'ERC721',
            ],
            [
                'name' => 'ERC1155',
            ],
            [
                'name' => 'DigitalArt',
            ],
            [
                'name' => 'CryptoCollectibles',
            ],
            [
                'name' => 'VirtualRealEstate',
            ],
            [
                'name' => 'Gaming',
            ],
            [
                'name' => 'Environment',
            ],
        ];


        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
