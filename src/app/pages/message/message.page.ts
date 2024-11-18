import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ModalController, NavController } from '@ionic/angular';
import { HttpClient } from '@angular/common/http';
import { MenusService } from 'src/app/services/menus/menus.service';
import { RemoveFavoritePage } from '../remove-favorite/remove-favorite.page';
import { AuthService } from 'src/app/services/auth/auth-service.service';

@Component({
  selector: 'app-message',
  templateUrl: './message.page.html',
  styleUrls: ['./message.page.scss'],
})
export class MessagePage implements OnInit {

  menu: any = null;
  menuId: string | null = null;
  selectedContent: string = 'content1'; // Contenido predeterminado
  user: null;
  isLoading: boolean = true;

  constructor(
    private navctr: NavController,
    private router: Router,
    private route: ActivatedRoute,
    private http: HttpClient,
    private menuService: MenusService,
    private modalController: ModalController,
    private authService: AuthService
  ) { }

  ngOnInit() {

    this.user = this.authService.getUser();
    // Obtener el ID de la ruta
    this.menuId = this.route.snapshot.paramMap.get('id');
    if (this.menuId) {
      this.getMenumenuId(this.menuId);
    }
  }

  getMenumenuId(menuId: string) {
    // Realizar la solicitud GET al servicio para obtener el menú
    this.menuService.getMenuId(menuId).subscribe(
      (response: any) => {
        this.menu = response.data;
        this.isLoading = false;
        console.log('Menú cargado:', this.menu);
      },
      (error) => {
        console.error('Error al cargar el menú:', error);
      }
    );
  }

  onBack() {
    this.navctr.back();
  }

  onCall() {
    this.router.navigate(['call']);
  }

  showContent(content: string) {
    this.selectedContent = content;
  }

  async addToShoppingList(menuId: string) {

    const modal = await this.modalController.create({
      component: RemoveFavoritePage,
      cssClass: 'custom_modal_bottom',
      componentProps: { menuId: menuId },
    });

    await modal.present();
  }
}