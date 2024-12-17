<?php

namespace App\Enums;

enum StatusEnum: string
{
    case PENDENTE = 'pendente';
    case CONCLUIDO = 'concluido';

    /**
     * Retorna o nome formatado do status.
     */
    public function label(): string
    {
        return match ($this) {
            self::PENDENTE => 'Pendente',
            self::CONCLUIDO => 'Concluído',
        };
    }

    /**
     * Lista todos os rótulos do enum.
     */
    public static function labels(): array
    {
        return array_map(fn($case) => $case->label(), self::cases());
    }
}
