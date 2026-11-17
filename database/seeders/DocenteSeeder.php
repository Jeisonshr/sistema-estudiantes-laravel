<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class DocenteSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('DOCENTE_EMAIL');
        $password = env('DOCENTE_CLAVE');

        if (!$email || !$password) {
            throw new RuntimeException(
                'Configura DOCENTE_EMAIL y DOCENTE_CLAVE en el archivo .env.'
            );
        }

        User::firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Docente',
                'password' => Hash::make($password),
            ]
        );
    }
}
