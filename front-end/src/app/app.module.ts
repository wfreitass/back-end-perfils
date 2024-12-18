import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';
import { LoginComponent } from './login/login.component';
import { AuthInterceptorService } from './service/auth-interceptor.service';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ListagemTarefasComponent } from './componentes/tarefas/listagem-tarefas/listagem-tarefas.component';
import { FormularioTarefasComponent } from './componentes/tarefas/formulario-tarefas/formulario-tarefas.component';
import { LayoutComponent } from './layout/layout.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    ListagemTarefasComponent,
    FormularioTarefasComponent,
    LayoutComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [ { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptorService, multi: true }],
  bootstrap: [AppComponent]
})
export class AppModule { }
