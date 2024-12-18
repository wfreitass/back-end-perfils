import { Component } from '@angular/core';
import { AuthService } from '../service/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: false,

  templateUrl: './login.component.html',
  styleUrl: './login.component.scss'
})
export class LoginComponent {
  email: string = '';
  password: string = '';

  errorMensage: string = "";

  constructor(private authService: AuthService, private router: Router) { }

  onLogin() {
    this.authService.login({ email: this.email, password: this.password })
      .subscribe({
        next: (response) => {
          localStorage.setItem('authToken', response.data[0].token);
          localStorage.setItem('user', JSON.stringify(response.data[0].user));
          // console.log(response)
          this.router.navigate(['/listagem-tarefas']);
        },
        error: (error) => {
          this.errorMensage = "Autenticação Inválida";
        }
      });
  }
}
