<?php

namespace App\Repositories;

use App\Interfaces\UsuarioRepositoryInterface;
use App\Models\User;

class UsuarioRepository extends BaseRepository implements UsuarioRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        parent::__construct($user);
    }

    public function syncPerfils(array $data, User $usuario)
    {
        $usuario->perfils()->sync($data);
    }
}
