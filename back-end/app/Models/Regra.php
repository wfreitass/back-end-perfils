<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Regra extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    /**
     *
     * @return BelongsToMany
     * 
     */
    public function perfils(): BelongsToMany
    {
        return $this->belongsToMany(Perfil::class, 'perfil_regra');
    }
}
