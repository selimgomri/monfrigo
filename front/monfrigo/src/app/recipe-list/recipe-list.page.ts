import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../services/api.service';

@Component({
  selector: 'app-recipe-list',
  templateUrl: './recipe-list.page.html',
  styleUrls: ['./recipe-list.page.scss'],
})
export class RecipeListPage implements OnInit {
  @Input()
  public recipes!: any[];
  public recipe: any;



  constructor(private api: ApiService, private router: Router) { }

  ngOnInit() {
    this.getRecipes();
  }

  getRecipes() {
    this.api.getRecipes().subscribe(response => {
      this.recipes = response['hydra:member'];
      console.log('response :', response['hydra:member']);
    });
  }

  goToRecipe(id: string) {
    this.router.navigate(["/recipe-item/", id]);
  }

  // getOneRecipe(id: number) {
  //   this.api.getOneRecipe(id).subscribe(response => {
  //     this.recipe = response;
  //     console.log('response :', response);
  //   });
  // }

}
