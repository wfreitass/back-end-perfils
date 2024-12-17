<?php

namespace App\Services;

use App\Interfaces\TarefaRepositoryInterface;
use App\Interfaces\TarefaServiceInterface;

class TarefaService extends  BaseService implements TarefaServiceInterface
{
    public function __construct(TarefaRepositoryInterface $tarefa)
    {
        parent::__construct($tarefa);
    }
}
