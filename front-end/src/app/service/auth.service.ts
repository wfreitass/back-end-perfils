import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private apiUrl = 'http://127.0.0.1:8000/api/auth';

  constructor(private http: HttpClient, private router: Router) { }

  login(credentials: { email: string, password: string }): Observable<any> {
    return this.http.post(`${this.apiUrl}/login`, credentials);
  }

  logout(): void {
    this.http.get(`${this.apiUrl}/logout`);
    localStorage.removeItem('user');
    localStorage.removeItem('authToken');
    this.router.navigate(['/login']);
  }

  isAuthenticated(): boolean {
    return localStorage.getItem('user') !== null;
  }

  cadastrarUsuario(usuario: { nome: string; email: string; senha: string }): Observable<any> {
    return this.http.post(`${this.apiUrl}/register`, usuario);
  }
}