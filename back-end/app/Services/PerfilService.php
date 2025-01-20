<?php

namespace App\Services;

use App\Interfaces\PerfilRepositoryInterface;
use App\Interfaces\PerfilServiceInterface;


class PerfilService extends  BaseService implements PerfilServiceInterface
{
    protected $perfil;

    public function __construct(PerfilRepositoryInterface $perfil)
    {
        $this->perfil = $perfil;
        parent::__construct($perfil);
    }
}
