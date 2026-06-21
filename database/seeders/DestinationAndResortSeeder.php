<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Resort;

class DestinationAndResortSeeder extends Seeder
{
    public function run(): void
    {
        $swiss = Destination::create([
            'name' => 'Switzerland Alps',
            'description' => 'Enjoy the beauty of the Alps with their eternal snow and the world’s best ski slopes.',
            'image' => 'https://images.unsplash.com/photo-1502784444187-359ac186c5bb?auto=format&fit=crop&w=800&q=80'
        ]);

        Resort::create([
            'destination_id' => $swiss->id,
            'name' => 'Zermatt Luxury Ski Lodge',
            'country' => 'Switzerland',
            'description' => 'A 5-star resort with a direct view of the Matterhorn. Amenities include a private heated jacuzzi.',
            'price' => 1500000, 
            'image' => 'https://images.unsplash.com/photo-1544911845-1f34a3155b77?auto=format&fit=crop&w=800&q=80'
        ]);

        Resort::create([
            'destination_id' => $swiss->id,
            'name' => 'St. Moritz Alpine Resort',
            'country' => 'Switzerland',
            'description' => 'An iconic resort for professional skiers with direct access to the ski slopes.',
            'price' => 2000000, 
            'image' => 'https://images.unsplash.com/photo-1482862549707-f63cb32c5fd9?auto=format&fit=crop&w=800&q=80'
        ]);

        $japan = Destination::create([
            'name' => 'Hokkaido, Japan',
            'description' => 'Known for its world-class "Powder Snow," enjoy the thrill of night skiing and traditional hot springs (Onsen).',
            'image' => 'https://images.unsplash.com/photo-1498084393753-b411b2d26b34?auto=format&fit=crop&w=800&q=80'
        ]);

        Resort::create([
            'destination_id' => $japan->id,
            'name' => 'Niseko Snow Cabin',
            'country' => 'Japan',
            'description' => 'A blend of traditional Japanese wooden cabins and modern amenities. Very close to Hokkaido’s culinary hub.',
            'price' => 1200000, 
            'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=800&q=80'
        ]);
    }
}