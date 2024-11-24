import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { tap } from 'rxjs/operators';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private apiUrl = environment.apiUrl;

  constructor(private router: Router, private http: HttpClient) {}

  // Método para iniciar sesión
  login(credentials: { email: string; password: string }): Observable<any> {
    return this.http.post(`${this.apiUrl}/auth/login`, credentials).pipe(
      tap((response: any) => {
        // Almacenar el token en localStorage si la autenticación es exitosa
        if (response && response.token) {
          localStorage.setItem('access_token', response.token);
        }
      })
    );
  }

  // Método para registrar un nuevo usuario
  register(userData: { email: string; password: string; password_confirmation: string }): Observable<any> {
    return this.http.post(`${this.apiUrl}/auth/register`, userData).pipe(
      tap((response: any) => {
        console.log('Registro exitoso:', response);
      })
    );
  }

  // Método para realizar logout
  logout(): void {
    this.http.post(`${this.apiUrl}/auth/logout`, {}).subscribe({
      next: (response: any) => {
        console.log('Sesión cerrada exitosamente:', response);
        
        // Limpiar el token de localStorage
        localStorage.removeItem('access_token');
        
        // Redirigir al login
        this.router.navigate(['/login']);
      },
      error: (error) => {

      },
      complete: () => {
        console.log('Operación de logout completada.');
      },
    });
  }

  me(): Observable<any> {
    return this.http.post(`${this.apiUrl}/auth/me`,{}).pipe(
      tap((response: any) => {
        console.log('Usuario autenticado:', response);
      })
    );
  }
  

  // Método para verificar si el usuario está autenticado (con token)
  isAuthenticated(): boolean {
    const token = localStorage.getItem('access_token');
    return !!token; // Retorna verdadero si el token existe
  }
}
