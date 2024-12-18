import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { ListagemTarefasComponent } from './componentes/tarefas/listagem-tarefas/listagem-tarefas.component';
import { FormularioTarefasComponent } from './componentes/tarefas/formulario-tarefas/formulario-tarefas.component';

const routes: Routes = [
  { path: '', redirectTo: '/login', pathMatch: 'full' }, // Rota padrão
  { path: 'login', component: LoginComponent },
  { path: 'listagem-tarefas', component: ListagemTarefasComponent },
  { path: 'formulario-tarefas', component: FormularioTarefasComponent },
  { path: 'formulario-tarefas/editar/:id', component: FormularioTarefasComponent },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
