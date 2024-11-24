import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth/auth-service.service';
import { NavController, ToastController } from '@ionic/angular';
import { ToastService } from 'src/app/services/toast/toast.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage {
  registerData = {
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  };

  constructor(
    private authService: AuthService,
    private router: Router,
    private navCtrl: NavController,
    private toastService: ToastService // Importación del ToastController
  ) {}

  onRegister(form: any) {
    if (form.invalid || this.registerData.password !== this.registerData.password_confirmation) {
      this.toastService.presentToast('danger', 'Las contraseñas no coinciden o el formulario no es válido.');
      return;
    }
  
    this.authService.register(this.registerData).subscribe(
      (response: any) => {
        console.log('Registro exitoso:', response);
        this.toastService.presentToast('success', response.message || 'Registro exitoso.');
        this.navCtrl.navigateForward('/login');
      },
      (error) => {
        console.error('Error en el registro:', error);
  
        // Accede al mensaje de error enviado por el servidor
        const errorMessage = error?.error?.message || 'Ocurrió un error en el registro.';
        this.toastService.presentToast('danger', errorMessage);
      }
    );
  }
  

  onLogin() {
    this.router.navigate(['login']);
  }
}
