<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Band;
use App\Models\Album;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Utilizador Gestor
        User::create([
            'name' => 'Gestor',
            'email' => 'gestor@minhacena.pt',
            'password' => Hash::make('gestor@minhacena.pt'),
            'user_type' => 1,
        ]);

        // Utilizador Visitante
        User::create([
            'name' => 'Utilizador',
            'email' => 'user@minhacena.pt',
            'password' => Hash::make('user@minhacena.pt'),
            'user_type' => 0,
        ]);

         // Bandas
        $band1 = Band::create([
            'name' => 'Of Monsters and Men',
            'description' => 'Banda islandesa de indie folk.',
            'photo' => null,
        ]);

        $band2 = Band::create([
            'name' => 'Húmus',
            'description' => 'Projeto musical português.',
            'photo' => null,
        ]);

        $band3 = Band::create([
            'name' => 'Evanescence',
            'description' => 'Banda norte-americana de rock alternativo.',
            'photo' => null,
        ]);

        // Álbuns (1 por banda)
        Album::create([
            'band_id' => $band1->id,
            'name' => 'My Head Is an Animal',
            'release_date' => '2011-01-01',
            'cover' => null,
        ]);

        Album::create([
            'band_id' => $band2->id,
            'name' => 'Humans',
            'release_date' => '2019-01-01',
            'cover' => null,
        ]);

        Album::create([
            'band_id' => $band3->id,
            'name' => 'Fallen',
            'release_date' => '2003-01-01',
            'cover' => null,
        ]);
    }
}
