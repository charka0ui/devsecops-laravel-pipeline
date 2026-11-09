<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Compte administrateur : cible typique d'une injection SQL UNION (VULN-01)
        User::create([
            'name' => 'Administrateur',
            'email' => 'admin@techshop-demo.local',
            'password' => Hash::make('ChangeMe-Demo-2026'),
        ]);

        $products = [
            ['Clavier mécanique', 'Switches rouges, rétroéclairage RGB', 89.90],
            ['Souris sans fil', 'Capteur 16 000 DPI', 49.90],
            ['Écran 27 pouces', 'IPS, 144 Hz', 279.00],
            ['Casque audio', 'Réduction de bruit active', 129.00],
            ['Webcam HD', '1080p, micro intégré', 59.00],
            ['Disque SSD 1 To', 'NVMe PCIe 4.0', 99.00],
        ];

        foreach ($products as [$name, $description, $price]) {
            Product::create(compact('name', 'description', 'price'));
        }
    }
}
