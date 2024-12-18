import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { AuthService } from '../service/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-resgistrar',
  standalone: false,

  templateUrl: './resgistrar.component.html',
  styleUrl: './resgistrar.component.scss'
})
export class ResgistrarComponent {
  cadastroForm: FormGroup;
  mensagemSucesso: string | null = null;
  mensagemErro: string | null = null;

  constructor(private fb: FormBuilder, private authService: AuthService, private router: Router) {
    this.cadastroForm = this.fb.group({
      name: ['', [Validators.required]],
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(3)]],
    });
  }
  cadastrarUsuario() {
    if (this.cadastroForm.valid) {
      this.authService.cadastrarUsuario(this.cadastroForm.value).subscribe({
        next: (response) => {
          this.mensagemSucesso = 'Usuário cadastrado com sucesso!';
          this.mensagemErro = null;
          this.cadastroForm.reset();


          localStorage.setItem('authToken', response.data[0].token);
          localStorage.setItem('user', JSON.stringify(response.data[0].user));
          this.router.navigate(['/listagem-tarefas']);
        },
        error: (err) => {
          this.mensagemErro = err.error.message;
          this.mensagemSucesso = null;
        }
      });
    }
  }
}
