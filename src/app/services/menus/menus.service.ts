import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';  // Importar environment

@Injectable({
  providedIn: 'root'
})
export class MenusService {

  private apiUrl = environment.apiUrl;  // Usar la URL del entorno

  constructor(private http: HttpClient) { }

  // Método para obtener los menús
  getMenus(): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}/menus`);
  }

  getMenuId(id: string): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}/menus?id=${id}`);
  }

  getMenuType(type: string): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}/menus?type=${type}`);
  }
}
