import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ModalController, ToastController } from '@ionic/angular';
import { ListService } from 'src/app/services/list/list.service';
import { ToastService } from 'src/app/services/toast/toast.service';

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.scss'],
})
export class CreateComponent implements OnInit {

  listForm: FormGroup;  // Definimos la variable del formulario
  alertButtons = ['Action'];

  constructor(
    private modalController: ModalController,
    private formBuilder: FormBuilder,
    private listService: ListService,
    private toastService: ToastService
  ) {}

  ngOnInit() {
    // Inicializar el formulario con validación
    this.listForm = this.formBuilder.group({
      name: ['', Validators.required], // nombre obligatorio
      description: [''] // descripción opcional
    });
  }

  // Cerrar el modal sin enviar datos
  closeModal() {
    this.modalController.dismiss();
  }

  // Enviar el formulario
  onSubmit() {
    if (this.listForm.valid) {
      console.log(this.listForm.value);
      this.listService.createList(this.listForm.value).subscribe(
        response => {
          console.log('Lista creada exitosamente:', response);
          // Pasar los datos de la lista creada al componente que invocó el modal
          this.modalController.dismiss(response.data); // Asegúrate de que 'response.data' tenga la estructura correcta
          this.toastService.presentToast('success', 'La lista de compras ha sido creada exitosamente');
          this.listForm.reset();
        },
        error => {
          console.error('Error al crear la lista:', error);
        }
      );
    } else {
      console.error('Formulario no válido');
    }
  }
 
}
