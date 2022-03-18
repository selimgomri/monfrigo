import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { MyfrigoPageRoutingModule } from './myfrigo-routing.module';

import { MyfrigoPage } from './myfrigo.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    MyfrigoPageRoutingModule
  ],
  declarations: [MyfrigoPage]
})
export class MyfrigoPageModule {}
