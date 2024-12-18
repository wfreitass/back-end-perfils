<?php

namespace App\Observers;

use App\Enums\StatusEnum;
use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TarefaObserver
{


    /**
     * @param Tarefa $tarefa
     * 
     */
    public function creating(Tarefa $tarefa)
    {
        $tarefa->user_id = Auth::id() ?? User::first()->id;
        $tarefa->status = StatusEnum::PENDENTE;
    }

    /**
     * Handle the Tarefa "created" event.
     */
    public function created(Tarefa $tarefa): void
    {
        //
    }

    /**
     * Handle the Tarefa "updated" event.
     */
    public function updated(Tarefa $tarefa): void
    {
        //
    }

    /**
     * Handle the Tarefa "deleted" event.
     */
    public function deleted(Tarefa $tarefa): void
    {
        //
    }

    /**
     * Handle the Tarefa "restored" event.
     */
    public function restored(Tarefa $tarefa): void
    {
        //
    }

    /**
     * Handle the Tarefa "force deleted" event.
     */
    public function forceDeleted(Tarefa $tarefa): void
    {
        //
    }
}
