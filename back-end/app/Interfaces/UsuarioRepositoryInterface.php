<?php

namespace App\Interfaces;

use App\Models\User;

interface UsuarioRepositoryInterface extends BaseRepositoryInterface
{
    public function syncPerfils(array $data, User $usuario);
}
