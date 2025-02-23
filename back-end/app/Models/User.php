<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     *
     * @return BelongsToMany
     * 
     */
    public function perfils(): BelongsToMany
    {
        return $this->belongsToMany(Perfil::class, 'user_perfil', 'user_id', 'perfil_id');
    }

    /**
     * Scope para pegar usuário com o devido email!
     * @param Builder $query
     * @param string $email
     * 
     * @return void
     * 
     */
    public function scopeOfEmail(Builder $query, string $email): void
    {
        $query->where('email', $email);
    }


    /**
     *
     * @return bool
     * 
     */
    public function isAdmin(): bool
    {
        $perfils = $this->perfils;
        return  $perfils->contains(
            function ($perfil, $key) {
                return $perfil->nome == "Admin" ? true : false;
            }
        );
    }
}
