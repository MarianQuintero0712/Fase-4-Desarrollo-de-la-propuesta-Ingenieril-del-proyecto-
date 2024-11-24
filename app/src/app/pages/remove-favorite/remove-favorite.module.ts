
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RemoveFavoritePageRoutingModule } from './remove-favorite-routing.module';

import { RemoveFavoritePage } from './remove-favorite.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RemoveFavoritePageRoutingModule
  ],
  declarations: [RemoveFavoritePage]
})
export class RemoveFavoritePageModule { }
