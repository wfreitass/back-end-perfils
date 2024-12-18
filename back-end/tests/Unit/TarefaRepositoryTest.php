<?php

namespace Tests\Unit;

use App\Models\Tarefa;
use App\Models\User;
use App\Repositories\TarefaRepository;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class TarefaRepositoryTest extends TestCase
{
    // use RefreshDatabase;

    protected $user;

    protected TarefaRepository $tarefaRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::first();
        $this->tarefaRepository = new TarefaRepository(new Tarefa());
    }

    public function test_it_can_create_a_tarefa()
    {
        // Arrange
        $data = [
            'titulo' => "Nova Tarefa",
            'descricao' => "1111",
        ];

        // Act
        $tarefa = $this->tarefaRepository->create($data);


        // Assert
        $this->assertDatabaseHas('tarefas', $data);
        $this->assertEquals($data['titulo'], $tarefa->titulo);
    }

    public function test_it_can_update_a_tarefa()
    {
        $tarefa = Tarefa::factory()->create();

        $this->tarefaRepository->update($tarefa->id, ['titulo' => 'Updated Title aiaiaiaiia']);

        $this->assertDatabaseHas('tarefas', [
            'id' => $tarefa->id,
            'titulo' => 'Updated Title aiaiaiaiia',
        ]);
    }

    public function test_it_can_delete_a_tarefa()
    {
        $tarefa = Tarefa::factory()->create();

        $this->tarefaRepository->delete($tarefa->id);

        $this->assertDatabaseMissing('tarefas', ['id' => $tarefa->id]);
    }
}
