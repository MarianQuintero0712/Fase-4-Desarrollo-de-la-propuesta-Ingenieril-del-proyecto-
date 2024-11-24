import { Injectable } from '@angular/core';
import { HttpRequest, HttpHandler, HttpInterceptor, HttpErrorResponse } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';
import { Router } from '@angular/router';
import { AuthService } from '../services/auth/auth-service.service';

@Injectable()
export class AuthInterceptor implements HttpInterceptor {

  constructor(private authService: AuthService, private router: Router) {}

  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<any> {
    // Obtener el token desde el almacenamiento local
    const token = localStorage.getItem('access_token');

    // Si el token existe, lo agregamos al encabezado Authorization
    if (token) {
      request = request.clone({
        setHeaders: {
          Authorization: `Bearer ${token}`
        }
      });
    }

    return next.handle(request).pipe(
      catchError((error: HttpErrorResponse) => {
        // Si el token ha expirado o es inválido
        if (error.status === 401) {
          // El token puede haber expirado o no ser válido, redirigir al login
          this.authService.logout();  // Llamamos al método logout para limpiar la sesión
          this.router.navigate(['/login']);  // Redirigir a la página de login
        }
        return throwError(error);
      })
    );
  }
}
