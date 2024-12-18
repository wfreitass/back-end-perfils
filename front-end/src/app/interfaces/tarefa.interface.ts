import { TarefaStatus } from "../enums/tarefa-status.enum";

export interface Tarefa {
    id: number;
    titulo: string;
    descricao?: string;
    status?: TarefaStatus;
    created_at?: string;
    updated_at?: string;
  }