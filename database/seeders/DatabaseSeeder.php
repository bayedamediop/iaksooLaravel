<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $profil1 = Profil::create([
            'libelle' => 'Admin',
            'archivage' => 0,
        ]);
        $profil2 = Profil::create([
            'libelle' => 'Agence',
            'archivage' => 0,
        ]);
        $profil3 = Profil::create([
            'libelle' => 'Utilisateur',
            'archivage' => 0,
        ]);
        $profil4 = Profil::create([
            'libelle' => 'Client',
            'archivage' => 0,
        ]);
        // ADMIN
        $admin = User::create([
            'nom' => 'Diop',
            'prenom' => 'Moussa',
            'telephone' => '772552219',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'profil_id' => $profil1->id,
            'remember_token' => Str::random(60),
            'archivage' => 0,
        ]);

    }
}
