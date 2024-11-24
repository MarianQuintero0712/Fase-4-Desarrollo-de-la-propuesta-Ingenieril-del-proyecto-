import { ActivatedRoute, Router } from '@angular/router';
import { ChangeDetectorRef, Component, OnInit } from '@angular/core';
import { MenusService } from 'src/app/services/menus/menus.service';
import { AuthService } from 'src/app/services/auth/auth-service.service';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {

  menus: any[] = [];  // Variable para almacenar los menús obtenidos de la API
  menuTypes: string[] = ['Desayuno', 'Almuerzo', 'Cena'];
  isLoading: boolean = true;
  user: string = '';

  constructor(
    private cdr: ChangeDetectorRef,
    private router: Router,
    private menusService: MenusService,
    private authService: AuthService,
    private alertController: AlertController,
    private route: ActivatedRoute
  ) {

  }

  ngOnInit(): void {

    this.route.params.subscribe(() => {
      this.loadUserData(); // Método para cargar datos del usuario
    });


    this.menusService.getMenus().subscribe(
      (response) => {
        console.log('Menús obtenidos:', response);  // Verifica que obtienes los menús correctamente
        this.menus = response.data;
        this.isLoading = false;
      },
      (error) => {
        console.error('Error al obtener los menús:', error);
        this.isLoading = false;
      }
    );
 
  }

  getMenuType(type: string) {
    this.menusService.getMenuType(type).subscribe(
      (response: any) => {
        if (response && response.data && response.data.length > 0) {
          this.menus = response.data;
          this.isLoading = false;
        } else {
          console.error('La respuesta no tiene menús válidos o está vacía.');
          this.menus = []; // Vacía el arreglo de menús si no hay datos
          this.isLoading = false;
        }
      },
      (error) => {
        console.error('Error al cargar el menú:', error);
        this.menus = []; // También vacía el arreglo si ocurre un error
      }
    );
  }

    // Función que se ejecuta cuando se hace clic en "Eliminar lista"
    async onConfirmLogout() {
      const alert = await this.alertController.create({
        //header: 'Confirmar eliminación',
        message: '¿Estás seguro de que deseas cerrar sesión?',
        buttons: [
          {
            text: 'Cancelar',
            role: 'cancel',
            cssClass: 'secondary',
            handler: () => {
              console.log('Cerrar sesión cancelada');
            }
          },
          {
            text: 'Cerrar sesión',
            handler: () => {
              this.authService.logout();
              localStorage.removeItem('access_token');
            }
          }
        ]
      });
  
      await alert.present();
    }
  
  

  onDetail(id: string) {
    this.router.navigate(['/detail', id]); // Redirige a una página con el id
  }

  onSearch(menu: string)
  {

  }

  private loadUserData(): void {
    this.authService.me().subscribe(
      (response) => {
        this.user = response.name; // Asignar datos del usuario autenticado
        console.log('Datos del usuario:', this.user);
      },
      (error) => {
        console.error('Error al obtener el usuario autenticado:', error);
      }
    );
  }
}
