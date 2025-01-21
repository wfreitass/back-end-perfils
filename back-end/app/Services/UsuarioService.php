<?php

namespace App\Services;

use App\Interfaces\UsuarioRepositoryInterface;
use App\Interfaces\UsuarioServiceInterface;
use App\Models\User;

class UsuarioService extends  BaseService implements UsuarioServiceInterface
{
    protected $usuario;

    public function __construct(UsuarioRepositoryInterface $usuario)
    {
        $this->usuario = $usuario;
        parent::__construct($usuario);
    }


    public function syncPerfils(array $data, User $usuario)
    {
        $this->usuario->syncPerfils($data, $usuario);
    }
}
