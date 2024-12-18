<?php

namespace App\Interfaces;

interface TarefaRepositoryInterface extends BaseRepositoryInterface
{
    public function finalizar($id);
}
