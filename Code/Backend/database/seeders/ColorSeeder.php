<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            'transparent',
            'red',
            'green',
            'black',
            'white',
            'yellow',
            'blue',
            'orange',
            'pink',
            'gray',
            'purpel',
            'brown',
            'mixte'
        ];

        foreach ($colors as $color) {
            Color::create([
                'colors' => $color,
            ]);
        }
    }
}