import { Injectable } from '@angular/core';
import { ToastController } from '@ionic/angular';

@Injectable({
  providedIn: 'root'
})
export class ToastService {

  constructor(private toastCtrl: ToastController) { }

  presentToast(type: string, message: string) {
    this.toastCtrl.create({
      message: message,
      duration: 3000, // Duración del toast en milisegundos
      position: 'bottom', // Posición del toast ('top', 'middle', 'bottom')
      color: type, // Puedes elegir el color del toast
      cssClass: 'custom-toast', // Clase CSS personalizada si quieres estilos adicionales
    }).then(toast => {
      toast.present();
      toast.onDidDismiss().then(() => {
        console.log('Toast dismissed');
      });
    });
  }
}
