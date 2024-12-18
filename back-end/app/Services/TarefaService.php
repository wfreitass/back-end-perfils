<?php

namespace App\Services;

use App\Interfaces\TarefaRepositoryInterface;
use App\Interfaces\TarefaServiceInterface;

class TarefaService extends  BaseService implements TarefaServiceInterface
{
    protected $tarefa;

    public function __construct(TarefaRepositoryInterface $tarefa)
    {
        $this->tarefa = $tarefa;
        parent::__construct($tarefa);
    }

    public function finalizar($id)
    {
        $this->tarefa->finalizar($id);
    }
}
