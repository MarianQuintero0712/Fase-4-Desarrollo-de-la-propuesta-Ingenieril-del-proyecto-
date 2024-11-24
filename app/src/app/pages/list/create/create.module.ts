import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';  // Para los componentes de Ionic
import { ReactiveFormsModule } from '@angular/forms';  // Para formularios reactivos

import { CreateComponent } from './create.component';  // Asegúrate de que el componente esté importado

@NgModule({
  declarations: [CreateComponent],  // Declara el componente aquí
  imports: [
    CommonModule,  // Necesario para usar directivas estructurales como ngIf
    IonicModule,   // Necesario para usar componentes de Ionic como ion-input, ion-button, etc.
    ReactiveFormsModule  // Necesario para formularios reactivos
    
  ],
  exports: [CreateComponent]  // Opcional, si necesitas exportar el componente
})
export class CreateModule { }

