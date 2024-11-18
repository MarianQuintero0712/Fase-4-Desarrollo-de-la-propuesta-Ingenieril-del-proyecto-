import { Router } from '@angular/router';
import { Component, OnInit } from '@angular/core';
import { MenusService } from 'src/app/services/menus/menus.service';
import { AuthService } from 'src/app/services/auth/auth-service.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {

  menus: any[] = [];  // Variable para almacenar los menús obtenidos de la API
  menuTypes: string[] = ['Desayuno', 'Almuerzo', 'Cena'];
  isLoading: boolean = true;
  user?: null;

  constructor(
    private router: Router,
    private menusService: MenusService,
    private authService: AuthService
  ) {

  }

  ngOnInit(): void {
    //this.user = this.authService.getUser();

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
  
  

  onDetail(id: string) {
    this.router.navigate(['/detail', id]); // Redirige a una página con el id
  }

  onSearch(menu: string)
  {

  }
}
