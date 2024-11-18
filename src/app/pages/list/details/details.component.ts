import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { AlertController, NavController } from '@ionic/angular';
import { ListService } from 'src/app/services/list/list.service';
import { ToastService } from 'src/app/services/toast/toast.service';

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.scss'],
})
export class DetailsComponent implements OnInit {

  id: string | null = null;

  constructor(
    private navctr: NavController,
    private router: Router,
    private route: ActivatedRoute,
    private alertController: AlertController,
    private listService: ListService,
    private toastService: ToastService
  ) { }

  ngOnInit() {
    this.id = this.route.snapshot.paramMap.get('id');
    if (this.id) {
      this.getShoppingList(this.id);
    }
  }

  onBack() {
    this.navctr.back();
  }

  // Función que se ejecuta cuando se hace clic en "Eliminar lista"
  async presentDeleteConfirmation() {
    const alert = await this.alertController.create({
      header: 'Confirmar eliminación',
      message: '¿Estás seguro de que quieres eliminar esta lista?',
      buttons: [
        {
          text: 'Cancelar',
          role: 'cancel',
          cssClass: 'secondary',
          handler: () => {
            console.log('Eliminación cancelada');
          }
        },
        {
          text: 'Eliminar',
          handler: () => {
            this.deleteList(this.id); // Aquí puedes agregar la lógica para eliminar la lista
          }
        }
      ]
    });

    await alert.present();
  }

  // Lógica para eliminar la lista
  deleteList(id: string) {
    this.listService.deleteList(id).subscribe(
      response => {
        console.log('Lista eliminada:', response);
        this.toastService.presentToast('success', response.message);

        // Redirige con un parámetro query
        this.router.navigate(['/tabs/tab2'], { queryParams: { deleted: true } });
      },
      error => {
        console.error('Error al eliminar la lista:', error);
        this.toastService.presentToast('danger', 'Error al eliminar la lista');
      }
    );
  }
  shoppingList: any;
  isLoading = true;

  getShoppingList(id: string) {
    this.listService.getShoppingList(id).subscribe(
      (response) => {
        console.log('Listas obtenidos:', response);  // Verifica que obtienes los menús correctamente
        // Convierte la cadena JSON en un arreglo real
        response.data.forEach(item => {
          item.shopping_list = JSON.parse(item.shopping_list);
        });

        // Asigna los datos convertidos a shoppingList
        this.shoppingList = response.data;
        this.isLoading = false;
      },
      (error) => {
        console.error('Error al obtener los menús:', error);
        this.isLoading = false;
      }
    );
  }
}
