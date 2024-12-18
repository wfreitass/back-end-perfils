<?php

namespace App\Repositories;

use App\Enums\StatusEnum;
use App\Interfaces\TarefaRepositoryInterface;
use App\Models\Tarefa;

class TarefaRepository extends BaseRepository implements TarefaRepositoryInterface
{
    protected $tarefa;

    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa;
        parent::__construct($tarefa);
    }

    public function finalizar($id)
    {
        $tarefa = $this->tarefa->find($id);
        $tarefa->update(["status" => StatusEnum::CONCLUIDO]);

        return $tarefa;
    }
}
