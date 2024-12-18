import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { TarefaService } from '../../../service/tarefa.service';

@Component({
  selector: 'app-formulario-tarefas',
  standalone: false,

  templateUrl: './formulario-tarefas.component.html',
  styleUrl: './formulario-tarefas.component.scss'
})
export class FormularioTarefasComponent {
  tarefaForm: FormGroup;
  sucesso: string | null = null;
  erro: string | null = null;
  tarefaId: number | null = null;
  modoEdicao: boolean = false;


  constructor(
    private fb: FormBuilder,
    private tarefaService: TarefaService,
    private route: ActivatedRoute,
    private router: Router) {

    this.tarefaForm = this.fb.group({
      titulo: ['', [Validators.required, Validators.minLength(3)]],
      descricao: ['', []],
      // descricao: ['', [Validators.required, Validators.maxLength(500)]],
    });
  }

  ngOnInit(): void {
    this.route.paramMap.subscribe((params) => {
      const id = params.get('id');
      if (id) {
        this.tarefaId = +id;
        this.modoEdicao = true;
        this.carregarTarefa(this.tarefaId);
      }
    });
  }

  // Carrega a tarefa para edição
  carregarTarefa(id: number): void {
    this.tarefaService.carregarTarefa(id).subscribe({
      next: (response) => {
        this.tarefaForm.patchValue(response.data); // Atualiza o formulário com os dados da tarefa
      },
      error: (err) => {
        this.erro = 'Erro ao carregar tarefa. Verifique novamente.';
        console.error(err);
      },
    });
  }


  // Submissão do formulário
  onSubmit(): void {
    if (this.tarefaForm.valid) {
      if (this.modoEdicao && this.tarefaId) {
        // Atualizar tarefa
        this.tarefaService.atualizarTarefa(this.tarefaId, this.tarefaForm.value).subscribe({
          next: () => {
            this.sucesso = 'Tarefa atualizada com sucesso!';
            this.erro = null;
            this.router.navigate(['/listagem-tarefas']);
          },
          error: (err) => {
            this.erro = 'Erro ao atualizar a tarefa.';
            this.sucesso = null;
            console.error(err);
          },
        });
      } else {
        // Criar nova tarefa
        this.tarefaService.criarTarefa(this.tarefaForm.value).subscribe({
          next: () => {
            this.sucesso = 'Tarefa criada com sucesso!';
            this.erro = null;
            this.tarefaForm.reset();
            this.router.navigate(['/listagem-tarefas']);
          },
          error: (err) => {
            this.erro = 'Erro ao criar a tarefa.';
            this.sucesso = null;
            console.error(err);
          },
        });
      }
    }
  }
}
