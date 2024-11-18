import { ActivatedRoute, Router } from '@angular/router';
import { Component, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { CreateComponent } from '../list/create/create.component';
import { ListService } from 'src/app/services/list/list.service';

@Component({
  selector: 'app-history',
  templateUrl: './history.page.html',
  styleUrls: ['./history.page.scss'],
})
export class HistoryPage implements OnInit {

  lists: any[] = []; 
  isLoading: boolean = true;
  deleted: boolean;

  constructor(
    private router: Router,
    private modalController: ModalController,
    private listService: ListService,
    private route: ActivatedRoute,
  ) { }

  ngOnInit() {
    // Inicializa la llamada a getLists una sola vez
    this.route.queryParams.subscribe(params => {
      if (params['deleted']) {
        this.deleted = true;
        console.log('La lista con ID', params['listId'], 'fue eliminada.');
        // Llama a getLists solo cuando se pasa el parámetro 'deleted'
        this.getLists();
      }
    });
  
    // Asegúrate de que getLists se ejecute solo si no hay parámetros
    if (!this.deleted) {
      this.getLists();
    }
  }
  

  getLists()
  {
    this.listService.getLists().subscribe(
      (response) => {
        console.log('Listas obtenidos:', response);  // Verifica que obtienes los menús correctamente
        this.lists = response.data;
        this.isLoading = false;
      },
      (error) => {
        console.error('Error al obtener los menús:', error);
        this.isLoading = false;
      }
    );
  }

  onReview() {
    this.router.navigate(['review']);
  }

  // Método para abrir el modal y crear una nueva lista
  async openCreateListModal() {
    const modal = await this.modalController.create({
      component: CreateComponent
    });
  
    modal.onDidDismiss().then((result) => {
      if (result) {
        console.log('Lista creada:', result.data); // Aquí recibes los datos de la lista creada
        this.ngOnInit();
      }
    });
  
    return await modal.present();
  }

  onDetail(id: string) {
    this.router.navigate(['/list/detail', id]); // Redirige a una página con el id
  }
  

}
