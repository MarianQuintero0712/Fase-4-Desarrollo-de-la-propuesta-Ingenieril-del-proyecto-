import { Router } from '@angular/router';
import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { AuthService } from 'src/app/services/auth/auth-service.service';
import { NavController } from '@ionic/angular';
import { ToastService } from 'src/app/services/toast/toast.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  loginData = {
    email: '',
    password: '',
  };

  constructor(
    private router: Router,
    private http: HttpClient,
    private authService: AuthService,
    private navCtrl: NavController,
    private toastService: ToastService
  ) { }

  // Validamos antes de enviar la solicitud
  onLogin(form: any) {
    if (form.invalid) {
      console.log('Formulario inválido');
      return;
    }

    this.authService.login(this.loginData).subscribe(
      (response) => {
        // Verificamos si la respuesta contiene el token
        if (response && response.access_token) {
          console.log('Login exitoso:', response);

          // Guardar el token en localStorage
          localStorage.setItem('access_token', response.access_token);
          

          //this.navCtrl.navigateRoot('/tabs/tab1');
          this.router.navigate(['/tabs/tab1']);
        } else {
          // Mostramos mensaje de error si no hay token
          console.error('Error: No se recibió un token JWT válido.');
          this.toastService.presentToast('danger', response.message);
        }
      },
      (error) => {
        // Manejo de errores del servidor (como 401 Unauthorized)
        console.error('Error al iniciar sesión:', error);
        this.toastService.presentToast('danger', error.message);
      }
    );
  }

  ngOnInit() { }

  onRegister() {
    this.router.navigate(['register']);
  }
}
