import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: 'message/:id',
    loadChildren: () => import('./view-message/view-message.module').then( m => m.ViewMessagePageModule)
  },
  {
    path: 'myfrigo',
    loadChildren: () => import('./myfrigo/myfrigo.module').then( m => m.MyfrigoPageModule)
  },
  {
    path: 'recipe-list',
    loadChildren: () => import('./recipe-list/recipe-list.module').then( m => m.RecipeListPageModule)
  },
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  {
    path: 'recipe-item/:id',
    loadChildren: () => import('./recipe-item/recipe-item.module').then( m => m.RecipeItemPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
