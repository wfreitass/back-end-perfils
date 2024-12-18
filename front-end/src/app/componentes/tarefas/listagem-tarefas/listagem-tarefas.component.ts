import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Tarefa } from '../../../interfaces/tarefa.interface';
import { TarefaService } from '../../../service/tarefa.service';
import { TarefaStatus } from '../../../enums/tarefa-status.enum';

@Component({
  selector: 'app-listagem-tarefas',
  standalone: false,

  templateUrl: './listagem-tarefas.component.html',
  styleUrl: './listagem-tarefas.component.scss'
})
export class ListagemTarefasComponent {
  username: string = '';
  tarefas: Tarefa[] = [];
  erro: string | null = null;
  TarefaStatus = TarefaStatus;


  constructor(private router: Router,
    private tarefaService: TarefaService
  ) { }

  ngOnInit() {
    this.buscarTarefas();
    console.log(TarefaStatus.PENDENTE);
  }

  buscarTarefas(): void {
    this.tarefaService.getTarefas().subscribe({
      next: (response) => {
        this.tarefas = response.data;
      },
      error: (err) => console.error('Erro ao buscar tarefas', err)
    });
  }

  editarTarefa(id: number): void {
    this.router.navigate([`formulario-tarefas/editar/`, id]);
  }

  deletarTarefa(id: number): void {
    if (confirm('Tem certeza que deseja excluir esta tarefa?')) {
      this.tarefaService.deletarTarefa(id).subscribe({
        next: () => {
          this.tarefas = this.tarefas.filter((tarefa) => tarefa.id !== id);
        },
        error: (err) => {
          this.erro = 'Erro ao excluir tarefa. Tente novamente.';
          console.error(err);
        },
      });
    }
  }

  finalizarTarefa(id: number): void {
    this.tarefaService.finalizarTarefa(id).subscribe({
      next: (response) => {
        this.buscarTarefas()
      },
      error: (err) => console.error('Erro ao buscar tarefas', err)
    });
  }


  getCorStatus(tarefa: Tarefa): string {
    return tarefa.status == TarefaStatus.PENDENTE ? "text-warning" : "text-success"
  }
}
