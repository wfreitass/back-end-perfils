<?php

namespace App\Models;

use App\Observers\TarefaObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[ObservedBy([TarefaObserver::class])]
class Tarefa extends Model
{
    /** @use HasFactory<\Database\Factories\TarefaFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'status',
        'user_id',
    ];

    /**
     *
     * @return HasOne
     * 
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
