<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];


    /**
     * @return BelongsToMany
     * 
     */
    public function regras(): BelongsToMany
    {
        return $this->belongsToMany(Regra::class, 'perfil_regra');
    }

    /**
     *
     * @return BelongsToMany
     * 
     */
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_perfil');
    }
}
