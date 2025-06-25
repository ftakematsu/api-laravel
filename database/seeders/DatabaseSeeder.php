<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // Passando um map (array de chave-valor)
        $user1 = User::create([
            'name' => 'Administrador Root',
            'email' => 'root@root.com',
            'password' => Hash::make('1234')
        ]);

        Item::create([
            'name' => "Item 1",
            'value' => 100,
            'user_id' => $user1->id
        ]);

        Item::create([
            'name' => "Item 2",
            'value' => 200,
            'user_id' => $user1->id
        ]);
    }
}
