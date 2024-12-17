<?php

namespace App\Repositories;

use App\Interfaces\TarefaRepositoryInterface;
use App\Models\Tarefa;

class TarefaRepository extends BaseRepository implements TarefaRepositoryInterface
{
    public function __construct(Tarefa $tarefa)
    {
        parent::__construct($tarefa);
    }
}
