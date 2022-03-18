import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { MyfrigoPage } from './myfrigo.page';

const routes: Routes = [
  {
    path: '',
    component: MyfrigoPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class MyfrigoPageRoutingModule {}
