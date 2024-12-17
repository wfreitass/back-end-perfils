import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-listagem-tarefas',
  standalone: false,
  
  templateUrl: './listagem-tarefas.component.html',
  styleUrl: './listagem-tarefas.component.scss'
})
export class ListagemTarefasComponent {
  username: string = '';

  constructor(private router: Router) {}

  ngOnInit() {
    const user = localStorage.getItem('user');
    if (user) {
      this.username = JSON.parse(user).name; // Presume que a API retorna o nome do usuário
    } else {
      // Caso não haja usuário, redirecione para o login
      this.router.navigate(['/login']);
    }
  }
}
