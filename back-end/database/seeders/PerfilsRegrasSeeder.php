<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perfil;
use App\Models\Regra;

class PerfilsRegrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regrasTarefas = [
            ['nome' => 'criar_tarefa', 'descricao' => 'Permissão para criar tarefas'],
            ['nome' => 'editar_tarefa', 'descricao' => 'Permissão para editar tarefas'],
            ['nome' => 'excluir_tarefa', 'descricao' => 'Permissão para excluir tarefas'],
            ['nome' => 'visualizar_tarefa', 'descricao' => 'Permissão para visualizar tarefas'],
        ];

        $regrasCategorias = [
            ['nome' => 'criar_categoria', 'descricao' => 'Permissão para criar categorias'],
            ['nome' => 'editar_categoria', 'descricao' => 'Permissão para editar categorias'],
            ['nome' => 'excluir_categoria', 'descricao' => 'Permissão para excluir categorias'],
            ['nome' => 'visualizar_categoria', 'descricao' => 'Permissão para visualizar categorias'],
        ];

        $tarefaRules = collect($regrasTarefas)->map(fn($regra) => Regra::create($regra));
        $categoriaRules = collect($regrasCategorias)->map(fn($regra) => Regra::create($regra));

        $perfilTarefas = Perfil::create([
            'nome' => 'Tarefas',
            'descricao' => 'Perfil responsável por gerenciar tarefas',
        ]);

        $perfilCategorias = Perfil::create([
            'nome' => 'Categorias',
            'descricao' => 'Perfil responsável por gerenciar categorias',
        ]);

        $perfilAdmin = Perfil::create([
            'nome' => 'Admin',
            'descricao' => 'Perfil com todas as permissões do sistema',
        ]);

        $perfilTarefas->regras()->sync($tarefaRules->pluck('id'));
        $perfilCategorias->regras()->sync($categoriaRules->pluck('id'));

        $perfilAdmin->regras()->sync(
            $tarefaRules->pluck('id')->merge($categoriaRules->pluck('id'))
        );
    }
}
