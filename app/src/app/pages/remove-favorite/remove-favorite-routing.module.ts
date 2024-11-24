
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { RemoveFavoritePage } from './remove-favorite.page';

const routes: Routes = [
  {
    path: '',
    component: RemoveFavoritePage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class RemoveFavoritePageRoutingModule { }
