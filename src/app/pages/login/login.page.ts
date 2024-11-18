import { Router } from '@angular/router';

import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { AuthService } from 'src/app/services/auth/auth-service.service';

interface AuthResponse {
  message?: string;
  user?: {
    id?: number;
    name?: string;
    email?: string;
    google_id?: string | null;
    created_at?: string;
    updated_at?: string;
    avatar?: string;
  };
  auth_token?: string;
  avatar?: string;
}



@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})


export class LoginPage implements OnInit {

  user = null;

  constructor(
    private router: Router,
    private http: HttpClient,
    private authService: AuthService
  ) { 

  }

 
  async signIn() {
   
  }

  ngOnInit() {

  }
  
  async sendTokenToBackend(idToken: string) {
   
  }
   

  async signOut() {
   
  }

  async refresh(){

  }

  async singOut()
  {

  }



  goToHome() {
    this.router.navigate(['tabs/tab1']);
  }

  onForgot() {
    this.router.navigate(['forgot']);
  }

  onRegister() {
    this.router.navigate(['register']);
  }

}
