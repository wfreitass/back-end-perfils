<?php

namespace App\Interfaces;

interface TarefaServiceInterface extends BaseServiceInterface
{
    public function finalizar($id);
}
