import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Tarefa } from '../../../interfaces/tarefa.interface';
import { TarefaService } from '../../../service/tarefa.service';

@Component({
  selector: 'app-listagem-tarefas',
  standalone: false,
  
  templateUrl: './listagem-tarefas.component.html',
  styleUrl: './listagem-tarefas.component.scss'
})
export class ListagemTarefasComponent {
  username: string = '';
  tarefas: Tarefa[] = [];

  constructor(private router: Router,
    private tarefaService: TarefaService
  ) {}

  ngOnInit() {
    const user = localStorage.getItem('user');
    if (user) {
      this.username = JSON.parse(user).name; // Presume que a API retorna o nome do usuário
    } else {
      // Caso não haja usuário, redirecione para o login
      this.router.navigate(['/login']);
    }

    this.buscarTarefas();
  }



   // Busca todas as tarefas
   buscarTarefas(): void {
    this.tarefaService.getTarefas().subscribe({
      next: (response) => {
        this.tarefas = response.data;
      },
      error: (err) => console.error('Erro ao buscar tarefas', err)
    });
  }
}
