import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Tarefa } from '../interfaces/tarefa.interface';
import { ApiResponse } from '../interfaces/ApiResponse.interface';

@Injectable({
  providedIn: 'root'
})
export class TarefaService {
  private apiUrl = 'http://127.0.0.1:8000/api/tarefa';


  constructor(private http: HttpClient) { }

  // Buscar todas as tarefas
  getTarefas(): Observable<ApiResponse<Tarefa[]>> {
    return this.http.get<ApiResponse<Tarefa[]>>(this.apiUrl);
  }

  // Creiar tarefas
  criarTarefa(tarefa: Partial<Tarefa>): Observable<ApiResponse<Tarefa>> {
    return this.http.post<ApiResponse<Tarefa>>(this.apiUrl, tarefa);
  }

  // Atualizar tarefas
  atualizarTarefa(id: number, tarefa: Partial<Tarefa>): Observable<ApiResponse<Tarefa>> {
    return this.http.put<ApiResponse<Tarefa>>(`${this.apiUrl}/${id}`, tarefa);
  }

  carregarTarefa(id: number): Observable<ApiResponse<Tarefa>> {
    return this.http.get<ApiResponse<Tarefa>>(`${this.apiUrl}/${id}`);
  }

  // Buscar tarefas por status (usando o enum)
  getTarefasPorStatus(status: string): Observable<Tarefa[]> {
    return this.http.get<Tarefa[]>(`${this.apiUrl}?status=${status}`);
  }

  deletarTarefa(id: number): Observable<ApiResponse<null>> {
    return this.http.delete<ApiResponse<null>>(`${this.apiUrl}/${id}`);
  }
}