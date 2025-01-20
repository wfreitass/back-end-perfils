<?php

namespace App\Repositories;

use App\Enums\StatusEnum;
use App\Interfaces\PerfilRepositoryInterface;
use App\Interfaces\TarefaRepositoryInterface;
use App\Models\Perfil;
use App\Models\Tarefa;

class PerfilRepository extends BaseRepository implements PerfilRepositoryInterface
{
    protected $perfil;

    public function __construct(Perfil $perfil)
    {
        $this->perfil = $perfil;
        parent::__construct($perfil);
    }
}
