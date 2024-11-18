import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private user: any = null;

  setUser(user: any) {
    this.user = user;
    console.log('Usuario almacenado:', this.user);  // Verifica si el usuario se almacena correctamente
  }

  getUser() {
    return this.user;
  }

}