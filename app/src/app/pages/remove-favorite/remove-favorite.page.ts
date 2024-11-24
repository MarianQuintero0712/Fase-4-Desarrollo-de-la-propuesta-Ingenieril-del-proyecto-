import { NavController, ModalController } from '@ionic/angular';

import { Component, OnInit } from '@angular/core';
import { ListService } from 'src/app/services/list/list.service';
import { ToastService } from 'src/app/services/toast/toast.service';

@Component({
  selector: 'app-remove-favorite',
  templateUrl: './remove-favorite.page.html',
  styleUrls: ['./remove-favorite.page.scss'],
})
export class RemoveFavoritePage implements OnInit {

  selectedOption: any;
  lists: any[] = []; 
  menuId: string;
  shoppingListId: string;

  constructor(
    private modalController: ModalController,
    private listService: ListService,
    private toastService: ToastService
  ) { }

  ngOnInit() {
    this.listService.getLists().subscribe(
      (response) => {
        console.log('Listas obtenidos:', response);  // Verifica que obtienes los menús correctamente
        this.lists = response.data;

      },
      (error) => {
        console.error('Error al obtener los menús:', error);

      }
    );
  }

  // Método para actualizar la lista visible
  onOptionChange(event: any): void {
    this.shoppingListId = event.detail.value;
  }

  onBack() {
    this.modalController.dismiss();
  }

  addShoppingList(menuId: string)
  {
    console.log(`Menu ${menuId} Lista ${this.shoppingListId}`)
    this.listService.addShoppingList({'shoppingListId':this.shoppingListId,'menuId': this.menuId}).subscribe(
      response => {
        console.log('Lista creada exitosamente:', response);
        this.toastService.presentToast('success', response.message);
      },
      error => {
        console.error('Error al crear la lista:', error);
      }
    );
    
    this.modalController.dismiss();
  }
}
