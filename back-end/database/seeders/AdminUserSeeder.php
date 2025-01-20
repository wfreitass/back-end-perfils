<?php

namespace Database\Seeders;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * @return void
     * 
     */
    public function run(): void
    {
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminPerfil = Perfil::where('nome', 'Admin')->first();

        if ($adminPerfil) {
            $adminUser->perfils()->attach($adminPerfil->id);

            $this->command->info('Usuário Admin criado com sucesso e associado ao perfil Admin!');
        } else {
            $this->command->error('Perfil Admin não encontrado. Execute a PerfilsRegrasSeeder primeiro.');
        }
    }
}
