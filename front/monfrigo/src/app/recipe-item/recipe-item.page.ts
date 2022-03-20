import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ApiService } from '../services/api.service';

@Component({
  selector: 'app-recipe-item',
  templateUrl: './recipe-item.page.html',
  styleUrls: ['./recipe-item.page.scss'],
})
export class RecipeItemPage implements OnInit {
  @Input()
  recipe: any;
  public isFetch = false;


  constructor(private api: ApiService, private activatedRoute: ActivatedRoute) { }

  ngOnInit() {
    const id = this.activatedRoute.snapshot.paramMap.get('id'); // Getting current component's id or information using ActivatedRoute service
    if (id) {
      this.getOneRecipe(id);
    }

  }

  getOneRecipe(id: string) {
    this.api.getOneRecipe(id).subscribe(response => {
      this.recipe = response;
      console.log('response :', response.ingredientRecipes[0].ingredient.name);
      this.isFetch = true;
    });
  }

}
