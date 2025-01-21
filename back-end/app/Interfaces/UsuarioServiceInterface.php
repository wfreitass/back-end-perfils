<?php

namespace App\Interfaces;

use App\Models\User;

interface UsuarioServiceInterface extends BaseServiceInterface
{
    public function syncPerfils(array $data, User $usuario);
}
