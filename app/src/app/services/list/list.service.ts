import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ListService {

  private apiUrl = environment.apiUrl;  // Usar la URL del entorno

  constructor(private http: HttpClient) { }

  // Método para obtener los menús
  getLists(): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}/lists`);
  }

  createList(newList: any): Observable<any> {
    return this.http.post<any>(`${this.apiUrl}/lists/create`, newList);
  }

  // Método para eliminar una lista
  deleteList(id: string): Observable<any> {
    return this.http.delete<any>(`${this.apiUrl}/lists/${id}`);
  }

  addShoppingList(shoppingList: any): Observable<any> {
    return this.http.post<any>(`${this.apiUrl}/shopping-list`, shoppingList);
  }

  getShoppingList(id: string): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}/shopping-list/${id}`);
  }
}
