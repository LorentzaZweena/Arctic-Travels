<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Resort;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'price' => 83.50, 
            'image' => 'https://images.unsplash.com/photo-1515496281361-241a540151a5?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8d2ludGVyJTIwcmVzb3J0fGVufDB8MHwwfHx8MA%3D%3D'
        ]);

        Resort::create([
            'destination_id' => $swiss->id,
            'name' => 'St. Moritz Alpine Resort',
            'country' => 'Switzerland',
            'description' => 'An iconic resort for professional skiers with direct access to the ski slopes.',
            'price' => 111.34, 
            'image' => 'https://images.unsplash.com/photo-1706794543262-a013701e070c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8d2ludGVyJTIwcmVzb3J0fGVufDB8MHwwfHx8MA%3D%3D'
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
            'price' => 66.80, 
            'image' => 'https://images.unsplash.com/photo-1550503736-c1a2c9033c03?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHdpbnRlciUyMHJlc29ydHxlbnwwfDB8MHx8fDA%3D'
        ]);

        User::create([
            'name' => 'Super Admin Arctic',
            'email' => 'admin@arctic.com',
            'password' => Hash::make('2TC16QAC'),
            'role' => 'admin',
        ]);
    }
}