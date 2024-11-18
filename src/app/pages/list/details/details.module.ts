import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { DetailsRoutingModule } from './details-routing.module';
import { DetailsComponent } from './details.component'; // Importa el componente
import { IonicModule } from '@ionic/angular';

@NgModule({
  declarations: [DetailsComponent], // Declara aquí el componente
  imports: [
    CommonModule,
    DetailsRoutingModule, // Importa el módulo de rutas si existe
    IonicModule,
  ],
  exports: [DetailsComponent], // Exporta si es necesario usarlo fuera
})
export class DetailsModule {}

