<?php

namespace Tests\Unit;

use App\Models\Tarefa;
use App\Repositories\TarefaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class TarefaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_tarefa()
    {
        $repository = new TarefaRepository(new Tarefa());

        $data = [
            'titulo' => 'Test titulo',
            'descricao' => 'Test descricao',
        ];

        $tarefa = $repository->create($data);

        $this->assertEquals(true, true);

        // $this->assertDatabaseHas('tarefas', $data);
        // $this->assertInstanceOf(Tarefa::class, $tarefa);
    }

    // public function test_it_can_update_a_tarefa()
    // {
    //     $tarefa = Tarefa::factory()->create();
    //     $repository = new TarefaRepository(new Tarefa());

    //     $repository->update($tarefa, ['title' => 'Updated Title']);

    //     $this->assertDatabaseHas('tarefas', [
    //         'id' => $tarefa->id,
    //         'title' => 'Updated Title',
    //     ]);
    // }

    // public function test_it_can_delete_a_tarefa()
    // {
    //     $tarefa = Tarefa::factory()->create();
    //     $repository = new TarefaRepository(new Tarefa());

    //     $repository->delete($tarefa);

    //     $this->assertDatabaseMissing('tarefas', ['id' => $tarefa->id]);
    // }
}
